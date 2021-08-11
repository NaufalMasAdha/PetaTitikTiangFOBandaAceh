<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />

    <title>Login</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-md-8 bg-blue d-none d-md-block">
          <div class="content">
            <h1>Selamat Datang!</h1>
            <p>
              Website ini merupakan media untuk anda agar dapat mengakses peta
              yang menampilkan titik-titik tiang fiber optic (FO) di Banda Aceh
            </p>
            <img
              src="{{ asset('assets/img/welcome-map.png') }}"
              width="400"
              height="400"
              alt="map"
            />
          </div>
        </div>
        <div class="col-12 col-md-4">
          <div class="form-login">
            <img
              src="{{ asset('assets/img/logo.png') }}"
              alt="logo"
              width="120"
            />
            <h1>Login</h1>
            <form
              onkeyup="isInputEmpty()"
              method="POST"
              action="{{ route('login') }}"
            >
              @csrf

              <div class="form-group">
                <label
                  for="email"
                  class="col-md-4 col-form-label text-md-right"
                  >{{ __("Email") }}</label
                >

                <div class="col-12">
                  <input
                    id="email"
                    type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan Email"
                    required
                    autocomplete="off"
                    autofocus
                  />

                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="form-group">
                <label
                  for="password"
                  class="col-md-4 col-form-label text-md-right"
                  >{{ __("Password") }}</label
                >

                <div class="col-12">
                  <div class="input-group mb-3">
                    <input
                      type="password"
                      class="form-control @error('password') is-invalid @enderror"
                      placeholder="Kosongkan jika tidak ingin diubah"
                      aria-label="password"
                      aria-describedby="togglePassword"
                      name="password"
                      id="password"
                    />
                    <button
                      class="btn btn-outline-secondary bi bi-eye-slash"
                      type="button"
                      id="togglePassword"
                    ></button>
                    @error('password')
                    <span class="text-danger" role="alert">
                      {{ $message }}
                    </span>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox"
                    name="remember" id="remember"
                    {{ old("remember") ? "checked" : "" }}>

                    <label class="form-check-label" for="remember">
                      {{ __("Ingat Saya") }}
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary btn-secondary">
                    {{ __("Masuk") }}
                  </button>

                  @if (Route::has('password.request'))
                  <a
                    class="btn btn-link"
                    href="{{ route('password.request') }}"
                  >
                    {{ __("Lupa Password") }}
                  </a>
                  @endif
                </div>
              </div>

              <small class="form-group row justify-content-center text-center">
                <p>Belum punya akun? <a href="#">Hubungi admin</a></p>
              </small>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="{{ asset('js/myscript.js') }}"></script>
    <script src="{{ asset('js/toggle-pwd.js') }}"></script>
  </body>
</html>
