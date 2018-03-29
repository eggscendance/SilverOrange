# SilverOrange
Test Contents:
-root
	:Description- root lvl
	:Contents-
		index.php = html interface to OrangeTest application.
-OrangeTest
	:Description- contains all php scripts belonging to the namespace "OrangeTest"
	:Contents-
		DbConnector.php = Provides abstraction layer for connecting to a database.
		DbAdmin.php = Provides abstraction layer for manipulating a database. (selecting, inserting)
		Post.php = Class for post objects. (titles, body, author).
