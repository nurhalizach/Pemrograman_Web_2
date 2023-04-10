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
    <h2>Edit Data User</h2>
    <div class="container ">
        <div class="row">
            <div class="col-md-5 border rounded mt-2">
                <form action="{{ route('user.ubah', ['id'=>$users->id]) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label><br>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $users->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label><br>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $users->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label><br>
                        <input type="text" class="form-control" id="password" name="password" value="{{ $users->password}}">
                    </div>
                    
                    <div class="row mx-2">
                        <button type="submit" class="btn btn-primary mb-3">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>
