<?php

namespace App\Http\Controllers;

use App\Models\sections;
use App\Models\classroom;
use App\Models\grade;
use App\Http\Requests\storesections;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = grade::with(['sections'])->get();
        $listgrades = grade::all();
        return view('pages.sections.sections' , compact('listgrades' , 'grades'));
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
    public function store(storesections $request)
    {

        try {

            $validated = request('validated');

            $sections = new sections();
            $sections->name_section = ['ar' => request('name_section_ar') , 'en' => request('name_section_en')];
            $sections->class_id = request('class_id');
            $sections->grade_id = request('grade_id');
            $sections->status = 'on';
            $sections->save();


            toastr()->success('messages.success');
            return redirect()->route('sections.index');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function show(sections $sections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function edit(sections $sections)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function update(storesections $request)
    {
        try {
            $validated = request('validated');

            $sections = sections::findOrFail(request('id'));
            $sections->name_section = ['ar' => request('name_section_ar') , 'en' => request('name_section_en')];
            $sections->class_id = request('class_id');
            $sections->grade_id = request('grade_id');

            if (isset($request->status)){
                $sections->status = 'on';
            }else{
                $sections->status = 'off';
            }


            $sections->save();
            toastr()->success('messages.update');
            return redirect()->route('sections.index');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        sections::findOrFail(request('id'))->delete();
        toastr()->success('messages.Delete');
            return redirect()->route('sections.index');
    }

    public function getclasses($id)
    {
        $list_classes = classroom::where('grade_id' , $id)->pluck('name_class' , 'id');
        return $list_classes;
    }
}
