<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>SalesLaunch</title>
	<link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo asset_url();?>css/jquery.dropdown.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo asset_url();?>css/bootstrap-switch.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo asset_url();?>css/bootstrap-datetimepicker.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php echo asset_url();?>css/select2.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php echo asset_url();?>css/saleslaunch.css" type="text/css" media="screen" />

	<!--script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script-->
  <script src="<?php echo asset_url();?>js/jquery-1.10.2.js"></script>
	<script src="<?php echo asset_url();?>js/moment.min.js"></script>
	<script src="<?php echo asset_url();?>js/bootstrap.js"></script>
	<script src="<?php echo asset_url();?>js/bootstrap-switch.min.js"></script>
	<script src="<?php echo asset_url();?>js/bootstrap-datetimepicker.min.js"></script>
  <script src="<?php echo asset_url();?>js/select2.js"></script>
  <script src="<?php echo asset_url();?>js/bootbox.min.js"></script>
  <script src="<?php echo asset_url();?>js/bootstrapx-clickover.js"></script>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }


  .popover{ max-width: 600px;}
	</style>
</head>
<body>
<div id="container">
<nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img class="logo" src="<?php echo asset_url();?>img/logo.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#"><span class="glyphicon sp-hcontacts icon"></span></a></li>
        <li><a href="#"><span class="glyphicon sp-settings icon"></span></a></li>
        <li class="header-hr"></li>
        <li><a href="#"><span class="glyphicon sp-hstarblue icon"></span></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon sp-diary icon"></span></a></li>
        <li><a href="#"><span class="glyphicon icon sp-message"></span></a></li>
        <li><a href="#"><span class="glyphicon icon sp-pencilwhite"></span></a></li>
        <li><a href="#"><span class="glyphicon icon sp-thumbsup"></span></a></li>
        <li><a href="#"><span class="glyphicon sp-speakerwhite icon"></span></a></li>
        <li><a href="#"><span class="glyphicon icon sp-cloud"></span></a></li>
        <li class="header-hr"></li>
        <li><a href="#"><span class="glyphicon icon sp-home"></span></a></li>
        <li><a href="#"><span class="glyphicon icon sp-gear"></span></a></li>
      <form class="navbar-form navbar-right searchbox" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-primary"></button>
      </form>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
<div id="container">
	<div id="body">
