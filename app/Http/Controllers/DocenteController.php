<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Aula;
use App\Models\Inscricao;
use App\Models\Presence;
use App\Models\Estudante;
use App\Models\Horario;
use App\Models\UsuarioDepartamento;

use App\Http\Requests\teacherSearchValidator;

use Illuminate\Support\Facades\DB;

class DocenteController extends Controller
{
    public function index(){
        date_default_timezone_set("Africa/maputo");

        $allFinishedLessons = Horario::where("termino","<",date("H:i:s"))->where("dia_semana",localtime(time(),true)['tm_wday'])->get();

        $feriados = DB::select("SELECT * FROM tbl_feriados");


        foreach($allFinishedLessons as $linha){
            $getFinisheLessons = Aula::where("fk_codigo_curso_disciplina",$linha->fk_codigo_curso_disciplina)->where("data_aula",date("Y/m/d"))->first();

            $id = rand(111111,999999);

            if(!$getFinisheLessons){
               if($linha->termino < date("Y/m/d") && $linha->dia_semana == localtime(time(),true)['tm_wday'] && $linha->termino){
                //verify if it's not a holiday

                $isHoliday = false;
                foreach ($feriados as $holiday) {
                   if($holiday->data_feriado == date("m/d")){
                       $isHoliday = true;
                       break;
                   }
                }

               if(!$isHoliday)
                    Aula::create([
                    "codigo_aula" => $id,
                    "data_aula" => date("Y/m/d"),
                    "tema_aula" => NULL,
                    "fk_codigo_curso_disciplina" => $linha->fk_codigo_curso_disciplina
                    ]);
               }
            }
        }

        $cursos = Curso::get();
        return view('docente.home',["curso" => $cursos]);
    }

    public function subject($cadeira = 0){
        date_default_timezone_set("Africa/maputo");

        $disciplina = DB::select("SELECT tbl_disciplina.*,tbl_curso_disciplina.*,tbl_docente.* FROM tbl_disciplina,tbl_curso_disciplina,tbl_docente WHERE tbl_disciplina.codigo_disciplina = tbl_curso_disciplina.fk_tbl_disciplina_codigo_disciplina AND tbl_docente.codigo_docente = tbl_curso_disciplina.fk_codigo_docente AND tbl_curso_disciplina.codigo_curso_disciplina = ?", [base64_decode($cadeira)]);
       
        $horario  = DB::select("SELECT tbl_horario.*,tbl_curso_disciplina.*,tbl_disciplina_horario.* FROM tbl_horario,tbl_curso_disciplina,tbl_disciplina_horario WHERE tbl_disciplina_horario.fk_codigo_curso_disciplina = tbl_curso_disciplina.codigo_curso_disciplina AND tbl_horario.codigo_ = tbl_disciplina_horario.fk_tbl_horario_codigo_ AND tbl_curso_disciplina.codigo_curso_disciplina = ?",[base64_decode($cadeira)]);

        $presenca = Aula::where("fk_codigo_curso_disciplina",base64_decode($cadeira))->where("data_aula","LIKE",date("Y")."%")->orderBy("data_aula","desc")->get();

        return view('docente.subject',["disciplina" => $disciplina,"horario" => $horario, "presenca" => $presenca,"cadeira"=>$cadeira]);
    }

    public function check($idDisciplina = 0, $idAula = 0){
        date_default_timezone_set("Africa/maputo");

        $student = DB::select("SELECT tbl_estudante.*,tbl_disciplina.*,tbl_disciplina_estudante.*,tbl_curso_disciplina.* FROM tbl_estudante,tbl_disciplina,tbl_disciplina_estudante,tbl_curso_disciplina WHERE tbl_estudante.codigo_estudante = tbl_disciplina_estudante.fk_codigo_estudante AND tbl_disciplina_estudante.fk_codigo_curso_disciplina = tbl_curso_disciplina.codigo_curso_disciplina AND tbl_disciplina.codigo_disciplina = tbl_curso_disciplina.fk_tbl_disciplina_codigo_disciplina  AND tbl_curso_disciplina.codigo_curso_disciplina = ?", [base64_decode($idDisciplina)]);

        $presenca = DB::select("SELECT * FROM tbl_presenca WHERE fk_tbl_aula_codigo_aula = ?",  [base64_decode($idAula)]);

        return view('docente.check',["student" => $student,"presenca" => $presenca,"codigoAula" => $idAula,"cadeira" => $idDisciplina,"aula" => $idAula]);
    }

    public function presence($cadeira = 0){
        date_default_timezone_set("Africa/maputo");

        $disciplina = DB::select("SELECT tbl_disciplina.*,tbl_curso_disciplina.*,tbl_docente.* FROM tbl_disciplina,tbl_curso_disciplina,tbl_docente WHERE tbl_disciplina.codigo_disciplina = tbl_curso_disciplina.fk_tbl_disciplina_codigo_disciplina AND tbl_docente.codigo_docente = tbl_curso_disciplina.fk_codigo_docente AND tbl_curso_disciplina.codigo_curso_disciplina = ?", [base64_decode($cadeira)]); 

        $presenca = Aula::where("fk_codigo_curso_disciplina",base64_decode($cadeira))->where("data_aula","LIKE",date("Y")."%")->orderBy("data_aula","desc")->get();

        if(!$disciplina){
            return redirect()->back();
        }

        return view('docente.me',compact("disciplina","presenca","cadeira"));
    }

    public function subjectByCourse($id = 0){
        date_default_timezone_set("Africa/maputo");


        $subjects = DB::select("SELECT tbl_disciplina.*,tbl_curso.*,tbl_curso_disciplina.* FROM tbl_disciplina,tbl_curso,tbl_curso_disciplina WHERE tbl_disciplina.codigo_disciplina=tbl_curso_disciplina.fk_tbl_disciplina_codigo_disciplina AND tbl_curso.codigo_curso=tbl_curso_disciplina.fk_tbl_curso_codigo_curso AND tbl_curso.codigo_curso=?",[$id]);

        return $subjects;
    }

    public function searchTeacherSubject(teacherSearchValidator $request){
        date_default_timezone_set("Africa/maputo");
        
        $ano = $request->ano;
        $curso = $request->curso;
        $cadeira = $request->cadeira;
      
        return redirect()->route("teacher.subject",["cadeira" => urlencode(base64_encode($cadeira))]);
      
    }

    public function addTopic(Request $request){
        date_default_timezone_set("Africa/maputo");

        $chair = $request->chairs;
        $subject = $request->subject;
        $date = date("Y/m/d");
        $id = rand(111111,999999);

        $check = Aula::where("data_aula",$date)->where("fk_codigo_curso_disciplina",$chair)->first();
    

        if($check){

            return response()->json(["error" => "Impossivel colocar dois temas no mesmo dia"]);
        }

        //forbid to sign if the withdraw has arrived
        $time = Horario::where("fk_codigo_curso_disciplina",$chair)->where("dia_semana",localtime(time(),true)['tm_wday'])->where("termino","<>","")->first();

        
        if($time){
            if(($time->termino < date("H:i:s") ||  $time->termino < date("H:i"))){
                return response()->json(["error" => "So pode adicionar tema no dia e hora de aula"]);
            }

            if($time->inicio > date("H:i:s") || $time->inicio > date("H:i")){
                return response()->json(["error" => "Por favor aguarde ate a aula iniciar"]);
            }


            Aula::create([
                "codigo_aula" => $id,
                "data_aula" => $date,
                "tema_aula" => $subject,
                "fk_codigo_curso_disciplina" => $chair
            ]);

            return response()->json(["msg" => "success"]);
        }

        return response()->json(["error" => "So pode adicionar tema no dia e hora de aula"]);
    }

    public function addPresence(Request $request){
        
        date_default_timezone_set("Africa/maputo");

        $codigoAula = $request->codigoAula;
        $codigoEstudante = $request->codigoEstudante;

        $check = Presence::where("fk_tbl_aula_codigo_aula",base64_decode($codigoAula))->where("fk_tbl_estudante_codigo_estudante",$codigoEstudante)->first();

        if($check){
            $check->where("fk_tbl_aula_codigo_aula",base64_decode($codigoAula))->where("fk_tbl_estudante_codigo_estudante",$codigoEstudante)->delete();
        }else{
            Presence::create([
                "fk_tbl_aula_codigo_aula" => base64_decode($codigoAula),
                "fk_tbl_estudante_codigo_estudante" => $codigoEstudante
            ]);
        }

        return response()->json(["msg" => "success"]);

    }

    function sendMail(Request $request) {
        $id = $request->sendfeed;
        $subject = $request->subject;
        $message = $request->message;
        $cadeira = $request->cadeira;

        $aula = Aula::where("codigo_aula",$id)->first();

        if(trim($subject) == "" || trim($message) == "" ) {
            return redirect()->route("teacher.presence",["cadeira" => urlencode(base64_encode( $cadeira)) ])->with("error","Por favor preencha todos os campos");
        }

        if($aula){
            $getCourse = DB::select("SELECT tbl_curso_disciplina.*,tbl_curso.* FROM tbl_curso_disciplina,tbl_curso WHERE tbl_curso_disciplina.fk_tbl_curso_codigo_curso = tbl_curso.codigo_curso AND tbl_curso_disciplina.codigo_curso_disciplina = ? LIMIT 1", [$cadeira]);

            foreach ($getCourse as $value) {
                $code = $value->fk_tbl_departamento_codigo_departamento;

                $getEmailOfMyDep = UsuarioDepartamento::where("fk_tbl_departamento_codigo_departamento",$code)->first();

               $email = $getEmailOfMyDep->email_usuario_departamento;

               //send mail

               mail($email,$subject,$message.'\nData da falta: '.$aula->data_aula);

               return redirect()->route("teacher.presence",["cadeira" => urlencode(base64_encode( $cadeira)) ])->with("message","Enviado com sucesso");
            }
        }
    }

    public function searchSubject(Request $request) {
        date_default_timezone_set("Africa/maputo");

        $cadeira = $request->cadeira;
        $year =  explode("-",$request->ano);
        $ano = $year[0]."/".$year[1]."/".$year[2];
        
        $disciplina = DB::select("SELECT tbl_disciplina.*,tbl_curso_disciplina.*,tbl_docente.* FROM tbl_disciplina,tbl_curso_disciplina,tbl_docente WHERE tbl_disciplina.codigo_disciplina = tbl_curso_disciplina.fk_tbl_disciplina_codigo_disciplina AND tbl_docente.codigo_docente = tbl_curso_disciplina.fk_codigo_docente AND tbl_curso_disciplina.codigo_curso_disciplina = ?", [base64_decode($cadeira)]);
       
        $horario  = DB::select("SELECT tbl_horario.*,tbl_curso_disciplina.*,tbl_disciplina_horario.* FROM tbl_horario,tbl_curso_disciplina,tbl_disciplina_horario WHERE tbl_disciplina_horario.fk_codigo_curso_disciplina = tbl_curso_disciplina.codigo_curso_disciplina AND tbl_horario.codigo_ = tbl_disciplina_horario.fk_tbl_horario_codigo_ AND tbl_curso_disciplina.codigo_curso_disciplina = ?",[base64_decode($cadeira)]);

        $presenca = Aula::where("fk_codigo_curso_disciplina",base64_decode($cadeira))->where("data_aula",$ano)->orderBy("data_aula","desc")->get();

        return view('docente.subject-search',["disciplina" => $disciplina,"horario" => $horario, "presenca" => $presenca,"cadeira"=>$cadeira]);
    }

    public function searchMe(Request $request) {
        date_default_timezone_set("Africa/maputo");

        $cadeira = $request->cadeira;
        $year =  explode("-",$request->ano);
        $ano = $year[0]."/".$year[1]."/".$year[2];

        $disciplina = DB::select("SELECT tbl_disciplina.*,tbl_curso_disciplina.*,tbl_docente.* FROM tbl_disciplina,tbl_curso_disciplina,tbl_docente WHERE tbl_disciplina.codigo_disciplina = tbl_curso_disciplina.fk_tbl_disciplina_codigo_disciplina AND tbl_docente.codigo_docente = tbl_curso_disciplina.fk_codigo_docente AND tbl_curso_disciplina.codigo_curso_disciplina = ?", [base64_decode($cadeira)]); 

        $presenca = Aula::where("fk_codigo_curso_disciplina",base64_decode($cadeira))->orderBy("data_aula","desc")->where("data_aula",$ano)->get();

        // if(!$disciplina){
        //     return redirect()->back();
        // }

        return view('docente.me',compact("disciplina","presenca","cadeira"));
    }

    
}
