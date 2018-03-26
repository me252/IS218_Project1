<?php 

function redirect($note, $url){
	echo $note;
	header("refresh: 2; url = $url");
	exit();
//This function displays a custom note, waits 2 seconds, then redirects to the custom url
}


function reg_chk ($fname , $lname, $email, $phone, $birthday, $gender, $password){
	if ($fname == "" || $lname == "" || $email == "" || $phone == "" || $birthday == "" || $gender == "" || $password == "") redirect( "Missing field" , "index.html");
	// If any field is missing, tell user "Missing field" and redirect
}


function register ($fname , $lname, $email, $phone, $birthday, $gender, $password){
	$cred = "SELECT * from accounts WHERE email = '$email'"; 
	$cred_check = mysql_query($cred); 
	$r = mysql_fetch_array($cred_check); 
	if ($r != NULL){ redirect ("This email is already in use." , "index.html");} 
	if ($r == NULL){
		$reg_cmd = "INSERT INTO accounts (email, fname, lname, phone, birthday, gender, password) VALUES ('$email', '$fname', '$lname', '$phone', '$birthday', '$gender', '$password')";
		mysql_query($reg_cmd) or die(mysql_error());
		redirect ("You have successfully registered an account!" , "login.html");
		
	}
	
}

function login_chk($email , $password){
	if ($email == "" || $password == "") redirect( "Missing field" , "login.html"); 
	$cred = "SELECT * from accounts WHERE email = '$email'"; 
	$cred_check = mysql_query($cred); 
	$r = mysql_fetch_array($cred_check);
	if ($r["email"] != $email) redirect("Email does not exist, please correct or register" , "login.html");
	if ($r["email"] == $email) {
		if ($r["password"] != $password) redirect ("Invalid password!" , "login.html");
		if ($r["password"] == $password) {
			$_SESSION ["fname"] = $r["fname"];
			$_SESSION ["lname"] = $r["lname"];
			redirect ("You have successfully logged in!", "account.php");}
		}
	
	
}









?>