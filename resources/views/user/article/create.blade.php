@extends('layouts.app')

@section('content')
<div>
    <h3>
        {{ trans('article.create') }}
    </h3>
    <div>
        <form action=" {{ route('userArticle.store') }} " method="post">
            @csrf
            <input type="text" class="@error('title') error @enderror " name="title" value="{{old('title')}}">
            @error('title')
                {{ $message }}
            @enderror
            <br>
            <input type="text" name="content" value="{{old('content')}}">
            <br>
            <select name="category_id" id="">
                @foreach ($categories as $category)
                    {{-- <option value="{{ $category->id }}" @if (old('category_id') == $category->id)
                        selected                    
                    @endif >{{ $category->name }}</option> --}}
                    @include('user.article.category_select_item',
                    [
                        'category' => $category,
                        'text'=> '',
                    ]
                    )
                @endforeach
            </select>
            <br>
            <button type="submit">submit</button>
        </form>
    </div>
</div>
@endsection