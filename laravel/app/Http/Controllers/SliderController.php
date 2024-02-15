<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Slider;
use App\Story;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stories = Story::all();
        return view('admin.slider.create', compact('stories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slider_count = Slider::all();
        if (count($slider_count) > 4) return redirect()->route('dashboard.slider.index')->with(['flash_message' => 'Giới hạn 5 hình ảnh !', 'flash_level' => 'danger']);
        $slider = new Slider();
        $slider->name = $request->name;
        $slider->story_id = $request->story_id;
        if ($request->file('image')) {
            $file = $request->file('image');
            $file->move(public_path('images/slider'), $file->getClientOriginalName());
            $slider->image = $request->file('image')->getClientOriginalName();
        }
        $slider->start_date = date('Y-m-d H:i:s');
        $slider->save();
        return redirect()->route('dashboard.slider.index')->with(['flash_message' => 'Tạo slider thành công !', 'flash_level' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        $stories = Story::all();
        return view('admin.slider.edit', compact('slider', 'stories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
        $slider->name = $request->name;
        $slider->story_id = $request->story_id;
        if ($request->file('image')) {
            $file = $request->file('image');
            $file->move(public_path('images/slider'), $file->getClientOriginalName());
            $slider->image = $request->file('image')->getClientOriginalName();
        }
        $slider->end_start = date('Y-m-d H:i:s');
        $slider->save();
        return redirect()->route('dashboard.slider.index')->with(['flash_message' => 'Cập nhật slider thành công !', 'flash_level' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        return redirect()->route('dashboard.slider.index')->with(['flash_message' => 'Xóa slider thành công !', 'flash_level' => 'success']);
    }
}
