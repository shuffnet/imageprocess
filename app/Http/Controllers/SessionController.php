<?php

namespace App\Http\Controllers;

use App\Company;
use App\Events\Messages;
use App\Session;
use App\Subject;
use App\User;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //

        $sessions = Session::all();
        return view('session.index')->with('sessions',$sessions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('session.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
      if($request->is_company ==1){
          $session = new Session();
          $session->name = $request->name;
          $session->date = $request->date;
          $session->photographer = $request->photographer;
          $session->multiple = 0;
          $session->address = $request->address;
          $session->city = $request->city;
          $session->state = $request->state;
          $session->zip = $request->zip;
          $session->phone = $request->phone;
          $session->email = $request->email;
          $session->save();

          $subject = new Subject();
          $subject->name = $session->name;
          $subject->email = $request->email;
          $subject->session_id = $session->id;
          $subject->save();
//          return 'company = 1';
          return redirect()->route('subject.show', ['subjectID'=>$subject->id, 'sessionID'=>$session->id]);

      }
      if($request->is_company ==2){
          $session = new Session();

          $session->date = $request->date;
          $session->photographer = $request->photographer;
          $session->multiple = $request->multiple;
          $company = Company::find($request->company);
          $session->name = $company->company;
          $session->address = $company->address;
          $session->city = $company->city;
          $session->state = $company->state;
          $session->zip = $company->zip;
          $session->phone = $company->phone;
          $session->email = $company->email;
          $session->contact = $company->contact;
          $session->save();

          return redirect()->route('session.show', ['id'=>$session->id]);

      }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $session = Session::find($id);
        return view('session.show')->withSession($session);
    }
    public function showsession($sessionID)
    {
        //
        $session = Session::find($sessionID);
        return view('session.showsession')->withSession($session);
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
    public function update(Request $request, $id)
    {
        //
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
