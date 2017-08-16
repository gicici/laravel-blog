<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Session;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create a variable and store all the blog posts in it from the database
        $posts=Post::OrderBy('id','desc')->paginate(5);

        //return a view and pass in the variable
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required|min:10'
            ]);

        //create a new instance of post and store it in a variable
        $post = new Post;

        //Store the user request in the $request
        $post->title = $request->title;
        $post->body = $request->body;

        //save to db
        $post-> save();
        Session::flash('success', 'Your blog post was actually saved!');
        //redirectect back
        return Redirect()->route('posts.show',$post->id);

        //pass data to the view


    }

    /**
     * Display the specified$ resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the db and save it as a variable
        $post=Post::find($id);
        //return the view and pass in the var we previosly created
        return view('posts.edit')->withPost($post);
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
        //validate the data
       $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required|min:10'
            ]);


        //save to database
       $post=Post::find($id);

       $post->title = $request->input('title');
        $post->body = $request->input('body');
       $post->save();

        //set flash data with success message
        Session::flash('success', 'This is successfully saved');
        //redirect back with flash data to post.show
        return redirect()->route('posts.show', $post->id);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find the post in the db and delete it 
        $post=Post::find($id);
        
        //action of deleting it
        $post->delete();
    Session::flash('success', 'You have successfully deleted the post.');
    //redirecting back 
    return redirect()->route('posts.index');
    }
}
