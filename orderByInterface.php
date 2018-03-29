<?php
namespace OrangeTest;
require_once('OrangeTest\DbAdmin.php');

//BASIC "code-behind" file for user interface

$dbAdmin = new DbAdmin();

foreach($dbAdmin->getRecordsReverseChrono() as $record)
{
	echo($record->getTitle() . "<br />" .
	$record->getAuthor() . "<br />");
}
?>
