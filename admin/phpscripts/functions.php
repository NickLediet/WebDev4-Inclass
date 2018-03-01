<?php
	
	function redirect_to($location) {
		if($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}

	// function from the stack overflow snippet https://stackoverflow.com/questions/6101956/generating-a-random-password-in-php
	// Literally just concating random strings to a default length of 20
	function generate_password($length = 20){
		$chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.
							'0123456789`-=~!@#$%^&*()_+,./<>?;:[]{}\|';
	
		$str = '';
		$max = strlen($chars) - 1;
	
		for ($i=0; $i < $length; $i++)
			$str .= $chars[random_int(0, $max)];
	
		return $str;
	}
	
	// // https://stackoverflow.com/questions/10351981/php-hours-difference-hhmm-format
	// function timeDiff($lastTime) {
	// 	// $firstTime=strtotime($firstTime);
	// 	$firstTime = time();
	// 	echo $firstTime . "<br>";
	// 	$lastTime=strtotime($lastTime);
	// 	echo $lastTime . "<br>";
	// 	$timeDiff=$lastTime-$firstTime;
	// 	echo date()
  //   return $timeDiff;
	// }
?>