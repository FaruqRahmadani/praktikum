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
                        <a href="home.php">Dosen</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <div class="profile">
                            <div class="profile-image">
                                <img src="foto/hafidh.jpg" alt="Fathul Hafidh"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">Fathul Hafidh, S.Kom., M.Kom</div>
                                <div class="profile-data-title">Web 1</div>
                            </div>
                            <div class="profile-controls">
                                <a href="detail_dosen.php" data-toggle="tooltip" title="Profil" data-placement="bottom" class="profile-control-left"><span class="glyphicon glyphicon-user"></span></a>
                                <a href="#" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div>
                        </div> 
                    </li>    
                    <li class="xn-title">Menu</li>
                    <li>
                        <a href="home.php"><span class="fa fa-home"></span><span class="xn-text">Beranda</span></a>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-bars"></span> <span class="xn-text">Master Data</span></a>
                        <ul>
                            <li><a href="data_mahasiswa.php"><span class="fa fa-users"></span>Data Mahasiswa</a></li>
                            <li><a href="data_dosen.php"><span class="fa fa-users"></span>Data Dosen</a></li>
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-bars"></span> <span class="xn-text">Proses Data</span></a>
                        <ul>
                            <li><a href="materi_dosen.php"><span class="fa fa-file"></span>Materi Dosen</a></li>
                            <li><a href="jdwl_dosen.php"><span class="fa fa-file"></span>Jadwal Dosen</a></li>
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-bars"></span> <span class="xn-text">Absensi</span></a>
                        <ul>
                            <li><a href="absen.php"><span class="fa fa-print"></span>Cetak Absensi</a></li>
                        </ul>
                    </li>
                    <li class="xn-icon-button">
                        <a href="home.php" class="mb-control" data-box="#mb-signout"><span class="fa fa-power-off"></span><span class="xn-text">Log Out</span></a>
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
                        <a href="#" data-toggle="tooltip" title="Navigation" data-placement="right" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION --> 
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" data-toggle="tooltip" title="Log Out" data-placement="left" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>    
                    </li> 
                    <!-- END SIGN OUT -->                   
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     
                
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                <li class="active">Menu</li>
                <li class="active">Master Data</li>                  
                <li><a href="data_dosen.php" data-toggle="tooltip" title="Go to Data Dosen" data-placement="bottom">Data Dosen</a></li>
                <li><a href="detail_dosen1.php" data-toggle="tooltip" title="Go to Detail Dosen" data-placement="bottom">Detail Dosen</a></li>
                </ul>

                <!-- END BREADCRUMB -->                
                 <div class="row">
                 <div class="page-title">
                    <h1>Detail Dosen</h1>
                 </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="foto/dedy.jpg"" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <table class="table tabel-striped table-condensed">
                    <tr>
                        <th>NIDN</th>
                        <td>1956356452123456578</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>Dedy Rosyadi, S.Kom., M.Kom</td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td>dedy</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>dedy@gmail.com</td>
                    </tr>
                    <tr>
                        <th>No Hp</th>
                        <td>081953666874</td>
                    </tr>
                    </table>
                    </div>
                </div>
            </div>
        </div>           
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-remove-row">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-times"></span> Hapus Data?</div>
                    <div class="mb-content">
                        <h4 style="color: #ffffff";>Anda yakin ingin menghapus baris ini?</h4>  
                        <h4 style="color: #ffffff";>Tekan Yes jika kamu yakin.</h4>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <button class="btn btn-success btn-lg mb-control-yes">Yes</button>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

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
        <script type="text/javascript" src="js/demo_tables.js"></script> 
        <script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>    
        <!-- END PAGE PLUGINS -->

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>        
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS --> 
        
    </body>
</html>






