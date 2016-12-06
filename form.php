<!DOCTYPE html>
<html>
	<head>
		<title>Registration Form</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="https://fonts.googleapis.com/css?family=Abel|Antic|Asul" rel="stylesheet">
	</head>
	<body>
		<?php

			$result=$name=$occu=$gender=$email=$phone=$textarea=$error_name=$error_gender=$error_email=$error_phone="";


			if($_SERVER["REQUEST_METHOD"] == "POST"){

				if(isset($_POST["name"])&& $_POST["name"]!==""){
					$name=user_input($_POST["name"]);
				
					if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      					$error_name = "Creepy Name"; 
      				}					
				}else{
					$error_name="Name is Required";
      			}

				if(isset($_POST["gender"])&& $_POST["gender"]!==""){
					$gender=$_POST["gender"];
				}else{
					$error_gender="LOL! Any Doubt?";
				}

				if(isset($_POST["email"])&& $_POST["email"]!==""){
					$email=user_input($_POST["email"]);

					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     					$error_email= "You must be Joking"; 
     				}					
				}else{
					$error_email="Email is Required";	
				}
				if(isset($_POST["phone"])&& $_POST["phone"]!==""){
					$phone=user_input($_POST["phone"]);	

					if (!preg_match("/^[1-9][0-9]*$/",$phone)) {
      					$error_phone = "Did you just make that up?";	
      				}			
				}else{
					$error_phone="How will we call you?";
				}

				$textarea=user_input($_POST["textarea"]);
				$occu=$_POST["occu"];

				if($error_name == "" && $error_gendern == "" && $error_email == "" && $error_phone == ""){
					$result="You Passed ! :P";
				}

			}

			function user_input($info){
				$info = trim($info);
				$info = stripcslashes($info);
				$info = htmlspecialchars($info);
				return $info;	
			}

		?>

		
		<div class="container">

			<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
				<fieldset>
					<legend>Registration Form</legend>
					<p><span class="error">* Required Field</span>
					<p><label class="field" for="name">Name:</label>
					<input type="text" name="name" id="name" class="textbox" value="<?php echo $name; ?>"><span class="error">*<?php  echo $error_name; ?></span></p>
					<p><label class="field">You are:</label>&nbsp;&nbsp;
					<input type="checkbox" name="occu" value="student" <?php if (isset($occu)&& $occu=="student") echo "checked" ?>>Student<br>
					<input type="checkbox" class="check" name="occu" value="pro" <?php if (isset($occu)&& $occu=="pro") echo "checked" ?>>Professional</br>
					<input type="checkbox" class="check" name="occu" value="other" <?php if (isset($occu)&& $occu=="other") echo "checked" ?>>Other</p>
					<p><label class="field">Gender:</label>&nbsp;&nbsp;
					<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
					<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female<span class="error">*<?php echo $error_gender; ?></span></p>
					<p><label class="field" for="email">Email:</label>
					<input type="text" class="textbox" name="email" id="email" value="<?php echo $email; ?>"><span class="error">*<?php echo $error_email; ?></span></p>
					<p><label class="field" for="phone">Phone Number:</label>
					<input type="text" class="textbox" name="phone" id="phone" value="<?php echo $phone; ?>"><span class="error">*<?php echo $error_phone; ?></span>	</p>
					<p><label class="field" for="textarea">Why are you choosing us?</label>
					<textarea name="textarea" rows="10" cols="20" id="textarea" class="textbox"><?php echo $textarea; ?></textarea></p>
					<input type="submit" class="button" name="submit" value="Register">
					<span class="passed"><?php echo $result; ?></span>
				</fieldset>
			</form>

		</div>
	</body>
</html>