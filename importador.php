<?php
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

while ($row = mysql_fetch_array($result)) {
	echo '- '.$row[0].'
';
	$colunas = array();
	$resultCol = mysql_query("DESCRIBE ".$row[0]);
	while ($rowC = mysql_fetch_array($resultCol)) {
		$colunas[] = array('nome'=>$rowC['Field'],'tipo'=>$rowC['Type']);
	}
	$resultR = mysql_query("SELECT * FROM ".$row[0]." ORDER BY ".$row[0].".".$colunas[0]['nome']." LIMIT 3");
	while ($rowR = mysql_fetch_array($resultR)) {
		$virg = "";
		$sql = "INSERT INTO ".$row[0]." VALUES (";
		foreach ($colunas as $col){
			$tp = explode("(", $rowR[$col['tipo']]);
			
			switch ($tp[0]){
				case 'int':
					$sql .= "$virg".$rowR[$col['nome']]."";
					break;
				case 'varchar':
				default:
					$sql .= "$virg'".$rowR[$col['nome']]."'";
			}
			
			$virg = ", ";
		}
		$sql .= ");
";
		echo $sql;
	}
	echo '

';
}


?>