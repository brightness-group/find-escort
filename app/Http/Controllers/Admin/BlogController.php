<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Blog, Category};
use App\Http\Requests\Admin\BlogRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();

        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        $input = $request->except('thumbnail');

        if ($request->hasFile('thumbnail')) {
            $thumbnailName = 'blog_'.time() . '.' . $request->thumbnail->getClientOriginalExtension();
            $request->thumbnail->move(public_path() . '/uploads/blogs/', $thumbnailName);

            $input['thumbnail'] = $thumbnailName;
        }

        $blog = Blog::create($input);

        $blog->categories()->attach($request->categories_id);

        return redirect()->route('admin.blogs.index');
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
        $blog = Blog::with('categories')->find($id);
        $categories = Category::all();

        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, $id)
    {
        $blog = Blog::find($id);

        $input = $request->except('thumbnail');

        if ($request->hasFile('thumbnail')) {

            $this->deleteOldThumbnail($blog->thumbnail);

            $thumbnailName = 'blog_'.time() . '.' . $request->thumbnail->getClientOriginalExtension();
            $request->thumbnail->move(public_path() . '/uploads/blogs/', $thumbnailName);

            $input['thumbnail'] = $thumbnailName;
        }

        $blog->update($input);
        $blog->categories()->sync($request->categories_id);

        return redirect()->route('admin.blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();

        return redirect()->route('admin.blogs.index');
    }

    public function bulkDestroy(Request $request)
    {
        $ids = explode(",", $request->blog_ids);

        foreach (Blog::whereIn('id', $ids)->get() as $blog) {
            $blog->delete();
        }

        return redirect()->route('admin.blogs.index');
    }

    public function deleteOldThumbnail($path)
    {
        $fullPath = public_path() . "/uploads/blogs/" . $path;

        if (\File::exists($fullPath)) {
            \File::delete($fullPath);
        }
    }
}
