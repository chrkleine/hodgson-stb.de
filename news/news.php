<?php
header('Content-Type: text/html; charset=UTF-8');

include 'xml2array.php';

$contents 	= file_get_contents('steuernews_fuer_mandanten.xml');

$year		= $_GET["year"];

switch ($_GET["month"])
{
	case '1':
        $month = "januar";
        break;
	case '2':
        $month = "februar";
        break;
	case '3':
        $month = "maerz";
        break;
	case '4':
        $month = "april";
        break;
	case '5':
        $month = "mai";
        break;
	case '6':
        $month = "juni";
        break;
	case '7':
        $month = "juli";
        break;
	case '8':
        $month = "august";
        break;
	case '9':
        $month = "september";
        break;
	case '10':
        $month = "oktober";
        break;
	case '11':
        $month = "november";
        break;
	case '12':
        $month = "dezember";
        break;
}

$result = xml2array($contents);

$count = count($result["news"]["issue"]);
//var_export($count);

echo '<table class="main">';
	for ($i = 0; $i <= $count; $i++)
	{	
		foreach ($result["news"]["issue"][$i] as $article)   
		{
			//echo $article.'<br>';
			foreach ($result["news"]["issue"][$i]['entry']['title'] as $articlesub)   
			{
				echo $articlesub;

			}
			
			//for ($i1 = 0; $i1 <= 1000; $i1++)
			//{
				/*
				echo $result["news"]["issue"][$i1]["entry"][$i1]["id"] .'<br>';
				echo $result["news"]["issue"][$i1]["entry"][$i1]["updated"] .'<br>';
				echo $result["news"]["issue"][$i1]["entry"][$i1]["title"] .'<br>';
				echo $result["news"]["issue"][$i1]["entry"][$i1]["img"] .'<br>';
				echo $result["news"]["issue"][$i1]["entry"][$i1]["foreword"] .'<br>';
				*/
			//}
		}
	 }
echo '</table>';


/*$callback = function($value, $key)
{
	echo("$value: $key, ");
};
array_walk_recursive($result, $callback);
*(
	

/*
    $keys = array();
    array_walk_recursive($result, function($val, $key) use (&$keys)
    {
		$keys[] = $key;
    });
    print_r($keys);
*/

//var_export($result['news']);
//print_r(array_keys($result['news']['issue']));

if (($month == '') || ($year == ''))
{
	$id = $result['news']['issue'][0]['id'];
}
else
{
	$id = $month.'_'.$year; 
}


if ($id != '')
{
	echo '<head>';
		echo '<meta http-equiv="content-type" content="text/html; charset=utf-8">';
	echo '</head>';

	echo '<body>';
		echo '<LINK href="mhstyle.css" rel="stylesheet" type="text/css">';

		echo '<table class="main">';

		foreach ($result["news"]["issue"] AS $element)
		{
			if ($element['id'] == $id)
			{
				$entries = $element['entry'];

				//print_r($entries);break;

$article = <<<EOT
				<tr>
					<th class="month" colspan="2">
						{$entries[0]['title']}
					</th>
				</tr>
				<tr>
					<td class="title">
						{$entries[0]['foreword']}
					</td>
					<td class="img">
						<img src="{$entries[0]['img']}" name="">
					</td>
				</tr>
				<tr>
					<td class="content">
						{$entries[0]['content']}
					</td>
				</tr>
EOT;
				//echo $article;
			}
		}
}

	echo '</table>';
echo '</body>';


?>