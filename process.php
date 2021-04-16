<?php
	session_start();
	require('new-connection.php');
	
	if(isset($_POST['action']) && $_POST['action'] == 'register'){

		register_user($post);
		
	}
	else if(isset($_POST['action']) && $_POST['action'] == 'login'){

		login_user($post);
	
	} else {
		session_destroy();
		header('location: index.php');
		die();
	}

	function register_user($post){
		$_SESSION['errors'] = array();

		if(empty($_POST['first_name'])){
			$_SESSION['errors'][] = "First name required";
		}
		if(empty($_POST['last_name'])){
			$_SESSION['errors'][] = "last name required";
		}
		if(empty($_POST['password'])){
            $_SESSION['errors'][] = "Password required!";
        }
		if($_POST['password'] !== $_POST['confirm_pass']){
			$_SESSION['errors'][] = "Password and confirmation must match!";
		}
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$_SESSION['errors'][] = "Please use a valid email address!";
		}
		// end validation
		
		if(count($_SESSION['errors']) > 0){

			header('location: index.php');
			die();

		} else {
			
			$sql = "INSERT INTO register_table (first_name, last_name, email, password, created_at, updated_at) 
					VALUES ('{$_POST['first_name']}','{$_POST['last_name']}','{$_POST['email']}','{$_POST['password']}', now(), now())";

			run_mysql_query($sql);
			$_SESSION['message'] = "New user added!";
			header('location: index.php');
			// echo $sql;
			die();
		}
	}

	function login_user($post){
		$sql = "SELECT * FROM register_table WHERE register_table.email = '{$_POST['email']}'
						 AND register_table.password = '{$_POST['password']}'";
		$user = fetch_all($sql);
		if(count($user) > 0){
			$_SESSION['user_id'] = $user[0]['id'];
			$_SESSION['first_name'] = $user[0]['first_name'];
			$_SESSION['logged_in'] = TRUE;
			header('location: success.php');
		} else {
			$_SESSION['errors'][] = "User not found";
			header('location: index.php');
			die();
		}
	}
?>