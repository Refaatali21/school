<?php

namespace App\Http\Controllers;

use App\Models\grade;
use App\Models\classroom;
use Illuminate\Http\Request;
use App\Http\Requests\store_garset;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = grade::all();
        return view('pages.grades.grades' , compact('grades'));
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
    public function store(store_garset $request)
    {


        try {
            $validated = $request->validated();

            $grades = new grade();
            $grades->name = ['en' => request('name_en'), 'ar' => request('name')];
            $grades->notes = ['en' => request('notes'), 'ar' => request('notes')];
            // dd($grades);
            $grades->save();
            toastr()->success('messages.success');
            return redirect()->route('grades.index');
        }

        catch (\Throwable $er) {
            return redirect()->back()->withErrors(['error' => $er->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(store_garset $request)
    {

        try {

            $validated = $request->validated();
            $grades = grade::findOrFail(request('id'));
            $grades->update([
            $grades->name = ['ar' => request('name'), 'en' => request('name_en')],
            $grades->notes = request('notes'),
            // dd($grades),
        ]);
            toastr()->success(trans('messages.Update'));
            return redirect()->route('grades.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $myclasses = classroom::where('grade_id' , request('id'))->pluck('grade_id');
        if ($myclasses->count() == 0) {

        $grades = grade::findOrFail(request('id'))->delete();
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('grades.index');

        }else{
            toastr()->error(trans('grades_trans.delete_grade_error'));
        return redirect()->route('grades.index');
        }



    }
}

