<?php
function valideDateTime($dt){
	if($dt == '0000-00-00 00:00:00'){
		return '1969-12-31 19:00:00';
	} else {
		return $dt;
	}
}

function valideDate($dt){
	if($dt == '0000-00-00' || $dt == ''){
		return '1969-12-31';
	} else {
		return $dt;
	}
}

function valideTime($dt){
	if($dt==''){
		return '19:00:00';
	}
	$aux = explode(':', $dt);
	if($aux[0]>'23'){
		$aux[0] = '23';
	}
	if($aux[1]>'59'){
		$aux[1] = '59';
	}
	if($aux[2]>'59'){
		$aux[2] = '59';
	}
	return implode(":", $aux);
}


$link = mysql_connect('localhost', 'root', 'vacalouca');
if (!$link) {
	die('Not connected : ' . mysql_error());
}
$db_selected = mysql_select_db('taxigolden', $link);
if (!$db_selected) {
	die ('Can\'t use taxigolden : ' . mysql_error());
}

$bdcon = pg_connect("host=localhost port=5432 dbname=taxigolden user=postgres password=vacalouca");


$result = mysql_query("show tables");


try {
	pg_exec($bdcon,'BEGIN;');
	while ($row = mysql_fetch_array($result)) {
		if(substr($row[0], 0,4)!='sis_') continue;
		
		echo '- '.$row[0].'
';
		
		$colunas = array();
		$resultCol = mysql_query("DESCRIBE ".$row[0]);
		while ($rowC = mysql_fetch_array($resultCol)) {
			$colunas[] = array('nome'=>$rowC['Field'],'tipo'=>$rowC['Type']);
		}
		$resultR = mysql_query("SELECT * FROM ".$row[0]." ORDER BY ".$row[0].".".$colunas[0]['nome']." ");
		while ($rowR = mysql_fetch_array($resultR)) {
			$virg = "";
			$sql = "INSERT INTO ".$row[0]." VALUES (";
			$teste = array();
			foreach ($colunas as $col){
				$tp = explode("(", $col['tipo']);
				
				switch ($tp[0]){
					case 'int':
					case 'decimal':
						if(!empty($rowR[$col['nome']])){
							$sql .= "$virg".$rowR[$col['nome']];
						} else {
							$sql .= "$virg 0";
						}
						break;
					case 'datetime':
						$sql .= "$virg'".valideDateTime($rowR[$col['nome']])."'";
						break;
					case 'time':
						$sql .= "$virg'".valideTime($rowR[$col['nome']])."'";
						break;
					case 'date':
						$sql .= "$virg'".valideDate($rowR[$col['nome']])."'";
						break;
					case 'varchar':
					default:
						$teste[] = array('val'=>$rowR[$col['nome']],'tipo'=>$col['tipo']);
						$sql .= "$virg'".utf8_encode(str_replace(array("'"), array(" "), $rowR[$col['nome']]))."'";
				}
				
				$virg = ", ";
			}
			$sql .= ");
";
			if(!@pg_exec($bdcon, $sql)){
				print_r($teste);
				
				throw new Exception(pg_last_error($bdcon));
			}
		}
		echo '
	
';
	}
	pg_exec($bdcon, "COMMIT;");
} catch (Exception $e) {
	echo "ex: ".$e;
	pg_exec($bdcon,'ROLLBACK;');
}

?>