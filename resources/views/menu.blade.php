@extends('layouts.app')

@section('content')
    <h3>
        {{ trans('article.menuCategory') }}
    </h3>
    <div>
        <ol>
            @foreach ($categories as $category)
                <li> 
                    <a href="/category/{{$category->id}}">
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
        </ol>
    </div>


@endsection