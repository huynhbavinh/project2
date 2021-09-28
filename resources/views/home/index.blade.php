@extends('layouts.app')
@section('content')
    <div class="container py-5">
        <div class="row text-center text-white mb-5">
            <div class="col-lg-7 mx-auto">
                <h1 class="display-4" style="color: gray">Bài viết mới nhất</h1>
            </div>
        </div>
        <div class="row">
            <form action="{{ route('homePage') }}" method="GET">
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
                <input type="submit" value="Lọc">
            </form>

            <div class="col-lg-8 mx-auto">
                <!-- List group-->
                <ul class="list-group shadow">
                    <!-- list group item-->
                    @foreach ($articles as $article)

                    <li class="list-group-item">
                        <!-- Custom content-->
                        <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                            <div class="media-body order-2 order-lg-1">
                                <h5 class="mt-0 font-weight-bold mb-2"> {{ $article->title }} </h5>
                                <p class="font-italic text-muted mb-1 small">{{ $article->content }} </p>
                                <a href="">
                                    @foreach ($article->category as $category)
                                        {{ $category->name }}
                                    @endforeach
                                </a>
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <h6 class="font-weight-bold my-2">
                                        reference by <a href="http://">{{ $article->user->name }}</a>
                                    </h6>
                                </div>
                            </div><img src="https://i.imgur.com/KFojDGa.jpg" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                        </div> <!-- End -->
                    </li> <!-- End -->
        
                    @endforeach
                </ul> <!-- End -->
            </div>
        </div>
    </div>
@endsection