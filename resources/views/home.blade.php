<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @if(Auth::user()->role === 'admin')
    <meta http-equiv="refresh" content="5;{{ route('admin_home') }}" />
    @else
    <meta http-equiv="refresh" content="5;url={{ route('map_home') }}" />
    @endif
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
    />
    <style>
      body {
        height: 100vh;
        animation: color 2s;
      }

      .container,
      .row,
      .col {
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
      }
      p {
        font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande",
          "Lucida Sans", Arial, sans-serif;
      }

      h1 {
        font-family: cocon;
        animation: fade 2s;
        color: rgb(34, 87, 87);
      }
      p {
        animation-delay: 2s;
        animation: fade 2s;
      }

      @keyframes fade {
        from {
          opacity: 0;
        }

        to {
          opacity: 100%;
        }
      }

      @keyframes color {
        from {
          background-color: teal;
        }
        to {
          background-color: white;
        }
      }

      @font-face {
        font-family: cocon;
        src: url("/font/Cocon-Regular-Font.otf");
      }
    </style>
    <title>Selamat Datang!</title>
  </head>
  <body>
    <div class="container justify-content-center">
      <div class="row">
        <div class="col">
          <h1>Selamat Datang!</h1>
          <p>
            Anda berhasil masuk sebagai
            <strong>{{ Auth::user()->role }}</strong>
          </p>
        </div>
      </div>
    </div>
  </body>
</html>
