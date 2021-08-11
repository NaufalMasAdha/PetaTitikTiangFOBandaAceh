@extends('layouts.app')
<!--  -->
@section('title','Tambah Instansi') @section('subtitle', "Tambah Instansi")

<!--  -->

@section('content')
<div class="row">
  <div class="col-12 col-md-4 mr-3">
    <form class="form-group" method="POST" action="{{route('store_instansi')}}">
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
          value="{{old('nama')}}"
        />
        @error('nama')
        <span class="text-danger" role="alert">
          {{ $message }}
        </span>
        @enderror
      </div>

      <div class="form-group">
        <label for="alamat">Alamat </label>
        <input
          onkeyup="isInputEmpty()"
          autocomplete="off"
          class="form-control @error('alamat') is-invalid @enderror"
          type="text"
          name="alamat"
          id="alamat"
          value="{{old('alamat')}}"
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
          value="{{ old('no_hp') }}"
        />
        @error('no_hp')
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
          value="{{old('latitude')}}"
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
          value="{{old('longitude')}}"
        />
        @error('longitude')
        <span class="text-danger" role="alert">
          {{ $message }}
        </span>
        @enderror
      </div>
      <input
        class="btn btn-primary mt-3 w-100 btn-secondary"
        type="submit"
        value="Tambah Instansi"
      />
    </form>
  </div>
</div>
@endsection
