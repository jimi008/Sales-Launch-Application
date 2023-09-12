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
  <script src="<?php echo asset_url();?>js/holder.js"></script>
  <script src="<?php echo asset_url();?>js/highcharts.js"></script>
  <script src="<?php echo asset_url();?>js/themes/dark-unica.js"></script>
  <script src="<?php echo asset_url();?>js/modules/exporting.js"></script>
  <script src="<?php echo asset_url();?>js/bootstrapx-clickover.js"></script>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		
		width: 1300px;
	}
  .popover{ max-width: 600px;}
	</style>
</head>
<body class="admin">
<input type="hidden" id="current_marketeer_id" value="<?php echo isset($current_marketeer_id) ? $current_marketeer_id : '' ?>">
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
      <a class="navbar-brand" href="#"><img src="<?php echo asset_url();?>img/logo.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span></a>
            <ul class="dropdown-menu">
            <?php foreach($menu_all_marketeers as $marketeer): ?>
              <li>
                <div class="row">
                  <div class="col-md-5 col-md-offset-1"><a href="#" id="<?php echo $marketeer['id'] ?>"><?php echo $marketeer['fullname'] ?></a></div>
                  <div class="col-md-6 menu-marketeers">
                    <a href="#" class="marketeer-options" id="HISTORY" marketeer-id="<?php echo $marketeer['id'] ?>"><span class="glyphicon glyphicon-calendar"></span></a>
                    <a href="#" class="marketeer-options" id="LOGIN" marketeer-id="<?php echo $marketeer['id'] ?>"><span class="glyphicon glyphicon-user"></span></a>
                    <a href="#" class="marketeer-options" id="SETTING" marketeer-id="<?php echo $marketeer['id'] ?>"><span class="glyphicon glyphicon-cog"></span></a>
                    <a href="#" class="marketeer-options" id="DEL" marketeer-id="<?php echo $marketeer['id'] ?>"><span class="glyphicon glyphicon-trash"></span></a>
                  </div>
                </div>
              </li>
            <?php endforeach; ?>
              <li class="divider"></li>
              <li><a href="/admin/compare" class="btn btn-default">Bekijk & Vergelijk</a></li>
            </ul>          
        </li>
        <li><a href="#"><span class="glyphicon glyphicon-tasks"></span></a></li>
        <li>|</li>
        <li><a href="#"><span class="glyphicon glyphicon-star-empty"></span></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-briefcase"></span></a></li>
        <li><a href="#"><span class="glyphicon glyphicon-comment"></span></a></li>
        <li><a href="#"><span class="glyphicon glyphicon-pencil"></span></a></li>
        <li><a href="#"><span class="glyphicon glyphicon-thumbs-up"></span></a></li>
        <li><a href="#"><span class="glyphicon glyphicon-bullhorn"></span></a></li>
        <li><a href="#"><span class="glyphicon glyphicon-cloud"></span></a></li>
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><a href="#"><span class="glyphicon glyphicon-cog"></span></a></li>
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
<div id="container">
	<div id="body">
