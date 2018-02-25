<?php
	// #require Composer
	// require '../../vendor/autoload.php';
	// use PHPMailer\PHPMailer\PHPMailer;

	# Setting timezone.
	date_default_timezone_set('EST');
	// Password hashing credentials 
	// Explained https://stackoverflow.com/questions/4795385/how-do-you-use-bcrypt-for-hashing-passwords-in-php
	$hash_options = [
		'cost' => 11
	];

	// // Email Options
	// $mail = new PHPMailer(true);
	// $mail->IsSMTP(); // telling the class to use SMTP
	// $mail->SMTPAuth = true; // enable SMTP authentication
	// $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
	// $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
	// $mail->Port = 465; // set the SMTP port for the GMAIL server
	// $mail->Username = "ledietn@gmail.com"; // GMAIL username
	// $mail->Password = "Kilo5000!"; // GMAIL password

	// Set up connection credentials
	$user = "root";
	$pass = "Disco111!";
	$url = "localhost";
	$db = "ajax_test";
	
	// $link = mysqli_connect($url, $user, $pass, $db, "8889"); //Mac
	$link = mysqli_connect($url, $user, $pass, $db); //PC
	
	/* check connection */ 	
	if(mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
?>