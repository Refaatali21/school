<?php

namespace App\Http\Controllers;

use App\Models\classroom;
use App\Models\grade;
use Illuminate\Http\Request;
use App\Http\Requests\class_room;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms = classroom::all();
        $grades = grade::all();
        return view('pages.myclasses.myclasses' , compact('classrooms','grades'));
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
    public function store(class_room $request)
    {
        try {
            $List_Classes = request('List_Classes');
            foreach($List_Classes as $List_Class){
            $grades = grade::where('id');
            $classrooms = new classroom();
            $classrooms->name_class = ['en' => $List_Class['name_class'], 'ar' => $List_Class['name']];
            $classrooms->grade_id = $List_Class['grade_id'];

            $classrooms->save();
            }

            toastr()->success('messages.success');
            return redirect()->route('classrooms.index');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(classroom $classroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {

            $classrooms = classroom::findOrFail(request('id'));
            $classrooms->update([
            $classrooms->name_class = ['en' => request('name_en'), 'ar' => request('name')],
            $classrooms->grade_id = request('grade_id'),
            // dd($classrooms),
        ]);
            toastr()->success(trans('messages.Update'));
            return redirect()->route('classrooms.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $classrooms = classroom::findOrFail(request('id'))->delete();
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('classrooms.index');
    }

    public function delete_all(Request $request)
    {
        $classrooms = explode("," , request('delete_all_id'));
        classroom::whereIn('id', $classrooms)->delete();
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('classrooms.index');
    }

    public function filter_classes(Request $request)
    {

        $grades =grade::all();
        $search = classroom::select('*')->where('grade_id','=', request('grade_id'))->get();
        return view('pages.myclasses.myclasses',compact('grades'))->withDetails($search);
    }

}
