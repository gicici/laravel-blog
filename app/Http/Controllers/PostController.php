<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Session;
use App\Category;
use App\Tag;

class PostController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
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
        $category=Category::all();
        $tags=Tag::all();

        return view('posts.create')->withCategory($category)->withTag($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        //validate the data
        $this->validate($request, [
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id' =>'required|integer',
            'body' => 'required|min:10'

            ]);

        //create a new instance of post and store it in a variable
        $post = new Post;

        //Store the user request in the $request
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->category_id = $request->category_id;

        //save to db
        $post-> save();
        $post->tags()->sync($request->tags, false);


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
       $post =Post::find($id);
        $categories =Category::all();
        $cats = array();
        foreach ($categories as $category) {
           $cats[$category->id] = $category->name;
           $tags= Tag::all();
           $tags2=array();
           foreach ($tags as $tag) {
               $tags2[$tag->id] = $tag->name;
           }
         //return the view and pass in the var we previosly created
         return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
        }
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
        $post=Post::find($id);
        if ($request->input('slug')== $post->slug){ 
       $this->validate($request, [
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id' =>'required|integer',
            'body' => 'required|min:10'
            ]);
   }
   else{
 $this->validate($request, [
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id' =>'required|integer',
            'body' => 'required|min:10'
            ]);
   
}
        //save to database
       $post=Post::find($id);

       $post->title = $request->input('title');
        $post->slug = $request->input('slug');
         $post->category_id= $request->input('category_id');
        $post->body = $request->input('body');
       $post->save();
       if (isset($request->tags)) {
            $post->tags()->sync($request->tags);
       }
       else{
        $post->tags()->sync(array());
       }
      

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
