<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title><?=$title?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="A Student Search of IITK Students" />
	<meta name="keywords" content="gopi, ramena, gopi ramena, iitk, gopi iitk, gopi ramena iitk, gopi1410, student search, iitk student search, iitk students" />
	<meta name="author" content="Gopi Ramena" />
	<link href="<?=$base_url?>css/style.css" rel="stylesheet" type="text/css" media="all" />
	<script src="<?=$base_url?>js/jquery-1.3.2.min.js" type="text/javascript"></script>
    <script src="<?=$base_url?>js/myscript.js" type="text/javascript"></script>
</head>
    
<body>
    <!-- HEADER -->
    <div id="header">
        <div class="logo"><a href="<?=$url?>">IITK STUDENT SEARCH</a></div>
		<div class="gopi"><a href="http://home.iitk.ac.in/~gopi"><img src="<?=$base_url?>images/gopi.jpg" /></a></div>
        <div class="site-nav">
            <ul>
                <li style="transform:rotate(8deg);-webkit-transform:rotate(8deg);-moz-transform:rotate(8deg);-o-transform:rotate(8deg);"><a href="#">Home</a></li>
                <li style="transform:rotate(-3deg);-webkit-transform:rotate(-3deg);-moz-transform:rotate(-3deg);-o-transform:rotate(-3deg);"><a href="#">About Me</a></li>
                <li style="transform:rotate(1deg);-webkit-transform:rotate(1deg);-moz-transform:rotate(1deg);-o-transform:rotate(1deg);"><a href="#">Contact Me</a></li>
                <li style="transform:rotate(5deg);-webkit-transform:rotate(5deg);-moz-transform:rotate(5deg);-o-transform:rotate(5deg);"><a href="#">Help</a></li>
                <li style="transform:rotate(-9deg);-webkit-transform:rotate(-9deg);-moz-transform:rotate(-9deg);-o-transform:rotate(-9deg);"><a href="#">Feedback</a></li>
            </ul>
        </div>
    </div>
    <!-- CONTENT -->
    <div id="content">
        <div class="top">
            <div class="bot">
                <div class="inner">
                    <div class="wrapper">
                        <?php
                            if(isset($table_start) && $table_start) {
                        ?>
                        <table border="1" cellpadding="10" cellspacing="5">
                            <tbody>
                        <?php } ?>