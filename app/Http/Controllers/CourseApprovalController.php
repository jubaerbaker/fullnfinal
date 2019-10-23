<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\courseApproval;
use App\Course;

class CourseApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Approval.courseRequest')->with('courses', Course::all())->with('courseApprovals', courseApproval::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //dd($id);

        DB::table('course_approvals')->where('id', $id)->update(['status' => 1]);
        /**courseApproval::where('id',$id)->update([
         * 'user_id' => $request->ApproveId,
         * 'course_id'=>$request->courseId,
         * 'course_user_id'=>$request->courseUserId,
         * 'status'=>1
         *
         * ]);*/

        session()->flash('success', 'Course Requrest Accepted successfully.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(courseApproval $courseApproval)
    {
        $courseApproval->delete();

        session()->flash('denger', 'course request sent deleted.');

        return redirect()->back();
    }

    public function ApproveMe(Request $request)
    {
        //dd($request->courseId);
        courseApproval::create([
            'user_id' => $request->ApproveId,
            'course_id' => $request->courseId,
            'course_user_id' => $request->courseUserId,
            'status' => 0

        ]);
        session()->flash('success', 'course request sent successfully.');
        return redirect()->back();
    }

    public function ApprovalList()
    {
        return view('Approval.courseApprovalRequest')->with('courses', Course::all())->with('courseApprovals', courseApproval::all());

    }

    public function myCourse()
    {
        return view('Approval.myApprovalCourse')->with('courses', Course::all())->with('courseApprovals', courseApproval::all());
    }

    public function ApproveMyCourse(Request $request)
    {
        courseApproval::create([
            'user_id' => $request->ApproveId,
            'course_id' => $request->courseId,
            'course_user_id' => $request->courseUserId,
            'status' => 1

        ]);
        session()->flash('success', 'course request sent successfully.');
        return redirect()->back();
    }
}
