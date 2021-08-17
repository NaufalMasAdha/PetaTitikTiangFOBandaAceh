@extends('layouts.app')
<!--  -->
@section('title','Tambah Instansi') @section('subtitle', "Tambah Instansi")

<!--  -->

@section('content')
<div class="row justify-content-between">
  <div class="col-12 col-md-4 mr-3">
    <form
      onkeyup="isInputEmpty()"
      class="form-group"
      method="POST"
      action="{{route('store_instansi')}}"
    >
      @method('post')
      <!--  -->
      @csrf
      <div class="form-group my-3">
        <label for="nama">Nama Instansi </label>
        <input
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
        class="btn btn-primary mt-3 w-100 mb-sm-3 btn-secondary"
        type="submit"
        value="Tambah Instansi"
      />
    </form>
  </div>
  <div class="col d-block text-center my-3">
    - atau -
  </div>
  <div class="col-12 col-md-4">
    <p>Upload file spreadsheet data Instansi</p>
    <form
      class="form-group"
      method="POST"
      enctype="multipart/form-data"
      action="{{ route('import_instansi') }}"
    >
      @csrf
      <input
        onchange="filed()"
        required
        class="form-control @error('file') is-invalid @enderror"
        type="file"
        name="file"
        id="file"
      />
      @error('file')
      <span class="text-danger" role="alert">
        {{ $message }}
      </span>
      @enderror
      <input
        class="btn btn-primary my-3 w-100 btn-secondary"
        type="submit"
        value="Import"
      />
    </form>
    <small
      >Pastikan format berkas sesuai dengan contoh berikut:
      <a
        class="text-center"
        href="{{ asset('excel/example/odp.xlsx') }}"
        download
      >
        example.xlsx <i class="bi bi-file-earmark-arrow-down"> </i></a
    ></small>
  </div>
</div>
@endsection
