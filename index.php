<?php
// Include database connection and functions here.
/*require_once '../class/config.php';
include '../class/functions.php';
sec_session_start();
if(login_check($mysqli) == true) {*/
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="B&amp;S Solutions" />
<meta name="robots" content="noindex, nofollow" />
<link rel="icon" type="img/ico" href="includes/images/favicon.ico" />
<link rel="stylesheet" type="text/css" href="includes/css/bootstrap.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/style.css" media="screen" />
<script type="text/javascript" src="includes/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="includes/js/bootstrap.js"></script>
<title>crm-enso24</title>
</head>
<body>
	<div id="wrapper">
		<?php
		include "includes/header.php";
		include "includes/nav.php";
		?>
		<div id="content">
		<?php
		// display the page that the user clicks on
	    if ($_GET["pid"]=="customer") {
	        include "pages/customer.php";
		} elseif ($_GET["pid"]=="new-customer") {
	        include "pages/new-customer.php";
	    } else {
	        include "pages/default.php";
	    }
		?>
		</div>
		<?php include "includes/footer.php"; ?>
	</div>
</body>
</html>
<?php
/*} else {
   header("http://crm.enso24.de");
}*/
?>