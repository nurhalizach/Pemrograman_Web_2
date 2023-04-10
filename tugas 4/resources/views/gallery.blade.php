<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/personalStyle.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="contain">
        <div class="header">
            <h1>Art Gallery</h1>
            <h4><a href="{{ route('login') }}" class="text-decoration-none linking btn btn-outline-danger">Add more Art</a></h4>
        </div>
        <div class="body">
            <div class="flex-col text-center">
                <div class="flex-row">
                    @foreach ($lukisan as $art )
                    <div class="capsule">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <h4>{{ $art->title }}</h4>
                                <div><img src="{{asset('storage/' . $art->image)}}" width="auto" height="auto" style="float: center; padding: 15px; max-width:300px; max-height:auto;"></div>
                            </div>
                            <div class="flip-card-back">
                                <h2>{{ $art->title }}</h2>
                                <p>Artist: {{ $art->artist }}</p>
                                <p>year: {{ $art->year }}</p>
                                <p>Medium: {{ $art->medium }}</p>
                                <p>Description:</p>
                                <p style="font-size: 0.8em; text-align:justify; padding:5px;">{{ $art->description }}</p>
                            </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/h4ootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
