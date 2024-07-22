<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Models\Authors;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Authors::get();
        return view('admin.authors.index', compact('authors'));


        // $author = DB::table('authors')->get();
        // return $authors;
        // $author = DB::table('authors')->count();
        // $author = DB::table('authors')->where('name', 'nour1')->first();
        // $author = DB::table('authors')
        //     ->select('name', 'description as desc')
        //     ->get();
        // $author = DB::table('authors')->distinct()->get();

        // $authors = DB::table('users')
        //     ->join('contacts', 'users.id', '=', 'contacts.user_id')
        //     ->join('orders', 'users.id', '=', 'orders.user_id')
        //     ->select('users.*', 'contacts.phone', 'orders.price')
        //     ->get();

        // return $authors;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
        try {

            // insert into db
            Authors::create([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $request->image,
            ]);

            return back()->with('success', 'The Author has inserted successfully');
        } catch (Exception $e) {

            return back()->withErrors(['error' => 'something happened']);
        }

        // $validated = $request->validate(
        //     [
        //         'name' => 'required|string',
        //         'description' => 'required|string|min:10',
        //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     ]
        // );

        // $name = $request->name;
        // $description = $request->description;

        //         // ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
        //         $input = $request->all();

        //         if ($image = $request->file('image')) {
        //             $destinationPath = 'images/';
        //             $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //             $image->move($destinationPath, $profileImage);
        //             $input['image'] = "$profileImage";
        //         } else {
        //             unset($input['image']);
        //         }

        //         Authors::create($input);

        //         return redirect()->route('dashboard.authors.index')
        //             ->with('success', 'Product created successfully.');
        // // ************************************************

        // $check = Authors::create([
        //     'name' => $name,
        //     'description' => $description,
        //     'image' => $profileImage,
        // ]);

        // if ($check) {
        //     return redirect(route('dashboard.authors.index'));
        // } else {
        //     return 'error';
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $author_blogs = DB::table('blogs')->where('author_id', $id)->get();

        return view('admin.authors.show', compact('author_blogs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $author = Authors::findOrFail($id);
        return view('admin.authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $author = Authors::find($id);
        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $author->update($input);
        return redirect(route('dashboard.authors.index'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $check = Authors::where('id', $id)->delete();
        if ($check)
            return redirect(route('dashboard.authors.index'));
        else return 'error';
    }
}
