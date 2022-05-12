<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Posts;
use App\Models\setting;
use Illuminate\Http\Request;

class MediaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $images = Media::paginate(10);
        $setting = setting::all();
        return view('admin.media.index', compact('images', 'setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.media.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('storage/images/'), $imageName);

        $imageUpload = new Media();
        $imageUpload->filename = 'storage/images/' . $imageName;
        $imageUpload->save();
        return redirect(route('media.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $image = Media::find($id);
        if ($image) {
            $path = public_path() . $image->filename;
            unlink($path);
            $image->delete();
            // $post->media_id = null;
        } else {
            $filename =  $request->get('filename');
            Media::where('filename', $filename)->delete();
            $path = storage_path(public_path() . 'storage/images/' . $filename);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        return redirect(route('media.index'));
    }
}
