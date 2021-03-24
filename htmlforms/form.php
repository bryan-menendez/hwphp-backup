<?php
	$_GET['Languages[]'] = implode(', ', $_GET['Languages[]']);
	$_GET['Story'] = str_replace("\n", "<br>" , $_GET['Story']);  
	
?>