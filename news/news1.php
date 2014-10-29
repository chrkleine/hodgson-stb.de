<?php
header('Content-Type: text/html; charset=UTF-8'); 
$xmlfile = simplexml_load_file("steuernews_fuer_mandanten.xml");

$result = $xmlfile->issue;

foreach ($result as issue)
{
    echo '<a href="'.$issue->entry.' title="'.$issue->entry.'>'.$issue->entry.'</a><br />';
}

?>