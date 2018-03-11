<?php

namespace App\Http\Controllers;

use App\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;


class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax_checked($id, $checked){
        $subject = Subject::find($id);
        $subject->complete = $checked;
//        if($checked == 0){
//            $subject->complete_date = NULL;
//        }else{
//            $subject->complete_date = Carbon::now();
//        }
        $subject->save();
        return $checked;

    }
    public function index()
    {
        //
        $subjects = Subject::all();
        return view('subject.index')->with('subjects', $subjects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $sessionID)
    {
        //
        $subject = new Subject();
        $subject->name = $request->name;
        $subject->session_id = $sessionID;
        $subject->email = $request->email;
        $subject->save();
        return redirect()->route('session.menu',['lastID'=>$subject->id, 'session'=>$sessionID]);
    }

    public function menu($lastID, $sessionID){

        if(Session::has('success')){
            Session::flash('success', 'Thanks for the information');
        }
        $session = \App\Session::find($sessionID);

        return view('session.menu')
            ->with('lastID', $lastID)
            ->with('session', $session);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($subjectID, $sessionID)
    {
        //
        $subject = Subject::find($subjectID);
        $session = \App\Session::find($sessionID);
        return view('subject.show')
            ->with('subject', $subject)
            ->with('session', $session);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $subjectID, $sessionID)
    {
        //
        $subject = Subject::find($subjectID);
        $subject->name = $request->name;
        $subject->email = $request->email;
        $subject->makeup = $request->makeup;
        $subject->image = $request->image;
        $subject->notes = $request->notes;
        $subject->save();
        return redirect()->route('session.showsession',[ 'sessionID'=>$sessionID]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
