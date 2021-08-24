@extends('layouts.app')
<!--  -->
@section('title','FO Maps | Tambah Tiang FO') @section('subtitle', "Tambah Tiang
FO") @section('nav-menu')
<div class="nav_list">
  <a href="{{ route('tiang') }}" class="nav_link active">
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
  <div class="col-12 col-md-4 mr-3">
    <form
      onkeyup="isInputEmpty()"
      class="form-group"
      method="POST"
      action="{{route('store_tiang')}}"
    >
      @method('post')
      <!--  -->
      @csrf
      <div class="form-group">
        <label for="alamat">Alamat </label>
        <input
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
        <label for="tahun_pembangunan">Tahun Pembangunan </label>
        <input
          autocomplete="off"
          class="form-control"
          type="text"
          name="tahun_pembangunan"
          id="tahun_pembangunan"
          value="{{ $tahun }}"
        />
      </div>

      <div class="form-group my-3">
        <label for="tinggi">Tinggi </label>
        <input
          autocomplete="off"
          class="form-control @error('tinggi') is-invalid @enderror"
          type="number"
          name="tinggi"
          id="tinggi"
          value="{{ old('tinggi') }}"
        />
        @error('tinggi')
        <span class="text-danger" role="alert">
          {{ $message }}
        </span>
        @enderror
      </div>

      <div class="form-group">
        <label for="tipe">Tipe </label>
        <input
          autocomplete="off"
          class="form-control @error('tipe') is-invalid @enderror"
          type="text"
          name="tipe"
          id="tipe"
          value="{{old('tipe')}}"
        />
        @error('tipe')
        <span class="text-danger" role="alert">
          {{ $message }}
        </span>
        @enderror
      </div>

      <div class="form-group my-3">
        <label for="latitude">Latitude </label>
        <input
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
        value="Tambah Tiang"
      />
    </form>
  </div>
</div>
@endsection
