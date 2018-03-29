<?php
namespace OrangeTest;
require_once('DbAdmin.php');

class Post
{
	private $id = '';
	private $title = '';
	private $body = '';
	private $author = '';
	
	/*
	Default Constructor
	*/
	public function __construct($id, $title, $body, $author)
	{
		$this->id = $id;
		$this->title = $title;
		$this->body = $body;
		$this->author = $author;
	}
	
	/*
	Getter Methods
	*/
	public getId()
	{
		return $id;
	}
	
	public getTitle()
	{
		return $title;
	}
	
	public getBody()
	{
		return $body;
	}
	
	public getAuthor()
	{
		return $author;
	}
}
?>
