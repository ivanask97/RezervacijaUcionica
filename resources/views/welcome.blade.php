<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Rezervacija učionica</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0px;
                padding-left:200px;
                padding-top:30px;
                
            }

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

            .column {
                width: 40%;
                margin-bottom: 16px;
                padding: 0 8px;
              }

              /* Display the columns below each other instead of side by side on small screens */
              @media screen and (max-width: 650px) {
                .column {
                  width: 100%;
                  display: block;
                }
              }

/* Add some shadows to create a card effect */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}

/* Some left and right padding inside the container */
.container {
  padding: 0 16px;
}

/* Clear floats */
.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}
        </style>
    </head>
    <body>

   <div class="column">
    <div class="card">
      <img src="https://www.econ.uth.gr/images/uth_images/booking_logo.png" alt="logo" style="width:100%">
      <div class="container" style="text-align:center;">
      <h2><b>Rezervacija učionica</b></h2>
      @if (Route::has('login'))
                <div class="container">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}"><p><button class="button">Login</button></p></a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"><p><button class="button">Register</button></p></a>
                        @endif
                    @endauth
                </div>
            @endif
      </div>
    </div>
  </div>

    </body>
</html>
