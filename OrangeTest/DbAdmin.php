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
	private $mysqli;
	
	/*
	Default Constructor
	*/
	public function __construct()
	{
		//Upon creating the DbAdmin object, create a connection to the desired database
		$this->mysqli = mysqli_connect($this->serverName, $this->userName, $this->password, $this->dbName);

		/* check connection */
		if ($this->mysqli->connect_errno) {
			printf("Connect failed: %s\n", $this->mysqli->connect_error);
			exit();
		}
	}
	
	/*
	Takes a post ID as its single argument.
	Returns a Post object containing: title, body author
	*/
	public function getPostById($id)
	{
		$id = str_replace(';','',$id); //make sure no semi-colons appear in inserted data
		
		//Post members:
		$postId = '';
		$postTitle = '';
		$postBody = '';
		$postAuthor = '';
		
		$sql = "SELECT 
					posts.id,
					posts.title,
					posts.body,
					authors.full_name
				FROM posts 
				LEFT OUTER JOIN authors
					ON authors.id = posts.author
				WHERE posts.id = '$id';";
		
		if ($result=mysqli_query($this->mysqli,$sql))
		{
			// Fetch row
			while ($row=mysqli_fetch_row($result))
			{
				$postId = $row[0];
				$postTitle = $row[1];
				$postBody = $row[2];
				$postAuthor = $row[3];
			}
			
		  // Free result set
		  mysqli_free_result($result);
		}

		mysqli_close($this->mysqli); //close our connection
		
		$post = new $Post($postId, $postTitle, $postBody, $postAuthor);
		return $post;
	}
	
	public function insertRecords()
	{
		
	}
}
?>
