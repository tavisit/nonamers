<?php

session_start();
 
if(isset($_POST['submit'])) {
	include 'dbh.inc.php';
	
	$uid=mysqli_real_escape_string($conn,$_POST['uid']) ;
	$pwd=mysqli_real_escape_string($conn,$_POST['psw']) ;
	if(empty($uid) || empty($pwd)) {
		header("Location: ../index.html?login=empty");  // ma asigur ca utilizatorul a completat ambele campuri 
		exit();
	}else {
		$sql= "SELECT * FROM users WHERE email='$uid'";
		$result = mysqli_query($conn,$sql);
		$resultCheck=mysqli_num_rows($result);								
		if($resultCheck<1) { // verific daca acea persoana exista in baza de date  
			header("Location: ../index.html?login=error");
			exit();
		} else {
			while($row=mysqli_fetch_assoc($result))
			{	
				$hash1= md5($pwd);
				$hashedPwdCheck = sha1($hash1);
				echo $hashedPwdCheck;
				if($hashedPwdCheck !==$row['psw']) { //verific parola
					header("Location: ../index.html?login");
					exit();
				}else {
					$_SESSION['u_id']=$row['user_id'];
					$_SESSION['first']=$row['fname'];
					$_SESSION['last']=$row['lname'];
					$_SESSION['email']=$row['email'];
					$_SESSION['u_uid']=$row['username'];
					$_SESSION['type']=$row['type'];
					$_SESSION['rating']=$row['rating'];
					header("Location: ../index.html?login=succes"); //utlizatorul este logat
					exit();
					};
			}
		}
	}
}else {
		header("Location: ../index.html?login=error");
		exit();
	}