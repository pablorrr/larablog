<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{ //todo: stworezyc to w zupelnie nowymprojekcie io dodoac model z migracja
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('add-post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $blog = new Blog;


        $blog->title = $request->input('title');
        $blog->content = $request->input('content');


        $blog->save();


        return redirect()->route('blogs.index')->with([
            'status' => [
                'type' => 'success',
                'content' => 'Post został dodany',
            ]
        ]);


    }


    public function show($id)
    {
        $blog = Blog::find($id);

        return view('show-post', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //pobranie z DB
        $blog = Blog::findOrFail($id);

        return view('edit-post', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->save();

        return redirect()->route('blogs.index')->with([
            'status' => [
                'type' => 'success',
                'content' => 'Zapisano zmiany',
            ]
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::all()->find($id);


        $blog->delete();

        return redirect()->route('blogs.index')->with([
            'status' => [
                'type' => 'success',
                'content' => 'Post został usunięty',
            ]
        ]);
    }
}
