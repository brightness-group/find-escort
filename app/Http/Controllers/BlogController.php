<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Blog::paginate(6);

        if ($request->ajax()) {
            $view = view('blog.cards',compact('blogs'))->render();

            return response()->json(['html' => $view]);
        }

        return view('blog.index', compact('blogs'));
    }

    public function show(Request $request, $slug)
    {
        $blog = Blog::with('categories')->whereSlug($slug)->firstOrfail();

        return view('blog.post', compact('blog'));
    }
}
