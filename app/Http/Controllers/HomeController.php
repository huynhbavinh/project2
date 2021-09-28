<?php

namespace App\Http\Controllers;

use App\Models\AppConst;
use App\Models\Article;
use App\Models\Category;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $categories = Category::whereNull('parent_id')->with('childrenCategory')->get();

        $articlesQuery = Article::query()
                            ->whereHas('user', function($query){
                                $query->where('block',false);
            });
        if ($request->category_id) {
            $articlesQuery->whereHas('category',function($query) use($request){
                 $query->whereIn('categories.id',[$request->category_id]);
                 //whereIn điều kiện phải là array
            });
        }
        $articles = $articlesQuery->latest()->paginate(AppConst::DEFAULT_PER_PAGE);
        //pass multiple value to views
        $data = [
            'categories'=>$categories,
            'articles' =>$articles,
        ];

        return view('home.index')->with($data);
    }
}
