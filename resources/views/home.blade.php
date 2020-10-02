@extends('layouts.app')
<style>

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #ffffff;
                padding: 0 25px;
                font-size: 13px;
                font-weight: bold;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .row{
                padding-left:270px;
                padding-right:10px;
                padding-bottom:50px;
            }
            .card {
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                transition: 0.3s;
                width: 20%;
                border-radius: 5px;
                margin:30px;
            }

            .card:hover {
                box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            }

            img {
                border-radius: 5px 5px 0 0;
                height:200px;
                
            }

            .container {
                padding: 2px 16px;
            }
        </style>
@section('content')
@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{session('error')}}
    </div>
@endif

<div class="row">
@can('edit-users')
<div class="card">
  <img src="https://i2.wp.com/supertechman.com.au/wp-content/uploads/2019/01/user-management.jpg?resize=880%2C660&ssl=1" alt="korisnici" style="width:100%;padding:10px;">
  <div class="container">
    <a href="{{route('admin.users.index')}}"><h4><b>Korisnici</b></h4></a>
  </div>
</div>
@endcan
@can('profesori-users')
<div class="card">
  <img src="https://w7.pngwing.com/pngs/196/167/png-transparent-computer-icons-convention-teacher-professor-angle-text-photography.png" alt="profesor" style="width:100%;padding:10px;">
  <div class="container">
    <a href="{{route('prof')}}"><h4><b>Profesori</b></h4></a>
  </div>
</div>
@endcan
<div class="card">
  <img src="https://cdn.worldvectorlogo.com/logos/google-classroom.svg" alt="ucionica" style="width:100%;padding:10px;">
  <div class="container">
  <a href="{{route('ucionic')}}"><h4><b>Učionice</b></h4></a>
  </div>
</div>
<div class="card">
  <img src="https://n7.nextpng.com/sticker-png/220/788/sticker-png-graphics-illustration-time-icon-calendar-text-logo-sign.png" alt="rezervacije" style="width:100%;padding:10px;">
  <div class="container">
  <a href="{{route('sverez')}}"><h4><b>Sve rezervacije</b></h4></a>
  </div>
</div>
@can('manage-users')
<div class="card">
  <img src="https://images.spot.im/v1/production/lmoadutftldiresymzmq" alt="rezervacije" style="width:100%;padding:10px;">
  <div class="container">
  <a href="{{route('vasarez')}}"><h4><b>Vaše Rezervacije</b></h4></a>
  </div>
</div>
@endcan
</div>
@endsection
