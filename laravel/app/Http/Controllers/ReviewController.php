<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Author;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Story;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function index(Request $request){
        $breadcrumb = [[route('review'), 'Review truyện',]];
        $stories = Story::whereNotNull('reviewed')->orderBy('updated_at','DESC')->paginate(12);
        // dd($stories);
        if($request->sort == 'name'){
            $stories= Story::whereNotNull('reviewed')->orderBy('name','ASC')->paginate(12);
        }
        if($request->sort == 'update'){
            $stories= Story::whereNotNull('reviewed')->orderBy('updated_at','DESC')->paginate(12);
        }
        return view('review',compact('breadcrumb','stories'));
    }
    // public function show(Request $request , $alias){
    //     $category = Category::where('alias',$alias)->first();
    //     $stories = Story::join('story_categories','stories.id','=','story_categories.story_id')
    //     ->select('stories.*')
    //     ->where('category_id',$category->id)->orderBy('updated_at','DESC')->paginate(12);
    //     $request->session()->put('cate_name',$category->name);
    //     $breadcrumb = [[route('review'), 'Review truyện'], [route('review.show',['alias'=>$category->alias]),"<span style='color:orange'>$category->name</span>"]];
    //     return view('review_show',compact('breadcrumb','stories','category'));
    // }
    public function detail(Request $request ,$alias){
        $story = Story::where('alias',$alias)->first();
        $list_see_more = Story::whereNotNull('reviewed')->where('id','!=',$story->id)->paginate(12);
        // dd($list_see_more);
        $breadcrumb = [[route('review'), 'Review truyện'],[route('review.detail',['alias'=>$story->alias]), "<span style='color:orange'>$story->name</span>"],];
        return view('review_detail',compact('breadcrumb','story','list_see_more'));
    }
   
}
