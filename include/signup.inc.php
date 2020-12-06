<?php 
if(isset($_POST['submit'])) {
	
	include_once 'dbh.inc.php';
	
	$first=mysqli_real_escape_string($conn,$_POST['first']); // preiau informatiile de la pagina "signup.php"
	$last=mysqli_real_escape_string($conn,$_POST['last']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$uid=mysqli_real_escape_string($conn,$_POST['uid']);
	$pwd=mysqli_real_escape_string($conn,$_POST['psw']);
	$pwd2=mysqli_real_escape_string($conn,$_POST['psw2']);
	echo "1";
	echo $first.$last.$email.$uid.$pwd;
	if(empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) { // ma asigur ca au fost completate toate campurile
		header("Location: ../index.html?signup=empty");
		exit();
	}
	else {
		echo 2;
		if(!preg_match("/^[a-zA-Z]*$/",$first) || !preg_match("/^[a-zA-Z]*$/",$last) ) { // numele si prenumele contin doar litere
			header("Location: ../index.html?signup=invalid");
			exit();
		}else {
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)) { // ma asigur ca a fost introdusa o adresa de mail
				header("location: ../index.html?signup=invalidEMAIL");
				exit();
			}
			else {
				if(strlen($pwd)<5){
					header("location: ../index.html?signup=passwordtooshort");
					exit();
				}else {
					if($pwd!=$pwd2) {
				header("location: ../index.html?signup=errorpassword");
				exit();
				}
				else {
						$sql ="SELECT * FROM users WHERE email='$email'" ;
						$result= mysqli_query($conn,$sql);
						$resultCheck= mysqli_num_rows($result);
						if($resultCheck > 0) { // ma asigur ca numele pe care utilizatorul l-a ales nu exista deja
							header("Location: ../index.html?signup=USERTAKEN");
							exit();
					
						}else {
							$hash1=md5($pwd);
							$hashedPwd = sha1($hash1); //am criptat parola
							$sql= "INSERT INTO users(fname, lname, email,username,psw,type) VALUES('$first' ,'$last','$email','$uid','$hashedPwd',0);";
							mysqli_query($conn,$sql);//contul a fost creat
							header("Location: ../index.html?succes");
						exit();
					
						}
					}
				}
				
				}
			
			
			}
		
	}
	
}else {
	header("Location: ../index.html");
	exit();
}
?>