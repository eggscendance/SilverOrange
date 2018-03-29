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
	public function getId()
	{
		return $this->id;
	}
	
	public function getTitle()
	{
		return $this->title;
	}
	
	public function getBody()
	{
		return $this->body;
	}
	
	public function getAuthor()
	{
		return $this->author;
	}
}
?>
