<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- META SECTION -->
    <title>Program Praktikum Uniska MAB</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="/public-mahasiswa/css/theme-default.css"/>
    <link rel="stylesheet" type="text/css" id="theme" href="/public-mahasiswa/css/site.css"/>

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
                <a href="mahasiswa.php">JPP UNISKA</a>
                <a href="#" class="x-navigation-control"></a>
            </li>
            <li class="xn-profile">
              <a href="#" class="profile-mini">
                  <img src="/images/mahasiswa/{{$data->foto}}" alt="{{$data->nama}}"/>
              </a>
              <div class="profile">
                <div class="profile-image">
                  <img src="/images/mahasiswa/{{$data->foto}}" alt="{{$data->nama}}"/>
                </div>
                <div class="profile-data">
                    <div class="profile-data-name">{{$data->nama}}</div>
                    <div class="profile-data-title">{{$data->NPM}}</div>
                </div>
                <div class="profile-controls">
                    <a href="/mahasiswa/editprofil" data-toggle="tooltip" title="Edit Data" data-placement="bottom" class="profile-control-left"><span class="fa fa-edit"></span></a>
                    <a href="/mahasiswa/profil" data-toggle="tooltip" title="Detail" data-placement="bottom" class="profile-control-right"><span class="fa fa-list"></span></a>
                </div>
              </div>
            </li>
            <li class="xn-title">Menu</li>
              <li class="active">
                  <a href="/mahasiswa"><span class="fa fa-home"></span> <span class="xn-text">Home</span></a>
              </li>
              <li>
                  <a href="/mahasiswa/materi"><span class="fa fa-table"></span> <span class="xn-text">Materi</span></a>
              </li>
	          <li>
              <a href="/mahasiswa/jadwalsaya"><span class="fa fa-th"></span> <span class="xn-text">Jadwal Saya</span></a>
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
                        <a href="#" data-toggle="tooltip" title="Navigation" data-placement="bottom" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SEARCH -->
                    <li class="xn-search">
                        <form role="form">
                            <input type="text" name="search" placeholder="Search..."/>
                        </form>
                    </li>
                    <!-- END SEARCH -->
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" data-toggle="tooltip" title="Log Out" data-placement="left" class="mb-control" data-box="#mb-signout"><span class="fa fa-power-off"></span></a>
                    </li>
                    <!-- END SIGN OUT -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->

                @yield('content')
                <!-- MESSAGE BOX-->
                <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
                  <div class="mb-container">
                    <div class="mb-middle">
                      <div class="mb-title"><span class="fa fa-power-off"></span> Log <strong>Out</strong> ?</div>
                      <div class="mb-content">
                        <p>Anda Yakin Ingin Keluar?</p>
                        <p>Tekan No Untuk Melanjutkan. Tekan Yes Untuk Keluar.</p>
                      </div>
                      <div class="mb-footer">
                        <div class="pull-right">
                          <a href="{{ route('logout') }}" class="btn btn-success btn-lg"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Yes
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                          <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="/public-mahasiswa/audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="/public-mahasiswa/audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->

        <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="/public-mahasiswa/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="/public-mahasiswa/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="/public-mahasiswa/js/plugins/bootstrap/bootstrap.min.js"></script>
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->
        <script type='text/javascript' src='/public-mahasiswa/js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="/public-mahasiswa/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="/public-mahasiswa/js/plugins/scrolltotop/scrolltopcontrol.js"></script>

        <script type="text/javascript" src="/public-mahasiswa/js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="/public-mahasiswa/js/plugins/morris/morris.min.js"></script>
        <script type="text/javascript" src="/public-mahasiswa/js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="/public-mahasiswa/js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src='/public-mahasiswa/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='/public-mahasiswa/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>
        <script type='text/javascript' src='/public-mahasiswa/js/plugins/bootstrap/bootstrap-datepicker.js'></script>
        <script type="text/javascript" src="/public-mahasiswa/js/plugins/owl/owl.carousel.min.js"></script>

        <script type="text/javascript" src="/public-mahasiswa/js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="/public-mahasiswa/js/plugins/daterangepicker/daterangepicker.js"></script>
        <script type="text/javascript" src="/public-mahasiswa/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <!-- END THIS PAGE PLUGINS-->

        <!-- START TEMPLATE -->

        <script type="text/javascript" src="/public-mahasiswa/js/plugins.js"></script>
        <script type="text/javascript" src="/public-mahasiswa/js/actions.js"></script>

        <script type="text/javascript" src="/public-mahasiswa/js/demo_dashboard.js"></script>

        <script src="/public-mahasiswa/js/jquery.js"></script>
        <script src="/public-mahasiswa/js/bootstrap.min.js"></script>
        <!-- END TEMPLATE -->
      <!-- END SCRIPTS -->
  </body>
</html>
