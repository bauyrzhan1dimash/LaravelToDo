<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>all posts </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Add</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.index') }}">Go to index Page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.create') }}">Add post</a>
                </li>
{{--                <li class="nav-item" style="display: flex">--}}
{{--                    @foreach($categories as $cat)--}}
{{--                        <a class="nav-link" href="{{route('posts.category',$cat->id)}}">{{$cat->name}}</a>--}}
{{--                    @endforeach--}}
{{--                </li>--}}


                </li>
            </ul>
        </div>
    </div>
</nav>

    <div class="container">
        <div class="card" style="width: 18rem; margin-top: 50px;">
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>

                    @foreach($categories as $category)
                        @if($category->id === $post->category_id)
                        <h6 class="card-subtitle mb-2 text-muted">Category: {{$category->name}}  </h6>
                        @endif
                    @endforeach

                <p class="card-text">{{$post->content}}</p>
                <a href="{{route('posts.edit',$post->id)}}" class="card-link">Edit</a>
            </div>
        </div>
    </div>


    </body>
</html>
