<?php
namespace OrangeTest;

/*
Provides abstraction layer for connecting to a database.
*/
class DbConnector
{
	private $serverName = '';
	private $userName = '';
	private $password = '';
	private $dbName = '';
	
	/*
	Default Constructor
	*/
	public function __construct($serverName, $userName, $password, $dbName)
	{
		$this->serverName = $serverName;
		$this->userName = $userName;
		$this->password = $password;
		$this->dbName = $dbName;
	}

	/*
	Takes no arguments.
	Creates a connection to an underlying DBMS.
	Dies with error on failure.
	*/	
	public function createConnection()
	{
		// Create connection
		$connection = mysqli_connect($this->serverName, $this->userName, $this->password, $this->dbName) or die("Error " . mysqli_error($connection));
	}
}
?>