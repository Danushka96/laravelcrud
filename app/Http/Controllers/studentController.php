<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = student::all();
        // dd($students);
        return view('index',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $studentnew = new student;
        $studentnew -> firstname = $request -> firstname;
        $studentnew -> lastname = $request -> lastname;
        $studentnew -> address = $request -> address;
        $studentnew -> tp = $request -> tp;
        $studentnew -> save();
        return redirect('student/create')->with('status','saved');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $studentfind = student::findOrFail($id);
        return view('edit',['student'=>$studentfind]);

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
        $studentfind = student::findOrFail($id);
        $studentfind -> firstname = $request -> firstname;
        $studentfind -> lastname = $request -> lastname;
        $studentfind -> address = $request -> address;
        $studentfind -> tp = $request -> tp;
        $studentfind -> save();
        return redirect('student/'.$studentfind->id.'/edit')->with('status','updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentfind = student::findOrFail($id);
        $studentfind -> delete();
        return redirect('/student');
    }
}
