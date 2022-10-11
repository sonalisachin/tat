<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $pages = Pages::latest()->paginate(5);
        return view('pages.index',compact('pages'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $results = Pages::get();
       return view('pages.create',['results'=>$results]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
                'parent_id'=>$request->parent_id,
                'title'=>$request->title,
                'content'=>$request->content,
                'slug'=>strtolower(str_replace(" ","-", $request->title))
                ];

        Pages::insertGetId($data);
        return redirect()->route('pages.index')
                        ->with('success','Pages created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function show(Pages $pages,$id)
    {
       $pageData = Pages::where('id',$id)->first();
       return view('pages.show',['pageData'=>$pageData]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function edit(Pages $pages,$id)
    {
        $results = Pages::get();
        $pageData = Pages::where('id',$id)->first();
        return view('pages.edit',['pageData'=>$pageData,'results'=>$results]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pages $pages,$id)
    {
        $data = [
                'parent_id'=>$request->parent_id,
                'title' =>$request->title,
                'content' =>$request->content,
                'slug' =>strtolower(str_replace(" ","-", $request->title))
                ];
                
        Pages::where('id', $id)->update($data);
        return redirect()->route('pages.index')
                        ->with('success','Page updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pages $pages,$id)
    {
        Pages::where('id', $id)->delete();
    
        return redirect()->route('pages.index')
                        ->with('success','Page deleted successfully');
    }
}
