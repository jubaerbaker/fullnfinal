<?php

namespace App\Http\Controllers;

use App\Poll;
use App\PollAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PollAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $polls = Poll::all();
        return view('course.pollanswer', compact('polls'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $answer = $request->answer;
        $courses = $request->course_id;
        foreach ($courses as $key => $course):
            if (array_key_exists($course, $answer)) {
                $pollAnswer = new PollAnswer();
                $pollAnswer->course_id = $course;
                $pollAnswer->answer = $answer[$course];
                $pollAnswer->user_id = Auth::user()->id;
                if ($pollAnswer->save()) {
                    session()->flash('success', 'Post created successfully.');
                }
            }
        endforeach;
        return redirect('/pollanswer/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
