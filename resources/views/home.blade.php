@extends('layouts.header')

@section('content')
    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container">

          <div class="text-center">
            <h3>Animals are such agreeable friends</h3>
            <h3>Choose your time to check animal health</h3>
            <p>List Jadwal</p>
          </div>

        </div>
      </section><!-- End Cta Section -->
      <!-- ======= Services Section ======= -->

      <!-- ======= Services Section ======= -->

    <section id="services" class="services section-bg">
        <div class="container">


            <div class="row">
                <div class="col-lg-12 margin-tb">

                    {{-- <form method="get" action="#">
                        <div class="float-right my-2" style="margin-left:20px;">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>

                        <div class="float-right my-2">
                            <input type="search" name="search" class="form-control" id="cari" aria-describedby="search" >
                        </div> --}}

                    {{-- </form> --}}

                </div>
            </div>
        </br>
        @foreach($jadwal->chunk(4) as $chunk)

        <div class="row">
            @foreach ($chunk as $jadwal)

            <div class="col-lg-3 col-md-2 d-flex align-items-stretch"  id="range">
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
    </section>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->


@endsection
