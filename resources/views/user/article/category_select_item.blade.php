<option value=" {{ $category->id}} ">{{$text}} {{ $category->name }} </option>
@if ($category->childrenCategory)
    @foreach ($category->childrenCategory as $children)
        @include('user.article.category_select_item',
        [
            'category' => $children,
            'text'=> '|-- '.$text,
            ])
    @endforeach
@endif