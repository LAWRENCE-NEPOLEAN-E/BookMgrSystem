<?php
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
	<title>Donor-reg.html</title>
	<link rel="stylesheet" href="Donor.css" type="text/css"/>
	<link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
	
	
</head>
<body>
<div class="signup">
	<marquee><h2 style="color: #fff;">R e g i s t e r&nbsp Y o u r&nbsp D e t a i l s . . .  </h2></marquee>
	<form name="hssn" action="Donor-reg.html">
		<div class="InputBox">
		<input type="text" name="name" title="E n t e r  Y o u r  N a m e" required=""/><label>N a m e</label>
		</div>
		<div class="InputBox">
		<input type="text" name="age"title="E n t e r  Y o u r  A g e"required=""/><label>A g e</label>
		</div>
		<div class="InputBox1">
		<label>G e n d e r</label>
		<select name="gender">
		<option> - - O P T I O N S - -</option>
		<option>M a l e</option>
		<option>F e m a l e</option>
		<option>O t h e r s </option>
		</select>
		</div>
		<div class="InputBox">
		<input type="text" name="phoneno"title="E n t e r  Y o u r  V a l i d  N u m b e r"required=""/>	
		<label>P h o n e&nbsp N o</label>
		</div>
		<div class="InputBox">
		<input type="text" name="username"title="E n t e r  a  U s e r n a m e"required=""/>
		<label>U s e r n a m e</label>
		</div>
		<div class="InputBox">
		<input type="password" name="password"title="E n t e r  a  p a s s w o r d"required=""/>
		<label>P a s s w o r d</label>
		</div>
		<div class="InputBox">
		<input type="password" name="cpassword"title="P l e a s e  C o n f i r m  P a s s w o r d"required=""/>
		<label>C o n f i r m  P a s s w o r d</label>
		</div>
	    <label align="left">A d d r e s s</label>
		<div class="InputBox1">
		<textarea rows="6" cols="35" id="textarea" name="address"title="E n t e r  Y o u r  A d d r e s s"></textarea>
		</div>
		<div class="InputBox">
		<input type="text" name="location"title="E n t e r  Y o u r  L o c a t i o n"required=""/>
		<label>L o c a t i o n</label>
		</div>
		<div class="InputBox1">
		<label>B l o o d  G r o u p</label>
			<select name="bloodgroup" id="select">
				<option> - - O P T I O N S - -</option>
				<option>A+</option>
				<option>O+</option>
				<option>B+</option>
				<option>AB+</option>
				<option>A-</option>
				<option>O-</option>
				<option>B-</option>
				<option>AB-</option>
			</select>
		</div>
		<br>
		<input type="checkbox" name="t10"/> I  agree  the  Terms  and  Conditions <br><br>
		<input name="submit_btn"type="submit" value="S i g n U p" ><br><br>

		
		
		
		Already have an account ?<a href="Donor_login.html" style ="text-decoration: none; font-family: 'Play', sans-serif; color: yellow;">&nbsp L o g  I n </a><br><br>
		</form>
		</div>
		<?php
		
		if(isset($_POST['submit_btn']))
		{
			//echo '<script type="text/javascript"> alert("Sign Up button clicked") </script>';
			$name = $_POST['name'];
			$age = $_POST['age'];
			$gender = $_POST['gender'];
			$phoneno= $_POST['phoneno'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$cpassword = $_POST['cpassword'];
			$address = $_POST['address'];
			$bloodgroup= $_POST['bloodgroup'];
			$location = $_POST['location'];
			if($password==$cpassword)
			{	
				$query= "select * from user1 WHERE username='$username'";
					$query_run = mysqli_query($con,$query);
				
				
				if(mysqli_num_rows($query_run)>0)
				{
					// there is already a user with same username.
					echo '<script type="text/javascript"> alert("User already exists... Try another username") </script>';
				}
				else
				{
					$query= "insert into user1 values('$name','$age','$gender','$phoneno','$username','$password','$address','$bloodgroup','$location')";
					$query_run = mysqli_query($con,$query);
					
					if($query_run)
					{
						echo '<script type="text/javascript"> alert("User Registered ... Go to login page") </script>';
					}
					else
					{
							echo '<script type="text/javascript"> alert("Error !") </script>';
					}
				}
			}
			else
			{
				echo '<script type="text/javascript"> alert("Password doesnt match") </script>';
			}
			
			
		}
	 ?>
	
</body>
</html>