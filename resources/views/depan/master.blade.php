<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width-device-width, initial=scale=1">
	<title>FTI.Praktikum</title>

	<link href="/depan/css/blog-home.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/depan/css/bootstrap.css">
	<script type="text/javascript" src="/depan/js/jquery.js"></script>
	<script type="text/javascript" src="/depan/js/bootstrap.js"></script>
	<link href="/depan/css/site.css" rel="stylesheet">
	<link href="/depan/css/bootstrap.min.css" rel="stylesheet">
	<link href="/depan/css/plugins/morris.css" rel="stylesheet">
	<link href="/depan/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body>
<div class="container">
<div class="content">
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
	<div class="navbar-header">
		<a class="navbar-brand" href="#">JPP</a>
	</div>
	<ul class="nav navbar-nav">
		<li class="active"><a href="/jpp/"> <span class="glyphicon glyphicon-home"></span> Home</a></li>
		<li><a href="#">Jadwal Praktek</a></li>
		<li><a href="#">Gallery</a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
	<li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> Daftar <b class="caret"></b></a>
        <ul class="dropdown-menu message-dropdown">
        <li>
			<a href="login_mahasiswa.php"><i class="fa fa-fw fa-user"></i> Mahasiswa</a>
        </li>
        <li>
			<a href="#"><i class="fa fa-fw fa-user"></i> Dosen</a>
        </li>
        </ul>
    </li>
	<li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-log-in"></i> Login <b class="caret"></b></a>
        <ul class="dropdown-menu message-dropdown">
        <li>
			<a href="login_mahasiswa.php"><i class="fa fa-fw fa-user"></i> Mahasiswa</a>
        </li>
        <li>
			<a href="#"><i class="fa fa-fw fa-user"></i> Dosen</a>
        </li>
        </ul>
    </li>
	</ul>
   </div>
</nav>
</div>
</div>
	<div class="container">
		<div class="content">
</body>

@yield('content');
