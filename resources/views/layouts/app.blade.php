<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    @yield('redirect')
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/myapp.css') }}" />

    @yield('style')

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"
    />
    <title>@yield('title')</title>
  </head>
  <body id="body-pd">
    <header class="header" id="header">
      <div class="header_toggle">
        <i class="bx bx-menu" id="header-toggle"></i>
        <span>@yield('subtitle')</span>
      </div>

      <div class="d-none d-sm-flex">
        <div class="header_img">
          <img src="{{ asset('assets/img/logo.png') }}" alt="profile-pic" />
        </div>
        <span>
          {{ Auth::user()->name }} - {{ Auth::user()->role }}
          <br />
          {{ Auth::user()->email}}
        </span>
      </div>
    </header>
    <div class="l-navbar" id="nav-bar">
      <nav class="nav">
        <div>
          @if(Auth::user()->role == 'admin')
          <a href="{{ route('admin_home') }}" class="nav_logo">
            <i class="bx bx-map-alt nav_logo-icon"></i>
            <span class="nav_logo-name">FO Maps</span>
          </a>
          @else
          <a href="{{ route('map_home') }}" class="nav_logo">
            <i class="bx bx-map-alt nav_logo-icon"></i>
            <span class="nav_logo-name">FO Maps</span>
          </a>
          @endif @yield('nav-menu')
        </div>
        <a
          onclick="event.preventDefault();document.getElementById('logout-form').submit();"
          href="{{ route('logout') }}"
          class="nav_link"
        >
          <i class="bx bx-log-out nav_icon"></i>
          <span class="nav_name">Log Out</span>
        </a>
      </nav>
    </div>
    <form
      id="logout-form"
      action="{{ route('logout') }}"
      method="POST"
      class="d-none"
    >
      @csrf
    </form>
    <main class="main">
      @yield('content')
    </main>
    <script src="{{ asset('js/myscript.js') }}"></script>
    @yield('scripts')
  </body>
</html>
