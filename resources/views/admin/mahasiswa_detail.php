<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Praktikum UNISKA FTI Banjarbaru</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/site.css" rel="stylesheet">

        
        <link rel="icon" href="uniska.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="admin_home.php">Admin</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <div class="profile">
                            <div class="profile-image">
                                <img src="assets/images/users/no-image.jpg" alt="John Doe"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">Junaidi Ramadani</div>
                                <div class="profile-data-title">Admin</div>
                            </div>
                            <div class="profile-controls">
                                <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-pencil"></span></a>
                                <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-info"></span></a>
                            </div>
                        </div>                                                                        
                    </li>
                    <li class="active">
                        <a href="admin_home.php"><span class="fa fa-home"></span> <span class="xn-text">Beranda</span></a>                        
                    </li>                    
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-table"></span> <span class="xn-text">Master Data</span></a>
                        <ul>
                           <li><a href="mahasiswa_data.php"><span class="fa fa-users"></span>Data Mahasiswa</a></li>
                            <li><a href="dosen_data.php"><span class="fa fa-users"></span>Data Dosen</a></li>
							<li><a href="materi_data.php"><span class="fa fa-users"></span>Data Materi</a></li>
                            <li><a href="#"><span class="fa fa-users"></span>Data Berita</a></li>
							<li><a href="absen.php"><span class="fa fa-users"></span>Data Absen Praktikum</a></li>
						</ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">Laporan</span></a>
                        <ul>
                            <li><a href="laporan_data.php">Laporan Pelaksanaan Praktikum</a></li>
                            <li><a href="#">Laporan Detail Pelaksanaan Praktikum</a></li>
							<li><a href="laporan_mahasiswa_data.php">Laporan Data Mahasiswa</a></li>
                            <li><a href="laporan_absen.php">Laporan Data Absen Praktikum</a></li>
                        </ul>
                    </li>
                     <li class="xn-icon-button">
                        <a href="admin_home.php" class="mb-control" data-box="#mb-signout"><span class="fa fa-power-off"></span><span class="xn-text">Log Out</span></a>
                    </li>
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->   
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->
				
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Beranda</a></li>
                    <li><a href="#">Master Data</a></li>                                        
                    <li class="active">Data Mahasiwa</li>
					<li class="active">Detail Data Mahasiwa</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2>Detail Data Mahasiswa</h2>
                </div>
                <!-- END PAGE TITLE -->
			<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="assets/images/users/IMG_8096.jpg"" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <table class="table tabel-striped table-condensed">
					<tr>
						<th>NPM</th>
						<td>15630121</td>
					</tr>
					<tr>
						<th>Nama</th>
						<td>Junaidi Ramadani</td>
					</tr>
					<tr>
						<th>Semester</th>
						<td>5</td>
					</tr>
					</table>
				
						<a href="mahasiswa_data.php" class="btn btn-primary btn-rounded"><span class="fa fa-arrow-circle-left
						Close" aria-hidden="true"></span>Kembali</a>
						<a href="#" class="btn btn-success btn-rounded"><span class="fa fa-edit Close"
						aria-hidden="true"></span> Edit Data </a>
						<a href="#" title=
											"Hapus Data" onclick="return confirm('Anda yakin akan menghapus data <?php
											echo $row['nama']; ?>?')" class="btn btn-danger btn-rounded"><span class=
											"glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus Data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title">
                    <span class="fa fa-sign-out"></span> Keluar ?
                    </div>
                    <div class="mb-content">
                            <h4 style="color: #ffffff";>Anda yakin ingin keluar?</h4>  
                            <h4 style="color: #ffffff";>Tekan No untuk melanjutkan. Tekan Yes untuk keluar.</h4>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="login_dosen.php" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                       
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->                

        <!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
        <script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>    
        <!-- END PAGE PLUGINS -->

        <!-- START TEMPLATE -->
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>        
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS --> 
        
    </body>
</html>






