<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\NewsCategory;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $allNews = News::paginate(3);
        return view('news.list')->with(['allNews' => $allNews]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCategory = NewsCategory::all();
        return view('news.create')->with(['allCategory' => $allCategory]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
                [
                   'title1' => 'required|max:255|min:3|unique:news,title', ///phải thêm trường 'title' vào sau post, do name=title1 khác với tên trường là title.
                   'summary1' => 'required|max:255|min:3',
                   'content1' => 'required'
                ]);
        $news = new News();
        $news->title = $request->title1;
        $news->summary = $request->summary1;
        $news->content = $request->content1;
        $news->category_id = $request->category_id1;
        $news->status = $request->status1;
        
        $file = $request->file1;
        $upload_image = '';
        if($file != null) {
            $image_name = $file->getClientOriginalName() . "." . $file->getClientOriginalExtension();
            $image_name = time()."_".$image_name;
            $image_public_path = public_path("images");
            $file->move($image_public_path, $image_name);
            $upload_image = "images/".$image_name;
        }
        $news->cover = $upload_image;
        
        $user = auth()->user();
        $news->user_id = $user->id;
        $news->save();
        
        $request->session()->flash('success','News was successfull');
        return redirect()->route("news_management.index");
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
        $news = News::find($id);
        $allCategory = NewsCategory::all();
        return view('news.edit')->with(['allCategory' => $allCategory, 'news' => $news]);
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
        $request->validate(
                [
                   'title1' => 'required|max:255|min:3', ///phải thêm trường 'title' vào sau post, do name=title1 khác với tên trường là title.
                   'summary1' => 'required|max:255|min:3',
                   'content1' => 'required'
                ]);
        $news = News::find($id);
        $news->title = $request->title1;
        $news->summary = $request->summary1;
        $news->content = $request->content1;
        $news->category_id = $request->category_id1;
        $news->is_active = $request->is_active1;
        
        $file = $request->file1;
        
        if($file != null) {
            $image_name = $file->getClientOriginalName() . "." . $file->getClientOriginalExtension();
            $image_name = time()."_".$image_name;
            $image_public_path = public_path("images");
            $file->move($image_public_path, $image_name);
            $upload_image = "images/".$image_name;
            $news->cover = $upload_image; //phải đưa vào trong if để nếu k muốn thay ảnh thì vẫn còn ảnh cũ
        }
        
        $user = auth()->user();
        $news->user_id = $user->id;
        $news->save();
        
        $request->session()->flash('success','News was successfull');
        return redirect()->route("news_management.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $news = News::find($id);
        $news->delete();
        $request->session()->flash('success','News was deleted');
        return redirect()->route("news_management.index");
    }
    
    public function change($id, Request $request) {
        $news = News::find($id);
        if($news->status == 1) {
            $news->status = 0;
        } else {
            $news->status = 1;
        }
        $news->save();
        $request->session()->flash('success','News was changed');
        return redirect()->route("news_management.index");
    }
}
