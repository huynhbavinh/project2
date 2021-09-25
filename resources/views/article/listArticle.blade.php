@extends('layouts.app')

@section('content')
<div class="">
    <ol>
        @foreach ($articles as $article)
            <li class="card">
                <h2>
                    {{ $article->title }}
                </h2>
                <h3>
                    {{ $article->category->name }}
                </h3>
                <p>
                    {{ $article->content }}
                </p>
                @can('update', $article)
                    <a href=" {{ route('article.edit',['article'=>$article]) }} ">Edit</a>
                @endcan
            </li>
        @endforeach
    </ol>
</div>
@endsection
