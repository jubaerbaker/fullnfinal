<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use App\Tag;
use App\Course;
use App\Reply;
use App\courseApproval;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\post\CreatePostRequest;
use App\Http\Requests\post\UpdatePostRequest;

class PostController extends Controller
{
    public function __construct()
    {
        //$this->middleware('verifyCategoriesCount1')->only(['create', 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(User::all());
        $posts = Post::latest('created_at')->where('user_id', Auth::user()->id)->get();
        return view('post.index')->with('posts', $posts)->with('categories', Category::all())->with('courses', Course::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courseApprovals = courseApproval::where('status', 1)->get();
        return view('post.create')->with('categories', Category::all())->with('tags', Tag::all())->with('courses', Course::all())->with('courseApprovals', $courseApprovals);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        // Handle File Upload
        if ($file = $request->file('image')) {

            $fileNameToStore = $file->getClientOriginalName();
            $file->move('images', $fileNameToStore);


            // Get filename with the extension
            //$filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            //$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            //$extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            //$fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            //$path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        if ($file1 = $request->file('file')) {
            $fileNameToStore1 = $file1->getClientOriginalName();
            $file1->move('files', $fileNameToStore1);

            // Get filename with the extension
            //$filenameWithExt = $request->file('file')->getClientOriginalName();
            // Get just filename
            //$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            //$extension = $request->file('file')->getClientOriginalExtension();
            // Filename to store
            //$fileNameToStore1= $filename.'_'.time().'.'.$extension;
            // Upload Image
            //$path = $request->file('file')->storeAs('public/file', $fileNameToStore1);
        } else {
            $fileNameToStore1 = 'nofile.jpg';
        }

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'category_id' => $request->category,
            'user_id' => auth()->user()->id,
            'image' => $fileNameToStore,
            'file' => $fileNameToStore1

        ]);
        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }
        session()->flash('success', 'Post created successfully.');
        // redirect user

        return redirect(route('post.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show')->with('post', $post)->with('replies', Reply::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.create')->with('post', $post)->with('categories', Category::all())->with('tags', Tag::all());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->only(['title', 'description', 'content']);
        if ($request->hasFile('image')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);

            $post->deleteImage();
            $data['image'] = $fileNameToStore;
        }
        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }
        $post->update($data);
        session()->flash('success', 'Post updated successfully.');

        return redirect(route('post.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        if ($post->trashed()) {
            // $post->deleteImage();
            //Storage::delete($post->image);
            $post->deleteImage();
            Storage::delete('public/file/' . $post->file);
            $post->forceDelete();
        } else {
            $post->delete();
        }

        session()->flash('denger', 'Post deleted successfully.');

        return redirect()->back();
    }

    /**
     * Display a list of all trashed posts
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $trashed = Post::onlyTrashed()->get();
//        dd($trashed);
        $courses = [];
        return view('post.index')->with('posts', $trashed)->with('courses', $courses);
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        $post->restore();

        session()->flash('success', 'Post restored successfully.');

        return redirect()->back();
    }

    public function AllPost()
    {
        $posts = Post::latest('created_at')->get();
        return view('post.all_post')->with('categories', Category::all())->with('posts', $posts)->with('courseApprovals', courseApproval::all());

    }
}
