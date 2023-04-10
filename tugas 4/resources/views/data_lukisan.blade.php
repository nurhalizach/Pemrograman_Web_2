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
            <h2 style="padding-top:15px;">Tabel Data Lukisan</h2>
            <a href="{{ route('lukisan.buat') }}" class="btn btn-success col-set">Tambah Data Lukisan</a>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Artist</th>
                        <th>Year</th>
                        <th>Medium</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lukisan as $art)
                    <tr>
                        <td>{{ $art->id }}</td>
                        <td>{{ $art->title }}</td>
                        <td>{{ $art->artist }}</td>
                        <td>{{ $art->year }}</td>
                        <td>{{ $art->medium}}</td>
                        <td class="cell-collapse-2">{{ $art->description}}</td>
                        <td class="cell-collapse">{{ $art->image}}</td>
                        <td>
                            <a href="{{ route('lukisan.edit', ['id'=>$art->id]) }}" class="btn btn-primary col-set">Edit</a>
                            <form action="{{ route('lukisan.hapus',['id'=>$art->id]) }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="image" value="{{$art->image}}">
                                <button class="btn btn-danger" onclick="confirm('Anda yakin akan menghapus data ini?')">Hapus</button>
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
