<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Course;
use App\courseApproval;
use Gate;
use Illuminate\Http\Request;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoryRequest;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::latest('created_at')->get();
        return view('category.index')->with('categories', $category)->with('posts', Post::all())->with('courseApprovals', courseApproval::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('is_admin')) {
            if (!Gate::allows('is_teacher')) {
                abort(404, "You can not access this page");
            }
        }
        $courses = Course::where('user_id', Auth::user()->id)->get();
        return view('category.create')->with('courses', $courses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {

        //dd($request->all());
        Category::create([
            'name' => $request->name,
            'course_id' => $request->course,
            'user_id' => auth()->user()->id

        ]);
        session()->flash('success', 'Category created successfully.');
        return redirect(route('categories.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //dd($category);
        return view('category.post_list')->with('categories', $category)->with('posts', Post::all());
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        if (!Gate::allows('is_admin')) {
            if (!Gate::allows('is_teacher')) {
                abort(404, "You can not access this page");
            }
        }
        return view('category.create')->with('category', $category)->with('courses', Course::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
            'course_id' => $request->course
        ]);
        //session()->flash('success', 'Category updated successfully.');
        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (!Gate::allows('is_admin')) {
            if (!Gate::allows('is_teacher')) {
                abort(404, "You can not access this page");
            }

        }
        if ($category->post->count() > 0) {
            session()->flash('danger', 'Category cannot be deleted because it has some posts.');

            return redirect()->back();
        }
        $category->delete();

        session()->flash('denger', 'Category deleted successfully.');

        return redirect(route('categories.index'));
    }
}
