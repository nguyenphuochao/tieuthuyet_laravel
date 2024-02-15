<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Rating;
use Psy\Util\Json;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        // $ipAddress = $request->ip();
        $rating_value = $request->rating_value;
        $story_id = $request->story_id;
        // $model = Rating::where([['user_id', '=', $user_id], ['story_id', '=', $story_id]])
        //     ->orWhere([['ip_address', '=', $ipAddress], ['story_id', '=', $story_id]], $ipAddress)->first();
        // if ($model) {
        //     // Rating::where('user_id', $user_id)->where('story_id', $story_id)->orWhere('ip_address', $ipAddress)->update(['rating_value' => $rating_value]);
        //     return response()->json(['mess' => 'Bạn đã đánh sao rồi!']);
        // } else {
        //     $rating = new Rating();
        //     $rating->rating_value = $request->rating_value;
        //     $rating->story_id = $request->story_id;
        //     $rating->user_id = $request->user_id;
        //     $rating->ip_address = $ipAddress;
        //     $rating->save();
        // }
        $rating = new Rating();
        $rating->rating_value = $rating_value;
        $rating->story_id = $story_id;
        $rating->save();
        $rating_num = Rating::where('story_id', $story_id)->avg('rating_value');
        $rating_num = number_format($rating_num, 1, '.', '');
        $total_rating = Rating::where('story_id', $story_id)->count();
        return response()->json(['mess' => 'Cảm ơn bạn đã đánh giá truyện', 'rating_num' => $rating_num, 'total_rating' => $total_rating]);
    }
}
