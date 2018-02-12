<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Curso</title>

    <!-- Fonts -->

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }


        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }
        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    @endif

    <div class="content">

        <div class="title m-b-md">
            Diana
        </div>

        <div class="links">
                <a href="{{ route('users.index') }}">Usuarios</a>

            <a href="{{ route('categories.index') }}">Categoria</a>
            <a href="{{ route('articles.index') }}">Articulos</a>
            <a href="{{ route('images.index') }}">Imagenes</a>
            <a href="{{ route('tags.index') }}">Tags</a>
        </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">

                                @foreach($articles as $article)
                                    <div class="col-md-6">
                                        <div class="panel panel-default">
                                            <div class="panel-body">

                                                <h3 class="text-center">{{$article->title}}</h3>
                                                <hr>
                                                <a href="{{route('front.view.article',$article->slug)}}" class="thumbnail">
                                                    @foreach($article->images as $image)
                                                        <img class="img-responsive img-article" src="{{ asset('images/articles/'.$image->name)}}" alt="...">
                                                    @endforeach
                                                </a>

                                                <hr>
                                                <i class="fa fa-folder-open-o"></i><a href="{{route('front.search.category',$article->category->name)}}">
                                                    {{$article->category->name}}</a>
                                                <div class="pull-right">
                                                    <i class="fa fa-clock"></i> {{$article->created_at->diffForHumans()}}
                                                </div>
                                                <br><br>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            {{$articles->render()}}
                        </div>
                    </div>
    </div>
        <div class="col-md-4 aside">
            @include('front.partials.aside')

        </div>
</div>
</body>
</html>
