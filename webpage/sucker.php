<?
	$name = $_POST['name'];
	$sec = $_POST['section'];
	$credit_num = $_POST['credit_num'];
	$sys = $_POST['system'];
	$flag = false;
	if($name != "" && $sec != "" && $credit_num != "" && $sys != "")
		$flag = true;
	$str = implode(";", [$name, $sec, $credit_num, $sys]).PHP_EOL;
	file_put_contents("suckers.txt", $str, FILE_APPEND);
	$suckers = file_get_contents("suckers.txt");
	$suckers = explode(PHP_EOL, $suckers);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<!-- saved from url=(0075)http://www.webstepbook.com/supplements/labsection/lab4-buyagrade/sucker.php -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Buy Your Way to a Better Education!</title>
		<link href="./sucker_files/buyagrade.css" type="text/css" rel="stylesheet">
	</head>

	<body>
		<?php if(!$flag): ?>
		<h1>Sorry, sucker!</h1>

		<p>Your didn't filled the form completely. <a href="buygrade.html">Try again<a></p>
	
		<?php else: ?>
		<h1>Thanks, sucker!</h1>

		<p>Your information has been recorded.</p>

		<dl>
			<dt>Name</dt>
			<dd><? echo $_POST['name']?></dd>

			<dt>Section</dt>
			<dd><? echo $_POST['section']?></dd>

			<dt>Credit Card</dt>
			<dd><? echo $_POST['credit_num'].' ('.$_POST['system'].')'?></dd>

			<p>Here are all suckers who have submitted here:</p>
			<ul>
				<?
				foreach($suckers as $sucker) {
					if(strlen($sucker) != 0)
						echo '<li>'.$sucker;
				};
				?>
			</ul>
		</dl>
		<?php endif; ?>
	
  </body></html>