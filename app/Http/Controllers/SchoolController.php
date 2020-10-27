<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\History;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $history = History::all();

            return view('history', compact('history'));
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $history = new History();

            $history->history = $request->history;

            $history->save();

            return redirect('admin/school')->with('alert-success','Descrição Adicionado!');
        }catch(Exception $e){
            return $e->getMessage();
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $history = History::findOrFail($id);
    
            if ($history) {
                return view('school/edit', compact('history'));
            } else {
                return redirect()->back();
            }
        }catch(Exception $e){
            return $e->getMessage();
        }
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
        try{
            $history = History::findOrFail($id);

            $history->history = $request->history;
            
            $history->save();

            return redirect('/admin/school')->with('alert-success','Descrição alterado com sucesso!');
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $history = History::findOrFail($id);
            $history->delete();
            return redirect('admin/school')->with('alert-success','Descrição Deletado!');
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}
