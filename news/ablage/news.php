<?php
header('Content-Type: text/html; charset=UTF-8');

echo <<<EOT
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>

<body>

	<LINK href="mhstyle.css" rel="stylesheet" type="text/css">
EOT;
//echo '<LINK href="mhstyle.css" rel="stylesheet" type="text/css">';


include 'xml2array.php';

$contents = file_get_contents('steuernews_fuer_mandanten.xml');

$year	= $_GET["year"];


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

$id = $month.'_'.$year;


//alles
$result = xml2array($contents);
//var_export($result["news"]["issue"]);


//monatlich
$result = xml2array($contents);


echo '<table class="main">';

foreach ($result["news"]["issue"] AS $element)
{
	if ($element['id'] == $id)
	{
		$entries = $element['entry'];


echo <<<EOT
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
		break;
	}
}

echo '</table>';
echo '</body>';


?>