<?php 
	$sql=new mysqli("127.0.0.1", "root","","ex2");
	if ($mysqli->connect_errno) {
    echo "Error: " . $mysqli->connect_errno . $mysqli->connect_error;
	}
	$query="SELECT  name 
	FROM (
	SELECT  `author_id` , COUNT(  `book_id` ) AS book_count
	FROM  `authors_books` 
	GROUP BY  `author_id`
	)T 
	JOIN authors a ON a.id=T.author_id
	WHERE book_count <7";
	if (!$res=$sql->query($query)){
		echo "Error " . $mysqli->errno . $mysqli->error;
	}
	for ($i=0; $i <= $res->num_rows; $i++) { 
		$res->data_seek($i);
    	$row = $res->fetch_assoc();
    	echo $row['name']."<br>";
	}
 ?>