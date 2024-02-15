<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $table     = 'stories';
    protected $fillable  = ['name', 'alias', 'content', 'view', 'status', 'user_id', 'source', 'keyword', 'description'];
    //public $timestamps   = false;

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'story_categories');
    }

    public function authors()
    {
        return $this->belongsToMany('App\Author', 'story_authors');
    }

    public function chapters()
    {
        return $this->hasMany('App\Chapter');
    }

    public function comment_story()
    {
        return $this->hasMany('App\Comment_story');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    /**
     * @param int $story_id
     * @return int categoryId
     */
    public static function getCategoryId(int $story_id)
    {
        return Story::join('story_categories', 'stories.id', '=', 'story_categories.story_id')
            ->select('story_categories.category_id as categoryId')
            ->where('stories.id', '=', $story_id)
            ->first();
    }

    /**
     * L&#1073;&#1108;&#1168;y truy&#1073;��n Hot v&#1073;�&#1027;
     * @param int $categoryID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function getListHotStories($categoryID = 0){
        if($categoryID != 0)
        {
            $category = Category::where('id', $categoryID)->first();
            $stories = $category->stories()->where('show',1)->orderBy('view', 'DESC')->skip(0)->take(12)->get();
        }
        else
            $stories = Story::where('show',1)->orderBy('view', 'DESC')->skip(0)->take(12)->get();
        return view('templates.hot_new', compact('stories'));
    }

    /**
     * Get list for index
     * @param int $categoryID
     * @return string
     */
    public static function getListNewStories($categoryID = 0)
    {
        $storiesImage = self::getListNewStoriesId($categoryID);
        $excludedIDs = [];

        foreach ($storiesImage as $story) {
            $excludedIDs[] = $story->id;
        }

        if ($categoryID != 0) {
            $category = Category::where('id', $categoryID)->first();
            $stories = $category->stories()
                ->where([
                 ['status', 1],
                 ['show',1]                 
                 ])
                ->whereNotIn('id', $excludedIDs)
                ->orderBy('updated_at', 'DESC')
                ->skip(0)
                ->take(10)
                ->get();
        } else {
            $stories = Story::where([
                 ['status', 1],
                 ['show',1]                 
                 ])
                ->whereNotIn('id', $excludedIDs)
                ->orderBy('updated_at', 'DESC')
                ->skip(0)
                ->take(10)
                ->get();
        }

        return view('templates.new', compact('stories'));
    }

     /**
     * Get list for id
     * 
     * @param $categoryID
     * @return mixed
     */
    public static function getListNewStoriesId($categoryID = 0)
    {
        if ($categoryID != 0) {
            $category = Category::where('id', $categoryID)->first();
            return $stories = $category->stories()
                ->where([
                 ['status', 1],
                 ['show',1]                 
                 ])
                ->orderBy('updated_at', 'DESC')
                ->skip(0)
                ->take(12)
                ->get();
        } else {
            return $stories = Story::where([
                 ['status', 1],
                 ['show',1]                 
                 ])
                ->orderBy('updated_at', 'DESC')
                ->skip(0)
                ->take(12)
                ->get();
        }
    }

     /**
     * Get list story have image for index.
     *
     * @param $categoryID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public static function getListNewStoriesImage($categoryID = 0)
    {
        if ($categoryID != 0) {
            $category = Category::where('id', $categoryID)->first();
            $stories = $category->stories()
            ->where([
                 ['status', 1],
                 ['show',1]                 
                 ])
            ->orderBy('updated_at', 'DESC')
            ->skip(0)
            ->take(12)
            ->get();
        } else{
            $stories = Story::where([
                 ['show',1]                 
                 ])
            ->orderBy('created_at', 'DESC')
            ->skip(0)
            ->take(12)
            ->get();}
        return view('templates.new_image', compact('stories'));
    }
    
    /**
     * @param int $category_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public static function getListStoriesForCategory(int $category_id)
    {
        if ($category_id != 0) {
            $category = Category::where('id', $category_id)->first();
            $stories = $category->stories()
                ->where([
                    ['status', 1],
                    ['show', 1]
                ])
                ->orderBy('updated_at', 'DESC')
                ->skip(0)
                ->take(12)
                ->get();
        } else {
            $stories = Story::where([
                ['status', 1],
                ['show', 1]
            ])
                ->orderBy('updated_at', 'DESC')
                ->skip(0)
                ->take(12)
                ->get();
        }

        return view('templates.stories_for_category_image', compact(
                'stories',
                'category')
        );
    }

    /**
     * @param array $id
     * @return mixed
     */
    public static function getListStoriesForCardSlider(array $id)
    {
        return Story::where('show', 1)
            ->whereIn('id', $id)
            ->get();
    }

    /**
     * Get list done.
     * @return view
     */
    public static function getListDoneStories()
    {
        $stories = self::where([
         ['status', 1],
         ['show',1]
         ])
        ->orderBy('updated_at', 'DESC')
        ->skip(0)
        ->take(12)
        ->get();
        return view('templates.slide', compact('stories'));
    }

    public static function getListAudioStories()
    {
        $stories = self::where([['status', 0],['show',1],['description',1]])->orderBy('updated_at', 'DESC')->skip(0)->take(6)->get();
        return view('templates.audio', compact('stories'));
    }

}