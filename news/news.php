<?php
header('Content-Type: text/html; charset=UTF-8');  
echo '<LINK href="mhstyle.css" rel="stylesheet" type="text/css">';


include 'xml2array.php';

//$xml = simplexml_load_file("2014_Oktober.xml");
//$xml = simplexml_load_file("steuernews_fuer_mandanten.xml");
$contents = file_get_contents('2014_Oktober.xml');

$month = isset($_GET["month"]);


//alles
//$result = xml2array($contents);
//var_export($result["news"]["issue"]);


//monatlich
$result = xml2array($contents);
//var_export($result["news"]["issue"][1]);
/*var_export($result["news"]["issue"][1]["title"]);
var_export($result["news"]["issue"][1]["entry"][0]["id"]);
var_export($result["news"]["issue"][1]["entry"][0]["updated"]);
var_export($result["news"]["issue"][1]["entry"][0]["title"]);
var_export($result["news"]["issue"][1]["entry"][0]["img"]);
var_export($result["news"]["issue"][1]["entry"][0]["foreword"]);
var_export($result["news"]["issue"][1]["entry"][0]["content"]);
*/

$count = count($result["news"]["issue"]);

echo '<table class="main">';
	for ($i = 0; $i <= $count; $i++)
	{	
		foreach ($result["news"]["issue"][$i] as $article)   
		{
			echo $article.'<br>';
			foreach ($result["news"]["issue"][$i]["entry"] as $articlesub)   
			{
				echo $articlesub;
			
			}
			/*for ($i1 = 0; $i1 <= 1000; $i1++)
			{
				echo $result["news"]["issue"][$i1]["entry"][$i1]["id"] .'<br>';
				echo $result["news"]["issue"][$i1]["entry"][$i1]["updated"] .'<br>';
				echo $result["news"]["issue"][$i1]["entry"][$i1]["title"] .'<br>';
				echo $result["news"]["issue"][$i1]["entry"][$i1]["img"] .'<br>';
				echo $result["news"]["issue"][$i1]["entry"][$i1]["foreword"] .'<br>';
	 		}*/
	 	 }	 
	 }
echo '</table>';


?>