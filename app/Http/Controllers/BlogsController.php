<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBlogRequest;
use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $blogs = Blogs::get();
        // return view('admin.blogs.index', compact('blogs'));

        $blogs = DB::table('blogs')
            ->leftJoin('authors', 'authors.id', '=', 'blogs.author_id')
            ->select('blogs.*', 'authors.name as author_name')
            ->get();

        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = DB::table('authors')->get();

        return view('admin.blogs.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBlogRequest $request)
    {
        // $validated = $request->validate(
        //     [
        //         'title' => 'required|string|max:255|min:10',
        //         'content' => 'required|string|min:10',
        //     ]
        // );

        // $author_id = $request->author_id;
        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        // $input['author_id'] = $author_id;

        $check = Blogs::create($input);

        // $check = Blogs::create([
        //     'title' => $title,
        //     'content' => $content,
        //     // 'image' => $profileImage,
        //     'author_id' => 1,
        // ]);

        if ($check) {
            return redirect(route('dashboard.posts.index'));
        } else {
            return 'error';
        }

        // return ($title . ' ' . $content);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = DB::table('blogs')
            ->leftJoin('authors', 'authors.id', '=', 'blogs.author_id')
            ->select('blogs.*', 'authors.name as author_name')->where('blogs.id', $id)
            ->first();


        return view('admin.blogs.show', compact('blog'));


        // $blog = Blogs::whereId($id)->first();
        // return view('admin.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)


    {
        $authors = DB::table('authors')->get();
        $blog = Blogs::findOrFail($id);
        
        return view('admin.blogs.edit', compact('blog', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blog = Blogs::find($id);
        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $blog->update($input);
        return redirect(route('dashboard.posts.index'));
        // // dd($request);
        // $title   = $request->title;
        // $content = $request->content;

        // $check = Blogs::find($id);

        // $check->title = $title;
        // $check->content = $content;
        // $check->author_id = 1;
        // $check->save();

        // if ($check) {
        //     return redirect(route('dashboard.posts.index'));
        //     // return redirect(route('dashboard.posts.edit', $check->id));
        // } else {

        //     return 'error';
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $check = Blogs::where('id', $id)->delete();
        if ($check)
            return redirect(route('dashboard.posts.index'));
        else return 'error';
    }
}
