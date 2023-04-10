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
    <h2 class="text-center">Tambah Data Lukisan</h2>
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-5 border rounded mt-2">
                <form action="{{ route('lukisan.tambah') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label><br>
                        <input type="text" class="form-control" name="title" id="title">
                    </div>
                    <div class="mb-3">
                        <label for="artist" class="form-label">Artist</label><br>
                        <input type="text" class="form-control" id="artist" name="artist">
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Year</label><br>
                        <input type="text" class="form-control" id="year" name="year">
                    </div>
                    <div class="mb-3">
                        <label for="medium" class="form-label">Medium</label><br>
                        <input type="text" class="form-control" id="medium" name="medium">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label><br>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Photo Lukisan</label>
                        <img class="img-preview img-fluid mb-3 col-sm-6 d-block">
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" required onchange="tinjauGambar()">
                        @error('image')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="row mx-2">
                        <button type="submit" class="btn btn-primary mb-3">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection

    <script>
        function tinjauGambar(){
            const image = document.querySelector('#image');
            const tinjau = document.querySelector('.img-preview');

            tinjau.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent){
                tinjau.src = oFREvent.target.result;
            }
        }

    </script>
</body>
</html>
