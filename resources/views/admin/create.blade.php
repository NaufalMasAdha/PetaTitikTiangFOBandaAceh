@extends('layouts/app')
<!--  -->
@section('title','Admin | Tambah User') @section('subtitle', "Tambah User")

<!--  -->
@section('content')

<div class="row">
  <div class="col-12 col-md-4 border mr-3 p-3">
    <form
      onkeyup="isInputEmpty()"
      class="form-group"
      method="POST"
      action="{{route('admin_store')}}"
    >
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
          <option value="pimpinan">Pimpinan</option>
          <option value="teknisi">Teknisi</option>
        </select>
      </div>

      <input
        class="btn btn-primary my-3 w-100 btn-secondary"
        type="submit"
        value="TAMBAH USER"
      />
    </form>
  </div>
  <div class="col-12 col-md-auto text-success my-3">
    <ul>
      NOTE:
      <br />
      <li>Role Pimpinan hanya dapat melihat dashboard peta</li>
      <li>Role Teknisi dapat melakukan modifikasi pada peta</li>
      <li>
        Password default untuk setiap user:
        <strong>
          diskominfo
        </strong>
      </li>
    </ul>
  </div>
  @endsection
</div>
