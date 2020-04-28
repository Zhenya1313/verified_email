<?php
	session_start();
	if (empty($_POST['login']) || empty($_POST['password'])) {
		echo json_encode(false);
		exit();
	} else{
		$login = $_POST['login'];
		$password = $_POST['password'];
		
		$conn = mysqli_connect('localhost', 'root', '', 'lab');
		
		$query = ("INSERT INTO users SET login = '$login', password = '$password' ");
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if($result) {
			$_SESSION['login'] = $login;
			echo json_encode(true);
			exit();
		} else {
			echo json_encode(false);
			exit();
		}
	}