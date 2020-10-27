<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Course;
use App\TeacherCourse;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $teachers = Teacher::all();
            $courses = Course::all();
            $teacherCourse = DB::table('teacher_courses')
            ->join('teachers', 'teachers.id', 'teacher_id')
            ->join('courses', 'courses.id', 'course_id')
            ->select('teacher_courses.*','teacher_courses.id as id_tc', 'teachers.*','courses.*','teachers.name as teacher', 'courses.name as course')
            ->orderBy('teachers.name', 'asc')
            ->get();

            return view('teachers', compact(['teachers', 'courses', 'teacherCourse']));
        }catch(Exception $e){
            return $e->getMessage();
        }
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

    public function relationship(Request $request){
        try{
            $rel = new TeacherCourse();

            $rel->teacher_id = $request->teacher_id;
            $rel->course_id = $request->course_id;

            $rel->save();

            return redirect('/admin/teachers')->with('alert-success','Professor Adicionado!');
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
            $teachers = new Teacher();

            $teachers->name = $request->name;
            $teachers->information = $request->information;
            

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                // Define um aleatório para o arquivo baseado no timestamps atual
                $name = uniqid(date('HisYmd'));
        
                // Recupera a extensão do arquivo
                $extension = $request->image->extension();
        
                // Define finalmente o nome
                $nameFile = "{$name}.{$extension}";
        
                // Faz o upload:
                $upload = $request->image->storeAs('teachers', $nameFile);
        
                // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
        
                // Verifica se NÃO deu certo o upload (Redireciona de volta)
                if ( !$upload )
                    return redirect()
                                ->back()
                                ->with('error', 'Falha ao fazer upload')
                                ->withInput();
        
                }
                $teachers->image = $upload;
                $teachers->save();
        
                return redirect('/admin/teachers')->with('alert-success','Professor Adicionado!');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $teachers = Teacher::findOrFail($id);
    
            if ($teachers) {
                return view('teachers/edit', compact('teachers'));
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
            $teachers = Teacher::findOrFail($id);

            $teachers->name = $request->name;
            $teachers->information = $request->information;
            $upload = $teachers->image;
            
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
            $teachers->image = $upload;
            $teachers->save();

            return redirect('/admin/teachers')->with('alert-success','Professor alterado com sucesso!');
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
            $teachers = Teacher::findOrFail($id);
            $teachers->delete();
            return redirect('admin/teachers')->with('alert-success','Professor Deletado!');
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function deleteRelationship($id)
    {
        try{
            $teachers = TeacherCourse::findOrFail($id);
            $teachers->delete();
            return redirect('admin/teachers')->with('alert-success','Relação Deletada!');
        }catch(Exception $e){
            return $e->getMessage();
        }
    }


}
