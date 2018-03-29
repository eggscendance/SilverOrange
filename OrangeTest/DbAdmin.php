<?php
namespace OrangeTest;
require_once('Post.php');

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
		
		$post = new Post($postId, $postTitle, $postBody, $postAuthor);
		return $post;
	}

	/*
	Inserts post records.
	*/	
	public function insertRecord($id, $title, $body, $createdAt, $modifiedAt, $author)
	{
		//remove any characters we don't want:
		$id = str_replace(';','',$id);
		$title = str_replace(';','',$title);
		$body = str_replace(';','',$body);
		$createdAt = str_replace(';','',$createdAt);
		$modifiedAt = str_replace(';','',$modifiedAt);
		$author = str_replace(';','',$author);
		
		$sql = "INSERT INTO posts (id, title, body, created_at, modified_at, author) 
				VALUES ('$id', '$title', '$body', '$createdAt', '$modifiedAt', '$author');";
				
		mysqli_query($this->mysqli,$sql);
	}
	
	/*
	Get all records in reverse chronological order
	Returns an array of Post objects
	*/
	public function getRecordsReverseChrono()
	{
		$sql = "SELECT id, title, body, author
				FROM posts
				ORDER BY created_at DESC;";
				
		$posts[] = array(); //initialize array
		$index = 0;
				
		if ($result=mysqli_query($this->mysqli,$sql))
		{
			// Fetch row
			while ($row=mysqli_fetch_row($result))
			{
				$postId = $row[0];
				$postTitle = $row[1];
				$postBody = $row[2];
				$postAuthor = $row[3];
		
				$posts[$index] = new Post($postId, $postTitle, $postBody, $postAuthor);
				$index++;
			}
			
		  // Free result set
		  mysqli_free_result($result);
		}

		mysqli_close($this->mysqli); //close our connection
		return $posts;
	}

	/*
	Closes connection to db.
	Can be used if a script needs to make sure connection is manually closed
	*/	
	public function closeConnection()
	{
		mysqli_close($this->mysqli);
	}
}
?>
