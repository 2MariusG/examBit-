<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use Validator;


class FormController extends Controller
{public function __construct(){
    $this ->middleware('auth');
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {   
        $forms= Form::all();
        // $forms = Form::orderBy('task_name')->get();
        return view('form.index', ['forms' => $forms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
       $validator = Validator::make($request->all(),
       [
           'name' => ['required', 'min:3', 'max:64'],
           'name' => ['required', 'min:3', 'max:64'],
       ],
       [
       'name.min' => 'Pavadinimas ne maziau nei 3 raides',
       
       ]
       );
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }

        $form = new Form;
        $form->name = $request->name;
        $form->save();
        return redirect()->route('form.index')->with('success_message', 'Sekmingai įrašytas.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
       return view('form.edit', ['form' => $form]);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form)
    {

        $validator = Validator::make($request->all(),
       [
           'name' => ['required', 'min:3', 'max:64'],
           'name' => ['required', 'min:3', 'max:64'],
       ],
       [
       'name.min' => 'Pavadinimas ne maziau nei 3 raides',
       
       ]
       );
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }
        $form->name = $request->name;
        $form->save();
        return redirect()->route('form.index')->with('success_message', 'Sėkmingai pakeistas.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
    
          if($form->formTask->count()){
           return redirect()->route('form.index')->with('info_message', 'Trinti negalima, nes yra uzduociu');

       }
        $form->delete();
        return redirect()->route('form.index')->with('success_message', 'Sekmingai ištrintas.');


    }
}
