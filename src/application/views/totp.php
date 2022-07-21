<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>TOTP</title>
</head>
<body>

<div id="container">
	<div style='text-align: center;'>
		<h2>One-Time Password</h2>
		<img src='<?= $qr_code_url; ?>?'>
	</div>
	<form action='index.php/totp/verify' method='post' style='margin: 10px 0;'>
		<div style='display: flex; justify-content: center'>
			<div style='margin-right: 5px;'>
				<input name='one_code' type='text' value='' />
			</div>
			<div>
				<button type='submit'>検証</button>
			</div>
		</div>
		<input name='secret' type='hidden' value='<?= $secret ?>' />
	</form>
</div>

</body>
</html>
