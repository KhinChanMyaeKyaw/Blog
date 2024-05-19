@extends("layouts.app")

@section("content")
    <div class="container" style="max-width: 800px">

        @if($errors->any())
        <div class="alert alert-warning">
            @foreach ($errors->all() as $err )
                {{ $err }}
            @endforeach
        </div>
    @endif

    @if(session('info'))
            <div class="alert alert-info">
                {{session('info')}}
            </div>
    @endif

        <div class="card mb-2">
            <div class="card-body">
                <h3 class="card-title h4">{{ $article->title }}</h3>
                <div class="text-muted" style="font-size: 0.8em">
                    <b class="text-success">
                        {{ $article->user->name}},
                    </b>
                    {{ $article->created_at->diffForHumans() }}
                </div>
                <div class="mb-2">
                    {{$article->body}}
                </div>
                @auth
                    <a class="btn btn-sm btn-danger" href="{{ url("/articles/delete/$article->id") }}">
                        Delete
                    </a>
                    <a class="btn btn-sm btn-primary" href="{{ url("/articles/edit/$article->id") }}">
                        Edit
                    </a>
                @endauth
            </div>
        </div>
        <ul class="list-group">
            <li class="list-group-item active">
                Comments
                <span class="badge bg-secondary"> {{ count($article->comments) }}</span>
            </li>
            @foreach ($article->comments as $comment)
                <li class="list-group-item">
                    @auth
                        @can('delete-comment', $comment)
                            <a href="{{ url("/comments/delete/$comment->id")}}" class="btn-close float-end"></a>
                        @endcan
                    @endauth

                    <b class="text-success">
                        {{ $comment->user->name}},
                    </b> -
                    {{ $comment->content }}
                </li>
            @endforeach
        </ul>
        <br>

        @auth
            <form action="{{ url("/comments/add") }}" method="post">
                @csrf
                <input type="hidden" name="article_id" value="{{ $article->id }}">
                <textarea name="content" class="form-control mb-2" placeholder="New Comment"></textarea>
                <button class="btn btn-secondary">Add Comment</button>
            </form>
        @endauth
    </div>
@endsection
