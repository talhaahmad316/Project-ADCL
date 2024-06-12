<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries=Gallery::get();
        return view('admin.gallery.search',compact('galleries'));
    }
    public function create()
    {
        return view('admin.gallery.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'caption'=>'required',
            'alternateText'=>'required',
            'description'=>'required',
            'image'=>'required',
        ]);
        $gallery=new Gallery;
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('gallery'), $imageName);
        $gallery->caption=$request->caption;
        $gallery->alternateText=$request->alternateText;
        $gallery->description=$request->description;
        $gallery->image=$imageName;
        $gallery->save();
        return redirect()->route('admin.gallery.index');
    }
    public function show($id)
    {
        $gallery=Gallery::where('id',$id)->first();
        return view('admin.gallery.show',compact('gallery'));
    }
    public function edit($id)
    {
        $gallery=Gallery::where('id',$id)->first();
        return view('admin.gallery.edit',compact('gallery'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'caption'=>'required',
            'alternateText'=>'required',
            'description'=>'required',
            'image'=>'nullable',
        ]);
        $gallery=Gallery::where('id',$id)->first();
        if ($request->hasFile('image')) {
            if ($gallery->image && file_exists(public_path('gallery/' . $gallery->image))) {
                unlink(public_path('gallery/' . $gallery->image));
            }
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('gallery'), $imageName);
        $gallery->image=$imageName;
        }
        $gallery->caption=$request->caption;
        $gallery->alternateText=$request->alternateText;
        $gallery->description=$request->description;
        $gallery->save();
        return redirect()->route('admin.gallery.index');
    }
    public function destroy($id)
    {
        $gallery=Gallery::where('id',$id)->first();
        if ($gallery) {
            if ($gallery->image && file_exists(public_path('gallery/' . $gallery->image))) {
                unlink(public_path('gallery/' . $gallery->image));
            }
        $gallery->delete();
        }
        return back();
    }
}