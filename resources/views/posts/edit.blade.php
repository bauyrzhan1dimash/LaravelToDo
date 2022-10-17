<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">

    <title>create posts </title>
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
                    <a class="nav-link" href="{{ route('posts.index') }}">Go to Create Page</a>
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

    <div class="container" style="margin-top: 50px">
        <form action="{{ route('posts.update',$post->id) }}"method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="exampleFormControlInput1">Title</label>
                <input type="text" name="title" value="{{$post->title}}" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Category</label>
                <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                    @foreach($categories as $cat)
                        <option @if($cat->id == $post->category_id) selected @endif value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Content</label>
                <textarea name= "content" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$post->content}}
                </textarea>
            </div>
            <button style="margin-top: 20px" class="btn btn-primary" type="submit">Update post</button>
        </form>
    </div>

{{--    <form action="{{ route('posts.update',$post->id) }}"method="post">--}}
{{--        @csrf--}}
{{--        @method('PUT')--}}
{{--        Title: <input type="text" name="title" value="{{$post->title}}">--}}
{{--        category:--}}
{{--<br>--}}
{{--        <select name="category_id">--}}
{{--        </select>--}}
{{--        <br>--}}
{{--        text:<textarea name= "content" cols="30" rows="10">{{$post->content}}</textarea>--}}
{{--        <button type="submit">Update post</button>--}}
{{--    </form>--}}
</body>
</html>
