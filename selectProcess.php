<?php
namespace OrangeTest;
require_once('OrangeTest\DbAdmin.php');

//BASIC "code-behind" file for user interface

$dbAdmin = new DbAdmin();

$post = $dbAdmin->getPostById($_POST['id']);

echo($post->getId() . "<br />" .
	$post->getTitle() . "<br />" .
	$post->getBody() . "<br />" .
	$post->getAuthor() . "<br />"
);
?>
