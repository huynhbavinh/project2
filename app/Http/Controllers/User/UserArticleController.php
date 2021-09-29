<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\AppConst;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Category;

class UserArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = auth()
                    ->user()
                    ->articles()
                    ->paginate(AppConst::DEFAULT_PER_PAGE);
        return view('user.article.list')->with('articles',$articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereNull('parent_id')->with('childrenCategory')->get();
        return view('user.article.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article();

        $article->fill($request->all());
        if ($request->has('is_vip')) {
            $article->is_vip=true;
        }
        auth()->user()->articles()->save($article);
        $article->category()->attach($request->category_id);
        //$article->thumbnail =

        return view('home');
    }
    public function uploadImage(Request $request){
        $filename = $request->file('thumbnail')->hashName();
        $img =Image::make($request->file('thumbnail')->getRealPath());
        // crop the best fitting 1:1 ratio (200x200) and resize to 200x200 pixel
        $img->fit(250);   
        // save the same file as jpg with default quality
        $img->save(public_path('/storage/thumbnails/'.$filename));

        return response()->json(['filename'=>$filename]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
