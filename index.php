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
	    <div id="header">
            <h2>B&amp;S Solutions CRM</h2>
            <!--<img src="includes/images/logo_final.png" alt="enso24 logo" width="400" height="100"/>-->
        </div>
        <div id="nav">
            <a href="index.php?pid=default">Überblick</a>
            <a href="index.php?pid=customer">Bestandskunden</a>
        </div>
        <div>
        	<?php
        		//this pulls the add new client button
        		include("pages/new_client/default.php");
        	?>
        </div>
        <div id="footer">
            <p><!--<a href="../class/logout.php">Logout</a> &nbsp; -->&copy;2013 <a href='http://www.bss-ims.de'>B&amp;S Solutions - IT&amp;Media Services</a></p>
        </div>
	</div>
</body>
</html>