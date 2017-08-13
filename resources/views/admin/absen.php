<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Praktikum UNISKA FTI Banjarbaru</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="css/bootstrap.css" rel="stylesheet">
        
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
                    <li class="active">Data Absen Praktikum</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2>Data Absen Praktikum </h2>
                </div>
                <!-- END PAGE TITLE -->                

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                
                
                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                </div>
                                <div class="panel-body">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th><center>No</center></th>
                                                <th><center>NPM</center></th>
                                                <th><center>Nama</center></th>
                                                <th><center>Kelas</center></th>
                                                <th><center>Materi<center></th>
												<th><center>Pertemuan<center></th>
												<th><center>Tanggal Praktikum<center></th>
												<th><center>Jam Praktikum<center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><center>1</center></td>
                                                <td><center>15630111</center></td>
                                                <td><center>Agung Dwi Meidiantoro</center></td>
                                                <td><center>Regular Pagi</center></td>
                                                <td><center>WEB 2</center>
												<td><center>ke 1</center>
												<td><center>12 September 2017</center>
												<td><center>13.00-15.00</center></td>
											</tr>
											<tr>
												<td><center>2</center></td>
                                                <td><center>15630174</center></td>
                                                <td><center>Ahmad Farhan</center></td>
                                                <td><center>Regular Malam</center></td>
                                                <td><center>WEB 2</center>
												<td><center>ke 1</center>
												<td><center>12 September 2017</center>
												<td><center>13.00-15.00</center></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END DEFAULT DATATABLE -->
                            </div>
                            <!-- END SIMPLE DATATABLE -->

                        </div>
                    </div>                                
                    
                </div>
                <!-- PAGE CONTENT WRAPPER -->                                
            </div>    
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->       
        
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






