<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Program Praktikum FTI UNISKA MAB </title>
<!--

Template 2089 Meteor

http://www.tooplate.com/view/2089-meteor

-->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="/public-depan/css/bootstrap.min.css">
        <link rel="stylesheet" href="/public-depan/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/public-depan/css/fontAwesome.css">
        <link rel="stylesheet" href="/public-depan/css/hero-slider.css">
        <link rel="stylesheet" href="/public-depan/css/tooplate-style.css">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

        <script src="/public-depan/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

<body>
    <div class="header">
        <div class="container">
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand scroll-top">
                        <div class="logo"></div>
                    </a>
                </div>
                <!--/.navbar-header-->
                <div id="main-nav" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="#" class="scroll-top">Home</a></li>
                        <li><a href="#" class="scroll-link" data-id="blog">Berita</a></li>
                        <li><a href="#" class="scroll-link" data-id="about">Materi</a></li>
                        <li><a href="#" class="scroll-link" data-id="portfolio">Galery</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Daftar <b class="caret"></b></a>
                              <ul class="dropdown-menu message-dropdown">
                              <li>
                      			<a href="/registermahasiswa"> Mahasiswa</a>
                              </li>
                              <li>
                      			<a href="/registerdosen"> Dosen</a>
                              </li>
                              </ul>
                          </li>
                        </li>
                        <li><a href="/login">Log in</a></li>
                    </ul>
                </div>
                <!--/.navbar-collapse-->
            </nav>
            <!--/.navbar-->
        </div>
        <!--/.container-->
    </div>
    <!--/.header-->


    <section class="cd-hero">
        <ul class="cd-hero-slider autoplay">
        <!--
            <ul class="cd-hero-slider autoplay"> for slider auto play
            <ul class="cd-hero-slider"> for disabled auto play
        -->
            <li class="selected first-slide">
                <div class="cd-full-width">
                    <div class="tm-slide-content-div slide-caption">
                        <span>Program Praktikum FTI</span>
                        <h2>UNISKA MUHAMMAD ARSYAD AL-BANJARI</h2>
                        <div class="primary-button">
                            <a href="#" class="scroll-link" data-id="blog">Read More</a>
                        </div>
                    </div>
                </div> <!-- .cd-full-width -->
            </li>

            <li class="second-slide">
                <div class="cd-full-width">
                    <div class="tm-slide-content-div slide-caption">
                        <span>Program Praktikum FTI</span>
                        <h2>UNISKA MUHAMMAD ARSYAD AL-BANJARI</h2>
                        <div class="primary-button">
                            <a href="#" class="scroll-link" data-id="blog">Read More</a>
                        </div>
                    </div>
                </div> <!-- .cd-full-width -->
            </li>

            <li class="third-slide">
                <div class="cd-full-width">
                    <div class="tm-slide-content-div slide-caption">
                        <span>Program Praktikum FTI</span>
                        <h2>UNISKA MUHAMMAD ARSYAD AL-BANJARI</h2>
                        <div class="primary-button">
                            <a href="#" class="scroll-link" data-id="blog">Read More</a>
                        </div>
                    </div>
                </div> <!-- .cd-full-width -->
            </li>
        </ul> <!-- .cd-hero-slider -->

        <div class="cd-slider-nav">
            <nav>
                <span class="cd-marker item-1"></span>

                <ul>
                    <li class="selected"><a href="#0"></a></li>
                    <li><a href="#0"></a></li>
                    <li><a href="#0"></a></li>
                </ul>
            </nav>
        </div> <!-- .cd-slider-nav -->
    </section> <!-- .cd-hero -->


	<div id="blog" class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h4>Berita</h4>
                        <div class="line-dec"></div>
                    </div>
                </div>
            </div>
            <div class="row">
              @php
                $no = 0;
                $bulan = array(
                  '01' => 'Januari',
                  '02' => 'Februari',
                  '03' => 'Maret',
                  '04' => 'April',
                  '05' => 'Mei',
                  '06' => 'Juni',
                  '07' => 'Juli',
                  '08' => 'Agustus',
                  '09' => 'September',
                  '10' => 'Oktober',
                  '11' => 'November',
                  '12' => 'Desember'
                );
              @endphp
              @foreach ($berita as $dataBerita)
                <div class="col-md-6">
                  <div class="blog-item b{{$no+=1}}">
                    <div class="thumb">
                      <img src="/images/berita/{{$dataBerita->gambar}}" alt="">
                      <div class="text-content">
                        <h4>{{$dataBerita->judul}}</h4>
                        <span>Posted: <em>{{$dataBerita->admin->nama}}</em>  /  Date: <em>{{Carbon\Carbon::parse($dataBerita->created_at)->format('d').' '.$bulan[Carbon\Carbon::parse($dataBerita->created_at)->format('m')].' '.Carbon\Carbon::parse($dataBerita->created_at)->format('Y')}}</em></span>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
              <div class="primary-button">
                <a href="#" class="scroll-link" data-id="blog">Read More</a>
              </div>

            <div class="row">
                <div class="col-md-12">
                  @php
                    $no=0;
                  @endphp
                  @foreach ($berita as $dataBerita)
                    @php
                      $no+=1;
                    @endphp
                    <div class="pop{{$no == 1? '':$no}}">
                      <span>✖</span>
                      <p>@php
                        echo $dataBerita->konten;
                      @endphp</p>
                    </div>
                  @endforeach
                </div>
            </div>
        </div>
    </div>


    <div id="about" class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h4>Materi</h4>
                        <div class="line-dec"></div>
                    </div>
                </div>
            </div>
            <div class="row">
              @foreach ($materi as $dataMateri)
                <div class="col-md-3 col-sm-6 project-item mix workspace">
                  <div class="thumb">
                      <div class="image">
                        <img src="/images/materi/{{$dataMateri->gambar}}">
                      </div>
                      <div class="hover-effect">
                        <h4>{{$dataMateri->materi_praktikum}}</h4>
                        <p>Semester Minimal : {{$dataMateri->semester}}</p>
                      </div>
                  </div>
                </div>
                {{-- <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="service-item first-service">
                    <div class="icon"></div>
                    <img src="/images/materi/{{$dataMateri->gambar}}" alt="">
                    <h4>{{$dataMateri->materi_praktikum}}</h4>
                    <p>Semester Minimal : {{$dataMateri->semester}}</p>
                  </div>
                </div> --}}
              @endforeach
            </div>
        </div>
    </div>

    <div id="portfolio" class="page-section">
        <div class="content-wrapper">
            <div class="inner-container container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <h4>Galery</h4>
                            <div class="line-dec"></div>
                        </div>
                    </div>
                </div>
                <div class="projects-holder-3">
                    <div class="filter-categories">
                        <ul class="project-filter">
                            <li class="filter" data-filter="all"><span>All</span></li>
                            <li class="filter" data-filter="nature"><span>Nature</span></li>
                            <li class="filter" data-filter="workspace"><span>Workspace</span></li>
                            <li class="filter" data-filter="city"><span>City</span></li>
                            <li class="filter" data-filter="technology"><span>Technology</span></li>
                        </ul>
                    </div>
                    <div class="projects-holder">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 project-item mix workspace">
                              <div class="thumb">
                                  <div class="image">
                                    <img src="/public-depan/img/portfolio_01.jpg">
                                  </div>
                                  <div class="hover-effect">
                                    <a href="/public-depan/img/portfolio_big_01.jpg" data-lightbox="image-1"><i class="fa fa-search"></i></a>
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-3 col-sm-6 project-item mix workspace">
                              <div class="thumb">
                                  <div class="image">
                                    <img src="/public-depan/img/portfolio_02.jpg">
                                  </div>
                                  <div class="hover-effect">
                                    <a href="/public-depan/img/portfolio_big_02.jpg" data-lightbox="image-1"><i class="fa fa-search"></i></a>
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-3 col-sm-6 project-item mix technology">
                              <div class="thumb">
                                  <div class="image">
                                    <img src="/public-depan/img/portfolio_03.jpg">
                                  </div>
                                  <div class="hover-effect">
                                    <a href="/public-depan/img/portfolio_big_03.jpg" data-lightbox="image-1"><i class="fa fa-search"></i></a>
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-3 col-sm-6 project-item mix city">
                              <div class="thumb">
                                  <div class="image">
                                    <img src="/public-depan/img/portfolio_04.jpg">
                                  </div>
                                  <div class="hover-effect">
                                    <a href="/public-depan/img/portfolio_big_04.jpg" data-lightbox="image-1"><i class="fa fa-search"></i></a>
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-3 col-sm-6 project-item mix nature">
                              <div class="thumb">
                                  <div class="image">
                                    <img src="/public-depan/img/portfolio_05.jpg">
                                  </div>
                                  <div class="hover-effect">
                                    <a href="/public-depan/img/portfolio_big_05.jpg" data-lightbox="image-1"><i class="fa fa-search"></i></a>
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-3 col-sm-6 project-item mix technology">
                              <div class="thumb">
                                  <div class="image">
                                    <img src="/public-depan/img/portfolio_06.jpg">
                                  </div>
                                  <div class="hover-effect">
                                    <a href="/public-depan/img/portfolio_big_06.jpg" data-lightbox="image-1"><i class="fa fa-search"></i></a>
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-3 col-sm-6 project-item mix workspace">
                              <div class="thumb">
                                  <div class="image">
                                    <img src="/public-depan/img/portfolio_07.jpg">
                                  </div>
                                  <div class="hover-effect">
                                    <a href="/public-depan/img/portfolio_big_07.jpg" data-lightbox="image-1"><i class="fa fa-search"></i></a>
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-3 col-sm-6 project-item mix city">
                              <div class="thumb">
                                  <div class="image">
                                    <img src="img/portfolio_08.jpg">
                                  </div>
                                  <div class="hover-effect">
                                    <a href="/public-depan/img/portfolio_big_08.jpg" data-lightbox="image-1"><i class="fa fa-search"></i></a>
                                  </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="copyright-text">
                        <p>Copyright &copy; 2017 FTI UNISKA
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="social-icons">
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-rss"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="/public-depan/js/vendor/bootstrap.min.js"></script>

    <script src="/public-depan/js/plugins.js"></script>
    <script src="/public-depan/js/main.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        // navigation click actions
        $('.scroll-link').on('click', function(event){
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            scrollToID('#' + sectionID, 750);
        });
        // scroll to top action
        $('.scroll-top').on('click', function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop:0}, 'slow');
        });
        // mobile nav toggle
        $('#nav-toggle').on('click', function (event) {
            event.preventDefault();
            $('#main-nav').toggleClass("open");
        });
    });
    // scroll function
    function scrollToID(id, speed){
        var offSet = 50;
        var targetOffset = $(id).offset().top - offSet;
        var mainNav = $('#main-nav');
        $('html,body').animate({scrollTop:targetOffset}, speed);
        if (mainNav.hasClass("open")) {
            mainNav.css("height", "1px").removeClass("in").addClass("collapse");
            mainNav.removeClass("open");
        }
    }
    if (typeof console === "undefined") {
        console = {
            log: function() { }
        };
    }
    </script>
</body>
</html>
