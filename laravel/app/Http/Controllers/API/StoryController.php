<?php

namespace App\Http\Controllers\API;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Story;
use Illuminate\Support\Facades\Auth;

class StoryController extends Controller
{
    // lấy danh sách truyện mới nhất
    public function getListNewStory(Request $request)
    {
        $story = Story::where('show', 1)->orderBy('created_at', 'DESC')->take(12)->get();
        return response()->json($story, 200);
    }
    // Lấy danh sách truyện ai cũng thích đọc
    public function getListReview(Request $request)
    {
        $story = Story::where('status', 1)->where('show', 1)->orderBy('view', 'DESC')->take(12)->get();
        return response()->json($story, 200);
    }
    // Lấy danh sách truyện full
    public function getListFull()
    {
        $story = Story::where('status', 1)->where('show', 1)->orderBy('updated_at', 'DESC')->take(12)->get();
        return response()->json($story, 200);
    }
    // Lấy danh sách theo thể loại
    public function getListCategory($categoryId)
    {
        $category = Category::where('id', $categoryId)->first();
        $story = $category->stories()->where([
            ['status', 1],
            ['show', 1]
        ])
            ->orderBy('updated_at', 'DESC')
            ->take(12)
            ->get();
        return response()->json($story, 200);
    }
    // Chi tiết truyện
    public function showInfoStory($alias)
    {
        $story = Story::where('show', 1)->where('alias', $alias)->first();
        return response()->json($story, 200);
    }
    
    public function store(Request $request)
    {
        $story = new Story();
        $story->name = $request->name;
        $story->save();
        return response(['mess' => 'Oke']);
    }
}
