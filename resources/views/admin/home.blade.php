@extends('layouts.app')
<!--  -->
<link rel="stylesheet" href="{{asset('css/style.css')}}" />
@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <h1>Daftar User</h1>
    </div>
  </div>

  <div class="row">
    <div class="col">
      <a href="create" class="btn btn-primary">Tambah User</a>
    </div>
    <div class="col">
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
  </div>

  <div class="row">
    <div class="col-12">
      @if ($message = Session::get('success'))
      <div class="alert alert-success">
        {{ $message }}
      </div>
      @endif @if ($message = Session::get('deleted'))
      <div class="alert alert-danger">
        {{ $message }}
      </div>
      @endif
    </div>
    <div class="col-12 table-responsive">
      <table id="myTable" class="table table-striped">
        <thead>
          <tr>
            <td>#</td>
            <td>@sortablelink('name','Nama')</td>
            <td>@sortablelink('email','Email')</td>
            <td>@sortablelink('role', 'Role')</td>
            <td><i class="float-right fa fa-user-cog"></i></td>
          </tr>
        </thead>

        <tbody>
          @foreach($users as $u)
          <!--  -->
          <tr>
            <td>{{ $i++ }}</td>
            <td>{{$u->name}}</td>
            <td>{{$u->email}}</td>
            <td>{{$u->role}}</td>
            <td>
              <a
                class="btn btn-sm btn-primary float-right"
                href="{{route ('admin_edit', $u->id)}}"
                >EDIT</a
              >
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div id="ws" class="d-flex justify-content-center">
    {!! $users->links() !!}
  </div>
</div>
@section('scripts')
<script src="{{asset('js/script.js')}}"></script>
<script
  src="https://kit.fontawesome.com/cd504552aa.js"
  crossorigin="anonymous"
></script>
@endsection
<!--  -->
@endsection
