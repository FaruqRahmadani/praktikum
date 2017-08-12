@extends('depan.master')
@section('content')
  <html lang="en">
    <body>
      <div class="container">
        <div class="row">
          <!-- Blog Entries Column -->
          <div class="col-md-8">

            <h1 class="page-header">
              Beranda
              <small>Info dan Berita</small>
            </h1>

            <!-- First Blog Post -->
            <h2>
              <a href="#">Judul Berita</a>
            </h2>
            <p class="lead">
              by <a href="index.php">UNISKA</a>
            </p>
            <p>
              <span class="glyphicon glyphicon-time"></span> Posted on August 01, 2017 at 10:00 PM
            </p>
            <hr>
            <img class="img-responsive" src="http://placehold.it/900x300" alt="">
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.</p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            <hr>
            <!-- Second Blog Post -->
            <h2>
              <a href="#">Judul Berita</a>
            </h2>
            <p class="lead">
              by <a href="index.php">UNISKA</a>
            </p>
            <p>
              <span class="glyphicon glyphicon-time"></span> Posted on August 02, 2017 at 10:45 PM
            </p>
            <hr>
            <img class="img-responsive" src="http://placehold.it/900x300" alt="">
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, quasi, fugiat, asperiores harum voluptatum tenetur a possimus nesciunt quod accusamus saepe tempora ipsam distinctio minima dolorum perferendis labore impedit voluptates!</p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>
            <!-- Third Blog Post -->
            <h2>
              <a href="#">Judul Berita</a>
            </h2>
            <p class="lead">
              by <a href="index.php">UNISKA</a>
            </p>
            <p>
              <span class="glyphicon glyphicon-time"></span> Posted on August 03, 2017 at 10:45 PM
            </p>
            <hr>
            <img class="img-responsive" src="http://placehold.it/900x300" alt="">
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, voluptates, voluptas dolore ipsam cumque quam veniam accusantium laudantium adipisci architecto itaque dicta aperiam maiores provident id incidunt autem. Magni, ratione.</p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>
            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>

          </div>

            <!-- Blog Sidebar Widgets Column -->
          <div class="col-md-4">
                <!-- Blog Search Well -->
            <div class="well">
              <h4>Search</h4>
              <div class="input-group">
                <input type="text" class="form-control">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button">
                    <span class="glyphicon glyphicon-search"></span>
                  </button>
                </span>
              </div>
              <!-- /.input-group -->
            </div>

                <!-- Blog Categories Well -->
            <div class="well">
      				<p>
                <a class="btn btn-default btn-lg" role="button" data-toggle="modal" data-target="#daftar">REGISTER DOSEN</a>
      				  <a class="btn btn-default btn-lg" role="button" data-toggle="modal" data-target="#register">REGISTER MAHASISWA</a>
      				  <a class="btn btn-default btn-lg" role="button" data-toggle="modal" data-target="#masuk">LOGIN</a>
              </p>
                <?php// include 'inc/masuk.php';?>

              <div id="daftar" class="modal fade" role="dialog">
                <div class="modal-dialog">
                  <!-- konten modal-->
                  <div class="modal-content">
				                    <!-- heading modal -->
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title" id="myModalLabel">Register Dosen</h4>
                    </div>
                    @if(count($errors) > 0)
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li> {{$error}} </li>
                        @endforeach
                      </ul>
                    @endif
                    <div class="modal-body">
                      <form action="{{ route('register') }}" name="modal_popup" enctype="multipart/form-data" method="POST">

                        <div class="form-group" style="margin-bottom: 0px;">
                            <label for="">NIDN</label>
                            <input type="text" name="nomorinduk" class="form-control" placeholder="Nama" required/>
                        </div>

                        <div class="form-group" style="margin-bottom: 0px;">
              		          <label for="">Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama" required/>
                        </div>

                        <div class="form-group" style="margin-bottom: 0px;">
                            <label for="">No Hp</label>
                            <input type="text" name="no_hp" class="form-control" placeholder="Nama" required/>
                        </div>

                        <div class="form-group" style="margin-bottom: 0px;">
                            <label for="">E-Mail</label>
                            <input type="text" name="email" class="form-control" placeholder="Nama" required/>
                        </div>

                        <div class="form-group" style="margin-bottom: 0px;">
                            <label for="">Foto</label>
                            <input type="text" name="foto" class="form-control" placeholder="Nama" required/>
                        </div>

                        <hr>

                        <div class="form-group" style="margin-bottom: 0px;">
                            <label for="username">Username</label>
                            <input type="text" name="username"  class="form-control" placeholder="Username" required/>
                        </div>

                        <div class="form-group" style="margin-bottom: 0px;">
                            <label for="password">Password</label>
                            <input type="password" name="password"  class="form-control" placeholder="Password" required/>
                        </div>

            				    <div class="form-group" style="margin-bottom: 0px;">
                            <label for="">Re-Password</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Re-Password" required/>
                        </div>

                        <input type="hidden" name="tipe" class="form-control" placeholder="Re-Password" value="1"/>

                        {{ csrf_field() }}

                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit">
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>    SIMPAN
                            </button>

                            <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>  BATAL
                            </button>
                        </div>

                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div id="register" class="modal fade" role="dialog">
                <div class="modal-dialog">
                	<!-- konten modal-->
                	<div class="modal-content">
                    <!-- heading modal -->
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title" id="myModalLabel">Register Mahasiswa</h4>
                    </div>

                    <div class="modal-body">
                      <form action="{{ route('register') }}" name="modal_popup" enctype="multipart/form-data" method="POST">

                        <div class="form-group" style="margin-bottom: 0px;">
                            <label for="">NPM</label>
                            <input type="text" name="nomorinduk" class="form-control" placeholder="Nama" required/>
                        </div>

                        <div class="form-group" style="margin-bottom: 0px;">
		                      <label for="">Nama</label>
                          <input type="text" name="nama" class="form-control" placeholder="Nama" required/>
                        </div>

                        <div class="form-group" style="margin-bottom: 0px;">
                          <label for="">No Hp</label>
                          <input type="text" name="no_hp" class="form-control" placeholder="Nama" required/>
                        </div>

                        <div class="form-group" style="margin-bottom: 0px;">
                          <label for="">E-Mail</label>
                          <input type="text" name="email" class="form-control" placeholder="Nama" required/>
                        </div>

                        <div class="form-group" style="margin-bottom: 0px;">
                          <label for="">Foto</label>
                          <input type="text" name="foto" class="form-control" placeholder="Nama" required/>
                        </div>

                        <hr>

                        <div class="form-group" style="margin-bottom: 0px;">
                          <label for="username">Username</label>
                          <input type="text" name="username"  class="form-control" placeholder="Username" required/>
                        </div>

                        <div class="form-group" style="margin-bottom: 0px;">
                          <label for="password">Password</label>
                          <input type="password" name="password"  class="form-control" placeholder="Password" required/>
                        </div>

				                    <div class="form-group" style="margin-bottom: 0px;">
                              <label for="">Re-Password</label>
                              <input type="password" name="password_confirmation" class="form-control" placeholder="Re-Password" required/>
                            </div>

                            <input type="hidden" name="tipe" class="form-control" placeholder="Re-Password" value="2"/>
                            {{ csrf_field() }}
                            <div class="modal-footer">
                              <button class="btn btn-success" type="submit">
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>    SIMPAN
                              </button>

                              <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>  BATAL
                              </button>
                            </div>

                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
	                <div id="masuk" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                    <!-- konten modal-->
                      <div class="modal-content">
                        <!-- heading modal -->
			                  <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
			                    <h4 class="modal-title" style="font-size:40px" type>MASUK</h4>
		                    </div>
		                    <!-- body modal -->
		                    <div class="modal-body">
                          <form action="{{ route('login') }}" name="modal_popup" enctype="multipart/form-data" method="POST">
                            <div class="form-group">
                              <label for="username">Username</label>
                              <input type="text" name="username"  class="form-control" placeholder="Username" required/>
                            </div>

                            <div class="form-group">
                              <label for="password">Password</label>
                              <input type="password" name="password"  class="form-control" placeholder="Password" required/>
                            </div>
                            {{ csrf_field() }}
                    				<!-- footer modal -->
                    				<div class="modal-footer">
                    					<center><button class="btn btn-success btn-lg" type="submit" name="submit">MASUK</button></center>
                    				</div>
		                      </div>
                        </div>
                      </div>
                    </div>
		              </div>
                <!-- Side Widget Well -->
                  <div class="well">
                      <h4>Side Widget Well</h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                  </div>
                </div>
              </div>
        <!-- /.row -->
        <hr>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; UNISKA 2017</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

      </div>
      <!-- /.container -->

      <!-- jQuery -->
      <script src="js/jquery.js"></script>

      <!-- Bootstrap Core JavaScript -->
      <script src="js/bootstrap.min.js"></script>

    </body>

  </html>
@endsection
