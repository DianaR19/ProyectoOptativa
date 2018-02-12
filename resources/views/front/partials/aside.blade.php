
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"

</head>
<body>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Categorias</h3>
    </div>
    <div class="panel-body">
        <ul class="list-group">
            @foreach($categories as $category)
                <li class="list-group-item">
                    <span class="badge">{{$category->articles->count()}}</span>
                    <a href="{{route('front.search.category',$category->name)}}"></a>
                    {{$category->name}}
                </li>
            @endforeach
        </ul>
    </div>
</div>

<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Tags</h3>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            @foreach($tags as $tag)
                <br>
                <span class="label label-info">
                    <a href="{{route('front.search.tag',$tag->name)}}">
                        {{$tag->name}}
                    </a>
                </span>
            @endforeach
        </div>
    </div>
</div>
</body>
</html>