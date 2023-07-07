<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
    <?php include "include/head.php" ?>
    <title>TWI - My Account</title>
</head>

<body>
    <?php include_once "include/navbar.php" ?>
    <div class="account__settings">
		<h1>Account Settings</h1>
		<form>
			<label for="name">Name</label>
			<input type="text" id="name" name="name" value=<?php echo $_SESSION['userid']?>>

			<label for="email">Email</label>
			<input type="email" id="email" name="email" value=<?php echo $_SESSION['email']?> readonly>

			<label for="password">Password</label>
			<input type="password" id="password" name="password">

			<label for="confirm-password">Confirm Password</label>
			<input type="password" id="confirm-password" name="confirm-password">

			<label for="bio">Bio</label>
			<textarea id="bio" name="bio"></textarea>

			<label for="profile-pic">Profile Picture</label>
			<input type="file" id="profile-pic" name="profile-pic">

			<button type="submit">Save Changes</button>
		</form>
	</div>
</body>
</html>
