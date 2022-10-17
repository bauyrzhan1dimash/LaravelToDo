<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>all posts </title>
</head>
<body class="antialiased">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('posts.index')}}">all</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.create') }}">Add post</a>
                </li>
                <li class="nav-item" style="display: flex">
                    @foreach($categories as $cat)
                        <a class="nav-link" href="{{route('posts.category',$cat->id)}}">{{$cat->name}}</a>
                    @endforeach
                </li>


                </li>
            </ul>
        </div>
    </div>
</nav>
<div></div>



<div class="container">
    <table class="table table-hover" style="margin-top: 50px;">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr @foreach($posts as $onePost)>

            <td><a href="{{route('posts.show',$onePost->id)}}">{{$onePost->id}}</a></td>
            <td>{{$onePost->title}}</td>
            <td>{{$onePost->content}}</td>
            <td>
                <form action="{{route('posts.destroy',$onePost->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>

        </tr @endforeach>
        </tbody>
    </table>
</div>

</body>
</html>
