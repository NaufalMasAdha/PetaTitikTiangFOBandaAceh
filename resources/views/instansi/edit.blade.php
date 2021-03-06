@extends('layouts.app')
<!--  -->
@section('title','FO Maps | Edit Instansi') @section('subtitle', "Edit
Instansi")
<!--  -->

@section('content')
<div class="row">
  <div class="col-12 col-md-4 mr-3">
    <form
      class="form-group"
      method="POST"
      action="{{route('update_instansi', $instansi->id)}}"
    >
      @method('post')
      <!--  -->
      @csrf
      <div class="form-group my-3">
        <label for="nama">Nama Instansi </label>
        <input
          onkeyup="isInputEmpty()"
          autocomplete="off"
          class="form-control @error('nama') is-invalid @enderror"
          type="text"
          name="nama"
          id="nama"
          value="{{ $instansi->nama }}"
        />
        @error('nama')
        <span class="text-danger" role="alert">
          {{ $message }}
        </span>
        @enderror
      </div>
      <div class="form-group my-3">
        <label for="alamat">Alamat </label>
        <input
          onkeyup="isInputEmpty()"
          autocomplete="off"
          class="form-control @error('alamat') is-invalid @enderror"
          type="text"
          name="alamat"
          id="alamat"
          value="{{ $instansi->alamat }}"
        />
        @error('alamat')
        <span class="text-danger" role="alert">
          {{ $message }}
        </span>
        @enderror
      </div>

      <div class="form-group my-3">
        <label for="no_hp">No. HP </label>
        <input
          onkeyup="isInputEmpty()"
          autocomplete="off"
          class="form-control @error('no_hp') is-invalid @enderror"
          type="tel"
          name="no_hp"
          id="no_hp"
          value="{{ $instansi->no_hp }}"
        />
        @error('tinggi')
        <span class="text-danger" role="alert">
          {{ $message }}
        </span>
        @enderror
      </div>

      <div class="form-group my-3">
        <label for="latitude">Latitude </label>
        <input
          onkeyup="isInputEmpty()"
          autocomplete="off"
          class="form-control @error('latitude') is-invalid @enderror"
          type="text"
          name="latitude"
          id="latitude"
          value="{{$instansi->latitude}}"
        />
        @error('latitude')
        <span class="text-danger" role="alert">
          {{ $message }}
        </span>
        @enderror
      </div>

      <div class="form-group my-3">
        <label for="longitude">Longitude </label>
        <input
          onkeyup="isInputEmpty()"
          autocomplete="off"
          class="form-control @error('longitude') is-invalid @enderror"
          type="text"
          name="longitude"
          id="longitude"
          value="{{$instansi->longitude}}"
        />
        @error('longitude')
        <span class="text-danger" role="alert">
          {{ $message }}
        </span>
        @enderror
      </div>
      <input class="btn btn-primary mt-3 w-100" type="submit" value="Update" />
    </form>
  </div>
</div>
@endsection
