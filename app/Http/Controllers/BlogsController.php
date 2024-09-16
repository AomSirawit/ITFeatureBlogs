<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blogs;
use App\Models\User;
use App\Models\category;
use Illuminate\Support\Facades\Storage;


class BlogsController extends Controller
{

    public function show($id)
    {
        $blog = blogs::find($id);
        $user = User::find($blog->user_id);
        if (!$blog) {
            abort(404, 'Blog post not found');
        }
        return view('viewblog', compact('blog', 'user'));
    }
    public function index()
    {
        $blogsTable = blogs::all();
        return view('backoffice.manageBlogs', compact('blogsTable'));
    }

    public function edit($id)
    {
        $blog = blogs::findOrFail($id);
        $users = User::all();
        $categories = Category::all();

        return view('backoffice.blogs.editBlogs', compact('blog', 'users', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|string',
            'cate_id' => 'required|exists:categories,id' // Ensure that the category exists
        ]);

        $blog = blogs::findOrFail($id);
        $blog->title = $request->input('title');

        if ($request->hasFile('image')) {
            // Delete old image
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            $imagePath = $request->file('image')->store('blog_images', 'public');
            $blog->image = $imagePath;
        }

        $blog->description = $request->input('description');
        $blog->cate_id = $request->input('cate_id');
        $blog->save();

        return redirect()->route('blogs.show')->with('success', 'Blog updated successfully');
    }


    public function destroy($id)
    {
        $blog = blogs::findOrFail($id);
        $blog->delete();
        return redirect()->route('blogs.show');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|string',
            'user_id' => 'required|exists:users,id', // Ensure that the user exists
            'cate_id' => 'required|exists:categories,id' // Ensure that the category exists
        ]);

        $blog = new blogs(); // Ensure this matches your model's name
        $blog->title = $request->input('title');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blog_images', 'public');
            $blog->image = $imagePath;
        }

        $blog->description = $request->input('description');
        $blog->user_id = $request->input('user_id'); // Ensure you're storing the user ID
        $blog->cate_id = $request->input('cate_id'); // Ensure you're storing the category ID
        $blog->save();

        return redirect()->route('blogs.show');

    }

    public function create()
    {
        $users = User::all();
        $blog = blogs::all();
        $categories = category::all();

        return view('backoffice.blogs.createBlogs', compact('blog', 'users', 'categories'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $validated = $request->validate([
            'query' => 'required|string|max:255',
        ]);

        $blogs = blogs::where('title', 'like', "%{$query}%")
            ->get();

        // Return the view with results
        return view('search-result', compact('blogs'));

    }
    public function searchView(){
        return view('search');
    }

}


