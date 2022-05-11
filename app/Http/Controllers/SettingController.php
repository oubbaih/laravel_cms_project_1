<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $settings = setting::all();
        // dd($settings);
        return view('admin.settings.index',  compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $setting = new setting();
        //
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'logo' => 'file',
            'footer_copy_right' => 'required',
        ]);
        if ($request->logo) {
            $fileName = $request->file('logo')->getClientOriginalName();
            $path = $request->file('logo')->storeAs('images', $fileName, 'public');
            $res = Media::create(['filename' => '/storage/' . $path]);
            if ($res) {
                $setting->media_id = $res->id;
            }
        }


        $setting->title = $request->title;
        $setting->subtitle = $request->subtitle;
        $setting->footer_copy_right = $request->footer_copy_right;
        $setting->save();
        return redirect(route('setting.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(setting $setting)
    {
        //
        $setting = setting::findOrFail($setting->id);

        return view('admin.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, setting $setting)
    {
        //
        //
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'logo' => 'file',
            'footer_copy_right' => 'required',
        ]);
        if ($request->logo) {
            $fileName = $request->file('logo')->getClientOriginalName();
            $path = $request->file('logo')->storeAs('images', $fileName, 'public');
            $res = Media::create(['filename' => '/storage/' . $path]);
            if ($res) {
                $setting->media_id = $res->id;
            }
        }


        $setting->title = $request->title;
        $setting->subtitle = $request->subtitle;
        $setting->footer_copy_right = $request->footer_copy_right;
        $setting->save();
        return redirect(route('setting.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(setting $setting)
    {
        //
    }
}
