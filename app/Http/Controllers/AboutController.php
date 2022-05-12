<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Media;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $aboutInfo = About::with('media')->get();
        return view('admin.about.index', compact('aboutInfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.about.create');
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
        //
        $request->validate([
            'image' => 'required',
            'content' => 'required',
        ]);
        $input = [];
        if ($request->image) {
            $fileName = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
            $res = Media::create(['filename' => '/storage/' . $path]);
            if ($res) {
                $input['media_id'] = $res->id;
            }
        }
        $input['content'] = $request->content;
        About::create($input);
        return redirect(route('page.about'));
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
    public function edit(About $about)
    {
        //
        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        // dd($request);
        //
        // $request->validate([
        //     'image' => 'required',
        //     'content' => 'required',
        // ]);
        if ($request->image) {
            $fileName = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
            $res = Media::create(['filename' => '/storage/' . $path]);
            if ($res) {
                $about->media_id = $res->id;
            }
        }
        $about->content = $request->content;
        $about->save();
        return redirect(route('page.about'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
