<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $courses = Course::all();
            return view('courses', compact('courses'));
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
            $courses = new Course();

            $courses->name = $request->name;
            $courses->description = $request->description;
            
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));
    
            // Recupera a extensão do arquivo
            $extension = $request->image->extension();
    
            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";
    
            // Faz o upload:
            $upload = $request->image->storeAs('courses', $nameFile);

            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/pasta/nomedinamicoarquivo.extensao
    
            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload )
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();
    
            }
            $courses->image = $upload;
            $courses->save();

            return redirect('/admin/courses')->with('alert-success','Curso Adicionado!');
        }catch(Exception $e){
            return $e->getMessage();
        }
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
            $courses = Course::findOrFail($id);
    
            if ($courses) {
                return view('courses/edit', compact('courses'));
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
            $courses = Course::findOrFail($id);

            $courses->name = $request->name;
            $courses->description = $request->description;
            $upload = $courses->image;
            
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));
    
            // Recupera a extensão do arquivo
            $extension = $request->image->extension();
    
            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";
    
            // Faz o upload:
            $upload = $request->image->storeAs('courses', $nameFile);

            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
    
            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload )
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();
    
            }
            $courses->image = $upload;
            $courses->save();

            return redirect('/admin/courses')->with('alert-success','Curso alterado com sucesso!');
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
            $courses = Course::findOrFail($id);
            $courses->delete();
            return redirect('admin/courses')->with('alert-success','Curso Deletado!');
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}
