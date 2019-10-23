<?php

namespace App\Http\Controllers;

use App\Course;
use App\Poll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polls = DB::table('poll_answers')
            ->select(DB::raw('course_id, answer, COUNT(answer) as total_answer'))
            ->groupBy('answer')
            ->groupBy('course_id')
            ->get();
        return view('course.polls', compact('polls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('course.create_poll', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $options = $request->options;
        $poll = new Poll();
        $poll->options = json_encode($options);
        $poll->question = $request->question;
        $poll->course_id = $request->course_id;
        $poll->user_id = Auth::user()->id;
        if ($poll->save()) {
            session()->flash('success', 'poll created successfully.');
        } else {
            session()->flash('success', 'poll create failed.');
        }
        return redirect('/poll/create');
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
