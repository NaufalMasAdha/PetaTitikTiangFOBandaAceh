@extends('layouts.app')
<!--  -->
@section('title','FO Maps | Daftar Tiang FO') @section('subtitle', "Daftar Tiang
FO") @section('style')
<link rel="stylesheet" href="{{asset('css/style.css')}}" />
@endsection
<!--  -->
@section('content')
<!--  -->

<div class="row justify-content-between">
  <div class="col-12 col-md-6">
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <td>#</td>
            <td>Tahun</td>
            <td>Jumlah Data</td>
            <td>Aksi</td>
          </tr>
        </thead>
        <tbody>
          @if(count($data) == 0)
          <tr>
            <td class="text-center" colspan="8">Tidak ada data Tiang</td>
          </tr>
          @endif
          <!--  -->
          @foreach($data as $d)
          <tr>
            <td>{{ $i++ }}</td>
            <td>
              <a
                title="Lihat pada peta"
                href="{{ route('map_home', $d->tahun_pembangunan) }}"
                >{{ $d->tahun_pembangunan }}</a
              >
            </td>
            <td>{{ $d->total }}</td>
            <td>
              <form
                class="d-none"
                action="{{route ('delete_tiang_grup',$d->tahun_pembangunan)}}"
                method="POST"
              >
                <button
                  id="del-btn-{{ $d->tahun_pembangunan }}"
                  type="submit"
                  class="btn btn-outline-danger w-100"
                  onclick="return confirm('Hapus data ini?')"
                ></button>
                @csrf @method('delete')
              </form>
              <a
                title="List data tahun {{ $d->tahun_pembangunan }}"
                class="mx-2"
                href="{{ route('daftar_tiang', $d->tahun_pembangunan) }}"
                ><i class="bi bi-list text-primary"></i
              ></a>
              <a
                title="Export data ini ke excel"
                href="{{ route('export_tiang',$d->tahun_pembangunan) }}"
                class="mx-2"
              >
                <i class="bi bi-download"></i
              ></a>
              <a
                onclick="document.getElementById('del-btn-{{ $d->tahun_pembangunan }}').click()"
                href="#"
                ><i class="bi bi-trash text-danger mx-2"></i
              ></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <a
      title="Export semua data ke excel"
      href="{{ route('export_tiang') }}"
      class="btn btn-success my-2 @if(count($data) == 0) d-none @endif"
    >
      <i class="bi bi-download"></i> Export Semua Data</a
    >
    <hr />
  </div>

  <div class="col-12 col-md-4 my-auto">
    <p>Upload file spreadsheet data tiang FO</p>
    <form
      class="form-group"
      method="POST"
      enctype="multipart/form-data"
      action="{{ route('import_tiang') }}"
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
        href="{{ asset('excel/example/fo-2017.xlsx') }}"
        download
      >
        example.xlsx <i class="bi bi-file-earmark-arrow-down"> </i></a
    ></small>
  </div>
</div>
<!--  -->
@endsection
