<?php
	session_start();
	
        if (empty($_POST['login']) || empty($_POST['password'])) {
	        echo json_encode(false);
	        exit();
        }
        else{
                $login = $_POST['login'];
                $password = $_POST['password'];

		$conn = mysqli_connect('localhost', 'root', '', 'lab');
		
		$query = ("SELECT login, password from users WHERE login = '$login' AND password = '$password' ");
	        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	        $count = mysqli_num_rows($result);
		if($count >= 1) {
			$_SESSION['login'] = $login;
			echo json_encode(true);
			exit();
		} else {
			echo json_encode(false);
			exit();
		}
        }
