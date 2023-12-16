<?php

namespace App\Http\Controllers;

use App\Models\InputsSubjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InputsSubjectsController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputsSubjects=new InputsSubjects();
        $inputsSubjects->setTranslation('spec', 'ar',$request->specAR);
        $inputsSubjects->setTranslation('spec', 'en',$request->specEN );

        $inputsSubjects->setTranslation('val', 'ar',$request->valAR);
        $inputsSubjects->setTranslation('val', 'en',$request->valEN );
        $inputsSubjects->subjects_id=$request->id;

        $inputsSubjects->save();

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\InputsSubjects $inputsSubjects
     * @return \Illuminate\Http\Response
     */
    public function show(InputsSubjects $inputsSubjects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\InputsSubjects $inputsSubjects
     * @return \Illuminate\Http\Response
     */
    public function edit(InputsSubjects $inputsSubjects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\InputsSubjects $inputsSubjects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InputsSubjects $inputsSubjects)
    {

        $inputsSubjects->setTranslation('spec', 'ar',$request->specAR);
        $inputsSubjects->setTranslation('spec', 'en',$request->specEN );

        $inputsSubjects->setTranslation('val', 'ar',$request->valAR);
        $inputsSubjects->setTranslation('val', 'en',$request->valEN );
        $inputsSubjects->subjects_id=$request->id;

        $inputsSubjects->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\InputsSubjects $inputsSubjects
     * @return \Illuminate\Http\Response
     */
    public function destroy(InputsSubjects $inputsSubjects)
    {

    }

    public function importData()
    {

        $tests = DB::table('subjects')->select('*')->get();

        foreach ($tests as $test) {
            $inputs=json_decode($test->inputs);
            foreach ($inputs as $key=> $input){
             $try=new InputsSubjects();


                $try->setTranslation('spec', 'ar',$input->spec);
                $try->setTranslation('spec', 'en','' );

                $try->setTranslation('val', 'ar',$input->val);
                $try->setTranslation('val', 'en','' );

                $try->subjects_id=$test->id;

                $try->save();
                echo true;
            }

        }
//        return 'true';


    }

}
