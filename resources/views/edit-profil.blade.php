@extends('layouts/app')
<!--  -->
@section('title','Profil') @section('subtitle', "Edit Profil")
<!--  -->
@section('nav-menu')
<div class="nav_list">
  <a href="{{ route('tiang') }}" class="nav_link">
    <i class="bx bx-current-location nav_icon"></i>
    <span class="nav_name">Daftar Tiang FO</span>
  </a>
</div>
<div class="nav_list">
  <a href="{{ route('daftar_instansi') }}" class="nav_link">
    <i class="bx bx-buildings nav_icon"></i>
    <span class="nav_name">Daftar Instansi</span>
  </a>
</div>
@endsection
<!--  -->
@section('content')

<div class="row">
  <div class="col-12 col-md-4">
    <form
      class="form-group"
      action="{{route ('update_profil',$user->id)}}"
      method="POST"
    >
      @method('post')
      <!--  -->
      @csrf
      <div class="form-group">
        <label for="nama">Nama </label>
        <input
          autocomplete="off"
          class="form-control @error('name') is-invalid @enderror"
          type="text"
          name="name"
          id="nama"
          value="{{$user->name}}"
        />
        @error('name')
        <span class="text-danger" role="alert">
          {{ $message }}
        </span>
        @enderror
      </div>
      <div class="form-group my-3">
        <label for="email">Email </label>
        <input
          autocomplete="off"
          class="form-control @error('email') is-invalid @enderror"
          type="email"
          name="email"
          id="email"
          value="{{$user->email}}"
        />
        @error('email')
        <span class="text-danger" role="alert">
          {{ $message }}
        </span>
        @enderror
      </div>

      <div class="input-group my-3">
        <label class="input-group-text" for="role">Role</label>
        <select disabled class="form-select" id="role" name="role">
          <option
            value="{{$user->role}}"
            selected
            hidden
            >{{$user->role}}</option
          >
          <option value="Pimpinan">Pimpinan</option>
          <option value="Teknisi">Teknisi</option>
        </select>
      </div>
      <label for="password">Password</label>
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
      <input class="btn btn-primary w-100 my-3" type="submit" value="SUBMIT" />
    </form>
  </div>
</div>
@endsection @section('scripts')
<script src="{{ asset('js/toggle-pwd.js') }}"></script>
@endsection
