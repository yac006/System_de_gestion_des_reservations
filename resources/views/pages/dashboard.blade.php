
    <!-- Small Stats Blocks -->
    <div class="row box_container">
      <div class="col-lg col-md-6 col-sm-6 mb-4" id="box">
        <div class="stats-small stats-small--1 card card-small">
          <div class="cont_icon hvr-radial-out" >
            <a href="{{ route('multiPages' , $param = "accueil")}}">
              <i class="zmdi zmdi-home zmdi-hc-5x hvr-wobble-horizontal" style="color:#c3c7cc; "></i>
            </a>
            
          </div>
          {{-- <span style="display:block">Accueil</span> --}}
        </div>
      </div>
      <div class="col-lg col-md-6 col-sm-6 mb-4">
        <div class="stats-small stats-small--1 card card-small">
          <div class="cont_icon hvr-radial-out">
            <a href="{{ route('multiPages' , $param = "Planifications")}}">
              <i class="zmdi zmdi-calendar-note zmdi-hc-5x hvr-wobble-horizontal" style="color:#c3c7cc; "></i>
            </a>
          </div>
        </div>
      </div>
      <div class="col-lg col-md-4 col-sm-6 mb-4">
        <div class="stats-small stats-small--1 card card-small">
        <div class="cont_icon hvr-radial-out">
          <a href="{{ route('multiPages' , $param = "contact")}}">
              <i class="zmdi zmdi-email zmdi-hc-5x hvr-wobble-horizontal" style="color:#c3c7cc; "></i>
          </a>
        </div>
        </div>
      </div>
      <div class="col-lg col-md-4 col-sm-6 mb-4">
        <div class="stats-small stats-small--1 card card-small">
        <div class="cont_icon hvr-radial-out">
          <a href="{{ route('multiPages' , $param = "administration")}}">
              <i class="zmdi zmdi-accounts zmdi-hc-5x hvr-wobble-horizontal" style="color:#c3c7cc; "></i>
          </a>
        </div>
        </div>
      </div>
      <div class="col-lg col-md-4 col-sm-12 mb-4">
        <div class="stats-small stats-small--1 card card-small">
        <div class="cont_icon hvr-radial-out">
          <a href="{{ route('multiPages' , $param = "réservation")}}">
            <i class="zmdi zmdi-assignment-o zmdi-hc-5x hvr-wobble-horizontal" style="color:#c3c7cc; "></i>
          </a>
        </div>
        </div>
      </div>
      <!-- show all elements icon-->
      {{-- <a href="#" id="show_all_elements_icon"><i class="zmdi zmdi-swap-vertical zmdi-hc-1x"></i></a> --}}

    </div>
    <!-- End Small Stats Blocks -->



    <div class="row">

          @include('components.chart_line_script')
          
          @include('components.chart_pie_script')

    </div>






