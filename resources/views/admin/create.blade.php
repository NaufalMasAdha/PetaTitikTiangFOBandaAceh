@extends('layouts/app')
<!--  -->
@section('title','Admin | Tambah User') @section('subtitle', "Tambah User")
<!--  -->
@section('nav-menu')
<div class="nav_list">
  <a href="{{ route('admin_home') }}" class="nav_link active">
    <i class="bx bx-grid-alt nav_icon"></i>
    <span class="nav_name">Dashboard</span>
  </a>
</div>
@endsection
<!--  -->
@section('content')
<div class="container">
  <div class="row">
    <div class="col-12 col-md-4 border mr-3 p-3">
      <form class="form-group" method="POST" action="{{route('admin_store')}}">
        @method('post')
        <!--  -->
        @csrf
        <div class="form-group my-3">
          <label for="nama">Nama </label>
          <input
            autocomplete="off"
            class="form-control @error('name') is-invalid @enderror"
            type="text"
            name="name"
            id="nama"
            value="{{old('name')}}"
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
            value="{{old('email')}}"
          />
          @error('email')
          <span class="text-danger" role="alert">
            {{ $message }}
          </span>
          @enderror
        </div>
        <div class="input-group my-3">
          <label class="input-group-text" for="role">Role</label>
          <select class="form-select" id="role" name="role">
            <option value="Pimpinan">Pimpinan</option>
            <option value="Teknisi">Teknisi</option>
          </select>
        </div>

        <input
          class="btn btn-primary my-3 w-100"
          type="submit"
          value="TAMBAH USER"
        />
      </form>
    </div>
    <div class="col-12 col-md-5 text-success">
      NOTE: <br />
      Role Pimpinan hanya dapat melihat website <br />
      Role Teknisi dapat melakukan modifikasi pada website <br />
      Password default untuk setiap user:
      <strong>
        12345678
      </strong>
    </div>
  </div>
</div>
@endsection
