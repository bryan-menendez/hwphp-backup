<?php
	//$_GET['languages[]'] = implode(', ', $_GET['languages[]']);

	//not using a placeholder variable seems a bit too optimal for my taste, 
	//and means losing the original data after modification
	
	$name = $_GET['name'];
	$password = $_GET['password'];
	$age = $_GET['age'];
	$story = str_replace("\n", "<br>" , $_GET['story']);  
	$favSport = $_GET['favSport'];
	$languages = implode(', ', $_GET["languages[]"]);

	print "Your name is $name<br>";
	print "Your password is $password<br>";
	print "Your age range is $age<br>";
	print "Your favourite sport is $favSport<br>";
	print "Your languages are $languages<br>";
	print "Your story was $story<br>";
	
	
	
?>