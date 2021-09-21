@extends('layouts.app')

@section('content')
    <h3>
        {{ trans('article.createCategory') }}
    </h3>
    <form action="{{ route('category.store') }} " method="post">
        @csrf
        <input type="text" name="name" value="{{old('name')}}">
        <br>
        <button type="submit">submit</button>
    </form>


@endsection