<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

use Illuminate\Support\Facades\Artisan;



Route::get('install', 'HomeController@install');

// ------------------------Admin-----------------------------------
Route::group(['middleware' => ['web', 'auth']], function () {
    Route::group(['prefix' => 'dashboard'], function(){
        // Member Normal
        Route::get('/',['as' => 'dashboard.index', 'uses' => 'DashboardController@index']);
        Route::get('/password',['as' => 'dashboard.changepassword', 'uses' => 'DashboardController@password']);
        Route::put('/password',['as' => 'dashboard.changepassword', 'uses' => 'UserController@passwordChange']);
        Route::get('/changename',['as' => 'dashboard.changename', 'uses' => 'DashboardController@changeName']);
        Route::put('/changename',['as' => 'dashboard.changename', 'uses' => 'UserController@changeName']);
        Route::post('xu-ly-binh-luan', 'StoryController@xuLyBinhLuan')->name('xu-ly-binh-luan');
        Route::post('xu-ly-rep-binh-luan', 'StoryController@xuLyRepBinhLuan')->name('xu-ly-rep-binh-luan');
        Route::post('xu-ly-binh-luan-chapter', 'StoryController@xuLyBinhLuanChapter')->name('xu-ly-binh-luan-chapter');
        Route::post('xu-ly-rep-binh-luan-chapter', 'StoryController@xuLyRepBinhLuanChapter')->name('xu-ly-rep-binh-luan-chapter');
        Route::post('/dang-ky-bien-soan', 'UserController@bienSoan')->name('dang-ky-bien-soan');
        // Composer
        Route::group(['middleware' => ['composer']], function() {
            Route::get('search',['as' => 'dashboard.search', 'uses' => 'DashboardController@search']);
            Route::get('checkStory', 'StoryController@checkStory')->name('checkStory');
            Route::resource('story', 'StoryController',['except' => ['show']]);
            Route::resource('chapter', 'ChapterController',['except' => ['show']]);
            Route::resource('author', 'AuthorController', ['except' => ['show']]);
            Route::post('api/author', ['as' => 'dashboard.author.ajax.create', 'uses' => 'AuthorController@ajaxCreate']);
            Route::group(['prefix' => 'chapter'], function(){
                Route::get('list/{id}', ['as' => 'dashboard.chapter.list', 'uses' => 'ChapterController@listChapter']);
            });
        });

        // Admin
        Route::group(['middleware' => ['admin']], function() {
            Route::resource('category', 'CategoryController', ['except' => ['show']]);
            Route::resource('user', 'UserController', ['except' => ['show']]);
            Route::resource('report', 'ReportController', ['except' => ['show', 'store', 'edit', 'delete', 'create', 'update']]);
            Route::get('setting', ['as' => 'dashboard.setting.index', 'uses' => 'OptionController@index']);
            Route::get('setting/tos', ['as' => 'dashboard.setting.tos', 'uses' => 'OptionController@tos']);
            Route::get('setting/chinh-sach-bao-mat', ['as' => 'dashboard.setting.private', 'uses' => 'OptionController@privatePolicy']);
            Route::get('setting/gioi-thieu', ['as' => 'dashboard.setting.introduct', 'uses' => 'OptionController@introduct']);
            Route::get('setting/quy-dinh-ve-noi-dung', ['as' => 'dashboard.setting.regulation', 'uses' => 'OptionController@regulation']);
            Route::get('setting/van-de-ve-ban-quyen', ['as' => 'dashboard.setting.licenseIssues', 'uses' => 'OptionController@licenseIssues']);
            Route::put('setting', ['as' => 'dashboard.setting.update', 'uses' => 'OptionController@update']);
            Route::get('setting/ads', ['as' => 'dashboard.setting.ads', 'uses' => 'OptionController@ads']);
            Route::put('setting/ads', ['as' => 'dashboard.setting.adsupdate', 'uses' => 'OptionController@update']);
            Route::get('setting/ads/delete/{id}', ['as' => 'dashboard.setting.adsdelete', 'uses' => 'OptionController@delete']);
            Route::get('leech', 'LeechController@index');
            // Báo cáo vi phạm
            Route::resource('violate', 'ViolateController', ['except' => ['show', 'store', 'edit', 'delete', 'create', 'update']]);
            // Slider
            Route::resource('slider', 'SliderController');
            
            // AJAX
            Route::group(['prefix' => 'api'], function(){
                Route::post('category', ['as' => 'dashboard.category.ajax.create', 'uses' => 'CategoryController@ajaxCreate']);
                 // leech tool
                Route::get('leech/story', 'LeechController@getListChapters');
                Route::get('leech/chapter', 'LeechController@getContentChapter');
            });
        });
    });
});

Route::group(['middleware' => 'web'], function () {
    Route::get('get-comment-story', 'StoryController@layBinhLuan')->name('get-comment-story');
    Route::get('get-rcomment-story', 'StoryController@getRepCMT')->name('get-rcomment-story');
    Route::get('get-comment-story-chapter', 'StoryController@layBinhLuanChapter')->name('get-comment-story-chapter');
    Route::get('get-rcomment-story-chapter', 'StoryController@getRepCMTChapter')->name('get-rcomment-story-chapter');
    Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
    Route::get('/callback/{provider}', 'SocialController@callback');
    Route::auth();
    Route::get('/', 'HomeController@index');
    Route::get('/home', function(){
        Session::forget('viewed.0');
        foreach (Session::get('viewed') as $key => $value) {
          echo $key;
          dd($value);
        }
        //redirect('/');
    });

    // Page home
    
    Route::get('dang-ky', 'UserController@createCustomer')->name('customer.create');
    Route::post('dang-ky', 'UserController@storeCustomer')->name('customer.create.post');
    Route::get('dieu-khoan-su-dung', 'HomeController@tos');
    Route::get('chinh-sach-bao-mat', 'HomeController@privatePolicy');
    Route::get('gioi-thieu', 'HomeController@introduct');
    Route::get('quy-dinh-ve-noi-dung', 'HomeController@regulation');
    Route::get('van-de-ve-ban-quyen', 'HomeController@licenseIssues');
    
    Route::get('contact', 'HomeController@contact');
    Route::put('contact', 'HomeController@sendContact')->middleware('api');
    Route::get('sitemap.xml', 'HomeController@sitemap');
    Route::get('/clear-cache', function () {
        $exitCode = Artisan::call('cache:clear');
        return "Cache cleared successfully";
    })->name('clear-cache');
    // Review truyện
    Route::get('/review-truyen','ReviewController@index')->name('review');
    // Route::get('/reviews-truyen/{alias}','ReviewController@show')->name('review.show');
    Route::get('/review-truyen/{alias}','ReviewController@detail')->name('review.detail');
    Route::get('/php-v','HomeController@php');
    // Index List
    Route::get('the-loai/{category}', ['as' => 'category.list.index', 'uses' => 'StoryController@getListByCategory']);
    Route::get('tac-gia/{author}', ['as' => 'author.list.index', 'uses' => 'StoryController@getListByAuthor']);
    Route::group(['prefix' => 'danh-sach'], function() {
        Route::get('truyen-doc-nhieu', ['as' => 'danhsach.truyenhot', 'uses' => 'StoryController@getListHotStory']);
        Route::get('truyen-moi', ['as' => 'danhsach.truyenmoi', 'uses' => 'StoryController@getListNewStory']);
        Route::get('truyen-full', ['as' => 'danhsach.truyenfull', 'uses' => 'StoryController@getListFullStory']);
        Route::get('truyen-hot-nhat', ['as' => 'danhsach.truyenhotnhat', 'uses' => 'StoryController@getListSuperHotStory']);
        Route::get('truyen-audio', ['as' => 'danhsach.truyenaudio', 'uses' => 'StoryController@getListAudioStory']);
    });
    Route::get('search', ['as' => 'danhsach.search', 'uses' => 'StoryController@getListBySearch']);
    // API react native
    Route::group(['prefix' => 'api', 'middleware' => 'api'], function(){
        Route::any('new-post', 'StoryController@getAjaxListNewStories');
        Route::any('hot-post', 'StoryController@getAjaxListHotStories');
        Route::any('report-chapter', 'ReportController@store');
    
        Route::post('login','API\LoginController@login'); // Login API
        Route::post('logout','API\LoginController@logout'); // Logout API
        Route::get('user','API\LoginController@getUser')->middleware('auth.api'); // get user
        // HOME API
        Route::get('truyen-moi','API\StoryController@getListNewStory');
        Route::get('truyen-doc-nhieu','API\StoryController@getListReview');
        Route::get('truyen-full','API\StoryController@getListFull');
        Route::get('the-loai/{id}','API\StoryController@getListCategory');
        
        Route::get('{story}','API\StoryController@showInfoStory'); // Detail

        Route::post('story-reviews','API\StoryController@store');
    });
    //Show
    Route::get('{story}', ['as' => 'story.show', 'uses' => 'StoryController@showInfoStory']);
    Route::get('{storys}', ['as' => 'audio.show', 'uses' => 'StoryController@showInfoStoryaudio']);
    Route::get('{story}/{chapter}', ['as' => 'chapter.show', 'uses' => 'StoryController@showInfoChapter']);
    // Báo cáo vi phạm
    Route::post('/violate','HomeController@violate')->name('violate');
    // Rating
    Route::post('/rating','RatingController@store')->name('rating');
    

});
