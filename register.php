<?php
	if(!empty($_POST["register-user"])) {
		/* Form Required Field Validation */
		// foreach($_POST as $key=>$value) {
		// 	if(empty($_POST[$key])) {
		// 	$error_message = "All Fields are required";
		// 	break;
		// 	}
		// }

		/* Check name length*/
		$errors = false;
		if(!isset($_POST['name']) || strlen($_POST['name']) > 25){
		$errors =true;
		$name_message = 'Required, Name must be less than equal to 25 characters<br>';
		}

		/* Password Matching Validation */
		if(!isset($_POST['password']) || strlen($_POST['password']) > 10){
		$errors = true;
		$pass_message = 'Required, Passwords is longer than 10 characters<br>';
		}

		if(!isset($_POST['dob'])){
		$errors = true;
		$dob_message = 'Required<br>';
		}

		/* Email Validation */
		if(!isset($_POST['userEmail']) || !filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL)) {
			$email_message = "Required, Invalid Email Address";
			$errors=true;
		}
		if(!$errors) {
			//require_once("dbcontroller.php");
			//$db_handle = new DBController();
      error_reporting(0);
      $connect = mysqli_connect("localhost", "root","", "legalraasta");
      if($connect){
				if(isset($_POST['id']) && $_POST['id']!=0){
				$QUERY = "UPDATE users SET `name`='".$_POST["name"]."',`email`='".$_POST["userEmail"]."',`dob`='".$_POST["dob"]."',`password`='".md5($_POST["password"])."' WHERE id=".$_POST['id'].";";
			}
				else
        $QUERY = "INSERT INTO users VALUES (null,'". $_POST["name"] . "', '" . $_POST["userEmail"] . "', '". $_POST["dob"] ."', '" . md5($_POST["password"]) . "')";
        //$result=$connect->query($QUERY);
        $resul = mysqli_query($connect, $QUERY);
        if(!empty($resul)) {
  				$error_message = "";
  				unset($_POST);
  			} else {
  				$error_message = "Problem in registration. Try Again!";
  			}
        mysqli_close($connect);
      }
		}
  }
?>
