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
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"
    />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
    />
    <title>@yield('title')</title>
  </head>
  <body id="body-pd">
    <header class="header" id="header">
      <div class="header_toggle">
        <i class="bx bx-menu" id="header-toggle"></i>
        <span>@yield('subtitle')</span>
      </div>

      <div
        class="d-none d-sm-flex profil"
        onclick="window.open('/profil', target='_blank')"
      >
        <div class="header_img">
          <img src="{{ asset('assets/img/logo.png') }}" alt="profile-pic" />
        </div>
        <span class="d-block">
          <label id="username">
            {{ Auth::user()->name }}
          </label>
          <br />
          <label id="email">
            {{ Auth::user()->email}}
          </label>
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
      <div class="container-fluid">
        <div class="white-container">
          <div class="row">
            <div class="col-12">
              @if ($message = Session::get('success'))
              <div
                class="alert alert-success alert-dismissible my-2"
                role="alert"
              >
                <strong> {{ $message }}</strong>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="alert"
                  aria-label="Close"
                ></button>
              </div>
              @elseif ($message = Session::get('deleted'))
              <div
                class="alert alert-warning alert-dismissible my-2"
                role="alert"
              >
                <strong> {{ $message }}</strong>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="alert"
                  aria-label="Close"
                ></button>
              </div>
              @elseif ($message = Session::get('error'))
              <div
                class="alert alert-danger alert-dismissible my-2"
                role="alert"
              >
                <strong> {{ $message }}</strong>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="alert"
                  aria-label="Close"
                ></button>
              </div>
              @endif
            </div>
          </div>
          @yield('content')
        </div>
      </div>
    </main>
    <script src="{{ asset('js/myscript.js') }}"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
      crossorigin="anonymous"
    ></script>
    @yield('scripts')
  </body>
</html>
