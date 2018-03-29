<?php
namespace OrangeTest;
require_once('DbConnector.php');

/*
Provides abstraction layer for manipulating a database.
*/
class DbAdmin
{
	private $serverName = 'localhost';
	private $userName = 'root';
	private $password = '';
	private $dbName = 'silver_orange';
	
	/*
	Default Constructor
	*/
	public function __construct()
	{
		$dbConnector = new DbConnector($this->serverName, $this->userName, $this->password, $this->dbName);
		
		$dbConnector->createConnection();
	}
	
	/*
	Takes a post ID as its single argument.
	Retrieves a Post object containing: title, body author
	Returns data if HTML format
	*/
	public function getPostById($id)
	{
		
	}
}
?>