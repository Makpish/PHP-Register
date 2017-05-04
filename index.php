<?php include 'register.php';?>
<!DOCTYPE html>
<html>
	<head>
		<title>PHP User Registration Form</title>
		<style>
			body{
				width:610px;
				font-family:calibri;
			}
			.error-message {
				padding: 7px 10px;
				background: #fff1f2;
				border: #ffd5da 1px solid;
				color: #d6001c;
				border-radius: 4px;
			}
			.success-message {
				padding: 7px 10px;
				background: #cae0c4;
				border: #c3d0b5 1px solid;
				color: #027506;
				border-radius: 4px;
			}
			.demo-table {
				background: #d9bbff;
				width: 100%;
				border-spacing: initial;
				margin: 2px 0px;
				word-break: break-word;
				table-layout: auto;
				line-height: 1.8em;
				color: #333;
				border-radius: 4px;
				padding: 20px 40px;
			}
			.demo-table td {
				padding: 15px 0px;
			}
			.demoInputBox {
				padding: 10px 30px;
				border: #a9a9a9 1px solid;
				border-radius: 4px;
			}
			.btnRegister {
				padding: 10px 30px;
				background-color: #3367b2;
				border: 0;
				color: #FFF;
				cursor: pointer;
				border-radius: 4px;
				margin-left: 10px;
			}
		</style>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	</head>
	<body>
		<script type="text/javascript" src="./used.js">
		</script>
		<div>
			<table align="center" class="demo-table">
				<tr>
					<th>Sr. No.</th>
					<th>Name</th>
					<th>Email</th>
					<th>Date of Birth</th>
					<th>Actions</th>
				</tr>
					<?php include 'list.php';?>
			</table>
		</div>
		<div>
			<input id="add" type="submit" name="register-user" value="Add New" class="btnRegister" onclick="register()">
		</div>
		<div id="register-form" style="display:none">
			<form name="frmRegistration" method="post" action="">
				<table border="0" width="500" align="center" class="demo-table">
					<?php if((isset($_POST['id']) && $_POST['id']==0) && $errors) { ?>
					<div class="error-message">Errors in Form</div>
					<script type="text/javascript">register()</script>
					<?php } ?>
						<input id="user-id" type="hidden" name="id" value="0" />
					<tr>
						<td>Name</td>
						<td><input id='user-name' type="text" class="demoInputBox" name="name" onKeyup="checkform()" value=""><?php if(isset($name_message)) echo "<div class='error-message'>".$name_message."</div>"; ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input id='user-email' type="text" class="demoInputBox" name="userEmail" onKeyup="checkform()" value=""><?php if(isset($email_message)) echo "<div class='error-message'>".$email_message."</div>"; ?></td>
					</tr>
					<tr>
						<td>Date of Birth</td>
						<td><input id='user-dob' name="dob" class="demoInputBox" type="date"  min="1980-01-01" max="<?php echo date('Y-m-d');?>" onKeyup="checkform()" value="<?php if(isset($_POST['dob'])) echo $_POST['dob']; else echo date('Y-m-d'); ?>" /><?php if(isset($dob_message)) echo "<div class='error-message'>".$dob_message."</div>"; ?></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="password" class="demoInputBox" name="password" onKeyup="checkform()" value=""><?php if(isset($pass_message)) echo "<div class='error-message'>".$pass_message."</div>"; ?></td>
					</tr>
					<tr>
						<td colspan=2><input id="regist" type="submit" name="register-user" value="Register" class="btnRegister" style="display:none" onclick="registerIT()"></td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>
