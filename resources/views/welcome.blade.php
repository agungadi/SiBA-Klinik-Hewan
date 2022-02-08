<!DOCTYPE html>
<html lang="en">

<head>

  <title>SIBA</title>


  <link href="{{asset('bootstrap/sibalogo.png')}}" rel="icon">

  <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('icofont/icofont.min.css')}}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto" >
      <a href="navbar-brand">
        <img src="{{asset('bootstrap/sibahome.png')}}" width="150" height="80" class="d-inline-block align-top" alt="">

      </a>
    </h1>


      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active">
            <a href="#hero" style="font-size:18px; color:white; font-weight: bold;"> Home</a>
          </li>
          <li><a href="#services" style="font-size:18px; color:white; font-weight: bold;"> List Jadwal</a></li>
          <li><a href="#contact" style="font-size:18px; color:white; font-weight: bold;"> Contact</a></li>

        </ul>
      </nav><!-- .nav-menu -->

      <!-- <a href="{{ route('register') }}" class="get-started-btn scrollto">Register Now</a> -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container text-center text-md-left" data-aos="fade-up">
      <h1>Welcome to SIBA</h1>
      <h2>Your healthy animal will be healthy</h2>
      <a href="{{ route('login') }}" class="btn-get-started scrollto">Login</a>
      <a href="{{ route('register') }}"  class="btn-get-started scrollto">Register Now</a>
    </div>
  </section><!-- End Hero -->
  <main id="main">

  <!-- ======= Check Jadwal ======= -->
{{--
    <div class="section-center">
        <div class="container">
            <div class="row"> --}}
                <div class="booking-form">
                    <form method="get" action="{{ route('carihome') }}">
                        <div class="row no-margin">

                            <div class="col-md-9">
                                <div class="row no-margin">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="form-label">Tanggal</span>
                                            <input class="form-control" name="search" type="date" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span class="form-label">Pilih Sesi</span>
                                            <select class="form-control" name="sesi">
                                                <option value="Pagi">Pagi (08:00 - 11:00 WIB)</option>
                                                <option value="Siang">Siang (12:00 - 15:00 WIB) </option>
                                            </select>
                                            <span class="select-arrow"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-btn">
                                    <button class="submit-btn">Cek Jadwal</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            {{-- </div>
        </div>
    </div> --}}

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title">
          <h2>List Jadwal Tersedia</h2>
          <p>Daftar Sekarang</p>
        </div>
        @foreach($jadwal->chunk(3) as $chunk)

        <div class="row">
            @foreach ($chunk as $jadwal)

            <div class="col-lg-4 col-md-1 d-flex align-items-stretch"  id="range">
                <div class="icon-box">
                    <div class="jumbotron">
                        <p class="atas" style="font-size: 24px">{{ date('F', strtotime($jadwal->jadwal_date)) }}</p>

                        <h1>{{ date('d', strtotime($jadwal->jadwal_date)) }}</h1>
                        <hr>
                        <p style="font-weight: bold; font-size:16px">{{ $jadwal->jam_sesi }}</p>
                        <p style="font-weight: bold; font-size:16px">Available {{ $jadwal->jumlah }}</p>

                      </div>
                      @if($jadwal->jumlah >= '1')
                      <a href="{{ route('registrasiantrean',$jadwal->id) }}"  class="btn btn-info">Daftar Antrean </a>
                      @endif


                </div>

            </div>
            @endforeach
      </div>
      @endforeach

    </div>
    </section><!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="text-center">
          <h3>Pets are humanizing</h3>
          <p>Animals are sentient, intelligent, perceptive, funny and entertaining</p>
          <a class="cta-btn" href="{{ route('admin.login') }}">Login Admin</a>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Contact</h2>
          <p>Lokasi Klinik Hewan</p>
        </div>

        <div class="row no-gutters justify-content-center" data-aos="fade-up">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p>Jl. Darmawangsa VI, RT.5/RW.1, Pulo, Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12160</p>
              </div>

              <div class="email mt-4">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>Kliniksiba@gmail.com</p>
              </div>

              <div class="phone mt-4">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p>(0851) 566508323 </p>
              </div>

            </div>

          </div>

          <div class="col-lg-5 d-flex align-items-stretch">
            <iframe style="border:0; width: 100%; height: 320px;" src="https://maps.google.com/maps?q=-6.253047725310654, 106.80145619903774&z=15&output=embed" frameborder="0" allowfullscreen></iframe>

          </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>SiBA</span></strong> 2021
      </div>

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->


  <script src="{{asset('bootstrap/jquery/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('bootstrap/jquery/jquery.easing/jquery.easing.min.js')}}"></script>


  <!-- Template Main JS File -->
  <script src="{{asset('bootstrap/js/main.js')}}"></script>

</body>

</html>
