<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::orderBy('order', 'asc')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pages.banner.index', compact('banners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['nullable', 'string', 'max:255'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg,webp,gif', 'max:5120'],
            'link_url' => ['nullable', 'url'],
            'is_active' => ['nullable'],
            'order' => ['nullable', 'integer'],
        ]);

        $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
        
        // Simpan file ke folder public/images agar langsung dapat diakses
        $request->image->move(public_path('images'), $imageName);

        $banner = new Banner();
        $banner->title = $request->title;
        $banner->image = $imageName;
        $banner->link_url = $request->link_url;
        $banner->is_active = $request->has('is_active') ? (bool) $request->is_active : true;
        $banner->order = $request->order ?? 0;
        $banner->save();

        return redirect('/admin-pplg/banner')->with('success', 'Banner berhasil ditambahkan');
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
        $this->validate($request, [
            'title' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp,gif', 'max:5120'],
            'link_url' => ['nullable', 'url'],
            'is_active' => ['nullable'],
            'order' => ['nullable', 'integer'],
        ]);

        $banner = Banner::findOrFail($id);

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $banner->image = $imageName;
        }

        $banner->title = $request->title;
        $banner->link_url = $request->link_url;
        $banner->is_active = $request->is_active == '1' || $request->is_active == 'true' || $request->is_active == 'on' ? true : false;
        $banner->order = $request->order ?? 0;
        $banner->save();

        return redirect('/admin-pplg/banner')->with('success', 'Banner berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();

        return redirect('/admin-pplg/banner')->with('success', 'Banner berhasil dihapus');
    }
}
