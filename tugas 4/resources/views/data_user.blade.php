<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  @extends('templates.main')
  
  @section('container')
      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container mt-3">
      <div class="row">
          <div class="col-md-10">
              <h2 style="padding-top:15px;">Tabel Data User</h2>
              <a href="{{ route('user.buat') }}" class="btn btn-success col-set">Tambah Data User</a>
              <table class="table table-striped table-hover">
                  <thead>
                      <tr>
                          <th>Id</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>Password</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($users as $user)
                      <tr>
                          <td>{{ $user->id }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td  class="cell-collapse">{{ $user->password }}</td>
                          <td>
                            <a href="{{ route('user.edit', ['id'=>$user->id]) }}" class="btn btn-primary col-set">Edit</a>
                            <form action="{{ route('user.hapus',['id'=>$user->id]) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-danger" type="submit" onclick="confirm('Anda yakin akan menghapus data ini?')">Hapus</button>
                            </form>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div>
    </div>
  @endsection
</body>
</html>
