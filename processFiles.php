<?php
namespace OrangeTest;
require_once('OrangeTest\DbAdmin.php');

//BASIC "code-behind" file for user interface

$numOfFiles = count($_FILES['upload']['name']);

echo("Received: " . $numOfFiles . " files.<br /><br />");

$dbAdmin = new DbAdmin();

foreach($_FILES['upload']['tmp_name'] as $file) //iterate through each uploaded fle
{
	$contents = file_get_contents($file); //store file contents into local variable
	$json = json_decode($contents, true); //decode contents as json

	//store variables from JSON files
	$id = $json["id"];
	$title = $json["title"];
	$body = $json["body"];
	$created_at = $json["created_at"];
	$modified_at = $json["title"];
	$author = $json["author"];
	
	echo("INSERTED<br />id: ".$id."<br />".
		"title: ".$title."<br />".
		"body: ".$body."<br />".
		"created_at: ".$created_at."<br />".
		"modified_at: ".$modified_at."<br />".
		"author: ".$author."<br /><br />"
	);
	
	//insert into database
	$dbAdmin->insertRecord($id, $title, $body, $created_at, $modified_at, $author);
}

$dbAdmin->closeConnection();

?>
