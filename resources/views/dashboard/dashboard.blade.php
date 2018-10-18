@section('dashboard')



<meta charset="utf-8">
<!-- jQuery 3 -->
<script src="dashboard/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="dashboard/js/bootstrap.min.js"></script>
<!-- ChartJS -->
<script src="dashboard/js/Chart.js"></script>
<!--=====================================
CAJAS SUPERIORES
======================================-->
<section class="content">
  <div class="row">
    <div class="col-lg-3 col-xs-6">

      <!-- small box -->
      <div class="small-box bg-aqua">

        <!-- inner -->
        <div class="inner">

          <h3>{!! \App\Models\Reservation::all()->where('users_id','=',Auth::user()->id)->count() !!}</h3>

          <p>My Reservations</p>

        </div>
        <!-- inner -->

        <!-- icon -->
        <div class="icon">

          <i class="fa fa-trophy"></i>

        </div>
        <!-- icon -->

        <a href="{!! url('/reservations') !!}" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>

      </div>
      <!-- small-box -->

    </div>
    <div class="col-lg-3 col-xs-6">

      <!-- small box -->
      <div class="small-box bg-green">

        <!-- inner -->
        <div class="inner">

          <h3>{!! \App\Models\Stage::all()->where('users_id','=',Auth::user()->id)->count() !!}</h3>

          <p>My Stages</p>

        </div>
        <!-- inner -->

        <!-- icon -->
        <div class="icon">

          <i class="ion ion-stats-bars"></i>

        </div>
        <!-- icon -->

        <a href="{!! url('/stages') !!}" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>

      </div>
      <!-- small box -->

    </div>
    <div class="col-lg-3 col-xs-6">

      <!-- small box -->
      <div class="small-box bg-yellow">

        <!-- inner -->
        <div class="inner">

          <h3>{!! \App\Models\Vehicule::all()->where('users_id','=',Auth::user()->id)->count() !!}</h3>

          <p>My Vehicules</p>

        </div>
        <!-- inner -->

        <!-- icon -->
        <div class="icon">

          <i class="ion ion-person-add"></i>

        </div>
        <!-- icon -->

        <a href="{!! url('/vehicules') !!}" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>

      </div>
      <!-- small box -->

    </div>
    <div class="col-lg-3 col-xs-6">

        <!-- small box -->
        <div class="small-box bg-red">

          <!-- inner -->
          <div class="inner">

            <h3>{!! \App\Models\Parking::all()->where('state',"=",'Disponible')->count() !!}</h3>

            <p>Parkings</p>

          </div>
          <!-- inner -->

          <!-- icon -->
          <div class="icon">

            <i class="ion ion-pie-graph"></i>

          </div>
          <!-- icon -->

          <a href="{!! url('/jurados') !!}" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>

        </div>
        <!-- small box -->

      </div>
  </div>
@endsection
