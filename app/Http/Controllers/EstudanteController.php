<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Docente;
use App\Models\UsuarioDepartamento;
use App\Models\Estudante;
use App\Models\Curso;
use App\Models\Aula;

use Illuminate\Support\Facades\DB;

class EstudanteController extends Controller
{
    public function index(){
        $cursos = Curso::where("codigo_curso",session("student")->fk_tbl_curso_codigo_curso)->get();
        $allsubjects = DB::select("SELECT tbl_curso.*,tbl_disciplina.*,tbl_curso_disciplina.* FROM tbl_curso,tbl_disciplina,tbl_curso_disciplina WHERE tbl_curso.codigo_curso = tbl_curso_disciplina.fk_tbl_curso_codigo_curso AND tbl_disciplina.codigo_disciplina = tbl_curso_disciplina.fk_tbl_disciplina_codigo_disciplina AND tbl_curso.codigo_curso = ?",[session("student")->fk_tbl_curso_codigo_curso]);

        return view('estudante.home',["curso" => $cursos,"disciplina" => $allsubjects]);
    }

    public function subject($id = 0){

        $cadeira  = base64_decode($id);

        $disciplina = DB::select("SELECT tbl_disciplina.*,tbl_curso_disciplina.*,tbl_docente.* FROM tbl_disciplina,tbl_curso_disciplina,tbl_docente WHERE tbl_disciplina.codigo_disciplina = tbl_curso_disciplina.fk_tbl_disciplina_codigo_disciplina AND tbl_docente.codigo_docente = tbl_curso_disciplina.fk_codigo_docente AND tbl_curso_disciplina.codigo_curso_disciplina = ?", [$cadeira]);

        $horario  = DB::select("SELECT tbl_horario.*,tbl_curso_disciplina.*,tbl_disciplina_horario.* FROM tbl_horario,tbl_curso_disciplina,tbl_disciplina_horario WHERE tbl_disciplina_horario.fk_codigo_curso_disciplina = tbl_curso_disciplina.codigo_curso_disciplina AND tbl_horario.codigo_ = tbl_disciplina_horario.fk_tbl_horario_codigo_ AND tbl_curso_disciplina.codigo_curso_disciplina = ?",[$cadeira]);

        $aula = Aula::where("fk_codigo_curso_disciplina",$cadeira)->where("tema_aula","<>","")->where("data_aula","LIKE",date("Y")."%")->orderBy("data_aula","desc")->get();


        return view('estudante.subject',["disciplina" => $disciplina,"horario" => $horario,"aula" => $aula,"cadeira" => $cadeira]);
    }

    public function message(Request $request){
        $id = $request->aula;
        $subject = $request->subject;
        $message = $request->message;

        $aula = Aula::where("codigo_aula",$id)->first();
        
        if(trim($subject) == "" || trim($message) == ""){
            return redirect()->route("student.subject",["cadeira" => urlencode(base64_encode($aula->fk_codigo_curso_disciplina))])->with("error","Por favor preencha todos os campos");
        }


        $teacher = DB::select("SELECT tbl_curso_disciplina.*,tbl_docente.* FROM tbl_curso_disciplina,tbl_docente WHERE tbl_curso_disciplina.fk_codigo_docente = tbl_docente.codigo_docente AND tbl_curso_disciplina.codigo_curso_disciplina = ?", [$aula->fk_codigo_curso_disciplina]);

        $email = "";

        foreach ($teacher  as $emails) {
            $email = $emails->email_docente;
        }
        
        mail($email,$subject,$message.'\nData da falta: '.$aula->data_aula);

        return redirect()->route("student.subject",["cadeira" => urlencode(base64_encode($aula->fk_codigo_curso_disciplina))])->with("message","Enviado com sucesso");
       
    }

    public function login(Request $request){
        
        $pass = md5($request->pass);
        $code = $request->numero;
        //check for teachers
        $isValid = Docente::where("senha_docente",$pass)->where("codigo_docente",$code)->first();

        if(!$isValid){
            //check for students
            $isValid = Estudante::where("senha_estudante",$pass)->where("codigo_estudante",$code)->first();

            if(!$isValid){
                //check for deps
                $isValid = UsuarioDepartamento::where("codigo_usuario_departamento",$code)->where("senha_usuario_departamento",$pass)->first();
                //check for no user valid

                if(!$isValid){
                    return redirect()->route("login.all")->with("error","Dados incorrectos");
                }else{
                    //redirect to dep's area
                    $request->session()->forget(["teacher","student","dep"]);
                    $request->session()->put("dep",$isValid);
                    return redirect()->route("dep.home");
                }
            }else{
                //redirect to student's area
                $request->session()->forget(["teacher","student","dep"]);
                $request->session()->put("student",$isValid);
                return redirect()->route("student.home");
            }
            
        }else{
            //redirect to teacher's area
            $request->session()->forget(["teacher","student","dep"]);
            $request->session()->put("teacher",$isValid);
            return redirect()->route("teacher.home");
        }
    }

    public function subjectPost(Request $request){
        $cadeira = $request->cadeira;

        if(!$cadeira){
            return redirect()->back();
        }

        return redirect()->route("student.subject",["cadeira" => base64_encode($cadeira)]);
    }

    public function subjectSearch(Request $request) {
    
        $cadeira = $request->cadeira;
        $year =  explode("-",$request->ano);
        $ano = $year[0]."/".$year[1]."/".$year[2];

        $disciplina = DB::select("SELECT tbl_disciplina.*,tbl_curso_disciplina.*,tbl_docente.* FROM tbl_disciplina,tbl_curso_disciplina,tbl_docente WHERE tbl_disciplina.codigo_disciplina = tbl_curso_disciplina.fk_tbl_disciplina_codigo_disciplina AND tbl_docente.codigo_docente = tbl_curso_disciplina.fk_codigo_docente AND tbl_curso_disciplina.codigo_curso_disciplina = ?", [$cadeira]);

        $horario  = DB::select("SELECT tbl_horario.*,tbl_curso_disciplina.*,tbl_disciplina_horario.* FROM tbl_horario,tbl_curso_disciplina,tbl_disciplina_horario WHERE tbl_disciplina_horario.fk_codigo_curso_disciplina = tbl_curso_disciplina.codigo_curso_disciplina AND tbl_horario.codigo_ = tbl_disciplina_horario.fk_tbl_horario_codigo_ AND tbl_curso_disciplina.codigo_curso_disciplina = ?",[$cadeira]);

        $aula = Aula::where("fk_codigo_curso_disciplina",$cadeira)->where("tema_aula","<>","")->where("data_aula","LIKE",date("Y")."%")->orderBy("data_aula","desc")->get();


        return view('estudante.search-subject',["disciplina" => $disciplina,"horario" => $horario,"aula" => $aula,"cadeira" => $cadeira]);
    }

}
