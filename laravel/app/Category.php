<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table     = 'categories';
    protected $fillable  = ['name', 'alias', 'parent_id', 'keyword', 'description'];
    //public $timestamps   = false;

    public function stories()
    {
        return $this->belongsToMany('App\Story', 'story_categories');
    }

    /**
     * @param int $story_id
     * @param int $category_id
     * @return mixed
     */
    public static function getListForCategory(int $story_id, int $category_id)
    {
        return Category::join('story_categories', 'categories.id', '=', 'story_categories.category_id')
            ->join('stories', 'stories.id', '=', 'story_categories.story_id')
            ->select(
                'story_categories.story_id',
                'stories.name',
                'stories.alias',
                'stories.image'
            )
            ->where('categories.id', '=', $category_id)
            ->whereNotIn('story_categories.story_id', [$story_id])
            ->orderBy('story_categories.story_id', 'DESC')
            ->paginate(12, ['*'], 'page_category');
    }
    // Lấy danh sách truyện cùng thể loại ở trang chapter
    public static function getListStoryRelated(int $story_id, int $category_id)
    {
        return Category::join('story_categories', 'categories.id', '=', 'story_categories.category_id')
            ->join('stories', 'stories.id', '=', 'story_categories.story_id')
            ->select(
                'story_categories.story_id',
                'stories.name',
                'stories.alias',
                'stories.image'
            )
            ->where('categories.id', '=', $category_id)
            ->whereNotIn('story_categories.story_id', [$story_id])
            ->orderBy('story_categories.story_id', 'DESC')
            ->paginate(48, ['*'], 'page_category');
    }

    /**
     * @param $categoryId
     * @return mixed
     */
    public static function getListCategoryHome($categoryId = [])
    {
        $categoryList = Category::whereIn(
            'id',
            $categoryId
        )
            ->orderBy('id', 'DESC')
            ->get();

        return $categoryList;
    }
}
