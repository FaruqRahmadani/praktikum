<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- META SECTION -->
    <title>Praktikum UNISKA FTI Banjarbaru</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="/public-admin/css/bootstrap.css" rel="stylesheet">

    <link rel="icon" href="uniska.ico" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="/public-admin/css/theme-default.css"/>
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
            <a href="{{Request::url()}}">Admin</a>
            <a href="#" class="x-navigation-control"></a>
          </li>
          <li class="xn-profile">
            <div class="profile">
              <div class="profile-image">
                <img src="/public-admin/assets/images/users/no-image.jpg" alt="John Doe"/>
              </div>
              <div class="profile-data">
                <div class="profile-data-name">{{Auth::guard('admin')->user()->nama}}</div>
                <div class="profile-data-title">Admin</div>
              </div>
              <div class="profile-controls">
                <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-pencil"></span></a>
                <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-info"></span></a>
              </div>
            </div>
          </li>
          <li class="active">
            <a href="/admin"><span class="fa fa-home"></span> <span class="xn-text">Beranda</span></a>
          </li>
          <li class="xn-openable">
            <a href="#"><span class="fa fa-table"></span> <span class="xn-text">Master Data</span></a>
            <ul>
              <li><a href="/admin/datamahasiswa"><span class="fa fa-users"></span>Data Mahasiswa</a></li>
              <li><a href="/admin/datadosen"><span class="fa fa-users"></span>Data Dosen</a></li>
		          <li><a href="/admin/datamateri"><span class="fa fa-users"></span>Data Materi</a></li>
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
              <li><a href="/admin/laporan_absen">Laporan Data Absen Praktikum</a></li>
            </ul>
          </li>
          <li class="xn-openable">
            <a href="#"><span class="glyphicon glyphicon-file"></span> <span class="xn-text">Berita</span></a>
            <ul>
              <li><a href="/admin/berita/add"><span class="fa fa-users"></span>Input Berita</a></li>
							<li><a href="/admin/berita"><span class="fa fa-users"></span>List Berita</a></li>
						</ul>
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
          <li class="xn-icon-button pull-right">
            <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-power-off"></span><span class="xn-text"></span></a>
          </li>
        </ul>
        <!-- END X-NAVIGATION VERTICAL -->
        @yield('content')
        <div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-content">
            <ul class="list-inline item-details">
              <li><a href="http://themifycloud.com/downloads/janux-premium-responsive-bootstrap-admin-dashboard-template/">Admin templates</a></li>
              <li><a href="http://themescloud.org">Bootstrap themes</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- START DASHBOARD CHART -->
      <div class="chart-holder" id="dashboard-area-1" style="height: 200px;"></div>
        <div class="block-full-width">
        </div>
        <!-- END DASHBOARD CHART -->
      </div>
      <!-- END PAGE CONTENT WRAPPER -->
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
<audio id="audio-alert" src="/public-admin/audio/alert.mp3" preload="auto"></audio>
<audio id="audio-fail" src="/public-admin/audio/fail.mp3" preload="auto"></audio>
<!-- END PRELOADS -->

<!-- START SCRIPTS -->
<!-- START PLUGINS -->
<script type="text/javascript" src="/public-admin/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/public-admin/js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="/public-admin/js/plugins/bootstrap/bootstrap.min.js"></script>
<!-- END PLUGINS -->

<!-- START THIS PAGE PLUGINS-->
<script type='text/javascript' src='/public-admin/js/plugins/icheck/icheck.min.js'></script>
<script type="text/javascript" src="/public-admin/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
<script type="text/javascript" src="/public-admin/js/plugins/scrolltotop/scrolltopcontrol.js"></script>

<script type="text/javascript" src="/public-admin/js/plugins/morris/raphael-min.js"></script>
<script type="text/javascript" src="/public-admin/js/plugins/morris/morris.min.js"></script>
<script type="text/javascript" src="/public-admin/js/plugins/rickshaw/d3.v3.js"></script>
<script type="text/javascript" src="/public-admin/js/plugins/rickshaw/rickshaw.min.js"></script>
<script type='text/javascript' src='/public-admin/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
<script type='text/javascript' src='/public-admin/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>
<script type='text/javascript' src='/public-admin/js/plugins/bootstrap/bootstrap-datepicker.js'></script>
<script type="text/javascript" src="/public-admin/js/plugins/owl/owl.carousel.min.js"></script>

<script type="text/javascript" src="/public-admin/js/plugins/moment.min.js"></script>
<script type="text/javascript" src="/public-admin/js/plugins/daterangepicker/daterangepicker.js"></script>
<!-- END THIS PAGE PLUGINS-->

<!-- START TEMPLATE -->
<script type="text/javascript" src="/public-admin/js/plugins.js"></script>
<script type="text/javascript" src="/public-admin/js/actions.js"></script>

<script type="text/javascript" src="/public-admin/js/demo_dashboard.js"></script>

<script type="text/javascript" src="/public-admin/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/public-admin/js/ckeditor/ckeditor.js"></script>
<!-- END TEMPLATE -->
<!-- END SCRIPTS -->
</body>
</html>
