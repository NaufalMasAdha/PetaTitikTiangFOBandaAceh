@extends('layouts/app')
<!--  -->
@section('title','Admin | Home') @section('subtitle', "Daftar User")
<!--  -->

<!-- Css -->
@section('style')
<link rel="stylesheet" href="{{asset('css/style.css')}}" />
@endsection
<!--  -->
@section('content')
<div class="row">
  <div class="col-8 col-md-4 mb-2">
    <!-- Search form -->
    <form action="">
      <input
        id="myInput"
        onkeyup="search()"
        class="form-control"
        type="text"
        placeholder="Cari nama user"
        aria-label="Search"
      />
    </form>
  </div>
  <div class="col mb-2">
    <a href="{{ route('admin_create') }}" class="btn btn-dark"
      ><i class="fa fa-user-plus"></i
    ></a>
  </div>
</div>

<div class="row">
  <div class="col-12 table-responsive">
    <table id="myTable" class="table table-striped">
      <thead>
        <tr>
          <td>#</td>
          <td>@sortablelink('name','Nama')</td>
          <td>@sortablelink('email','Email')</td>
          <td>@sortablelink('role', 'Role')</td>
          <td>
            <i class="fa fa-user-cog"></i>
          </td>
        </tr>
      </thead>

      <tbody>
        @if(count($users) == 0)
        <tr>
          <td class="text-center" colspan="5">Tidak ada data user</td>
        </tr>
        @endif
        <!--  -->
        @foreach($users as $u)
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{$u->name}}</td>
          <td>{{$u->email}}</td>
          <td>{{$u->role}}</td>
          <td class="d-flex">
            <form
              class="d-none"
              action="{{route ('admin_delete',$u->id)}}"
              method="POST"
            >
              @csrf @method('delete')
              <button
                id="del-btn"
                type="submit"
                onclick="return confirm('Hapus akun ini?')"
              ></button>
              <a onclick="document.getElementById('del-btn').click()" href="#"
                ><i class="bi bi-trash"></i
              ></a>
            </form>
            <a
              class="btn btn-sm btn-primary me-3"
              href="{{route ('admin_edit', $u->id)}}"
              ><i class="bi bi-pencil-square"></i
            ></a>
            <a
              class="btn btn-sm btn-danger"
              onclick="document.getElementById('del-btn').click()"
              href="#"
              ><i class="bi bi-trash"></i
            ></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="col-auto col-md-3">
      {!! $users->links() !!}
    </div>
    <div class="col-auto">
      <strong> Total data : {{ $users->total() }} </strong>
    </div>
  </div>
</div>
@section('scripts')

<script
  src="https://kit.fontawesome.com/cd504552aa.js"
  crossorigin="anonymous"
></script>
@endsection
<!--  -->
@endsection
