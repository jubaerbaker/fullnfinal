<?php

namespace App\Http\Controllers;

use App\Course;
use App\Category;
use App\courseApproval;
use Gate;
use Illuminate\Http\Request;
use App\Http\Requests\course\CreateCourseRequest;
use App\Http\Requests\course\UpdateCourseRequest;

class CourseController extends Controller
{
    //public $approval_id;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseApprovals = courseApproval::all();
        if (count($courseApprovals) < 1) {
            $courseApprovals = [];
        }
        $courses = Course::latest('created_at')->get();
        //return view('course.index')->with('courses', $course)->with('courseApprovals', $courseApprovals);
        return view('course.index', compact('courses', 'courseApprovals'));

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
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCourseRequest $request)
    {
        Course::create([
            'name' => $request->name,
            'description' => $request->description,
            'schedule' => $request->schedule,
            'user_id' => auth()->user()->id

        ]);
        session()->flash('success', 'course created successfully.');
        return redirect(route('courses.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //dd($course->all());
        return view('course.category_list')->with('courses', $course)->with('categories', Category::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        if (!Gate::allows('is_admin')) {
            if (!Gate::allows('is_teacher')) {
                abort(404, "You can not access this page");
            }

        }
        return view('course.create')->with('course', $course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update([
            'name' => $request->name,
            'description' => $request->description,
            'schedule' => $request->schedule
        ]);
        //session()->flash('success', 'Category updated successfully.');
        return redirect('/courses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        if (!Gate::allows('is_admin')) {
            if (!Gate::allows('is_teacher')) {
                abort(404, "You can not access this page");
            }
        }
        if ($course->category->count() > 0) {
            session()->flash('danger', 'Category cannot be deleted because it has some posts.');

            return redirect()->back();
        }

        $course->delete();

        session()->flash('danger', 'Course deleted successfully.');

        return redirect()->back();
    }

}
