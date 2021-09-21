<style>
    .card{
        border-bottom: 3px solid red ;
        border-radius: 10px;  
    }
</style>
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
            </li>
        @endforeach
    </ol>
</div>