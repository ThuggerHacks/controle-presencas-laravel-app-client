<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\depSearchValidator;
use App\Http\Requests\TimeValidator;

use App\Models\UsuarioDepartamento;
use App\Models\PresencaFuncionario;
use App\Models\Docente;
use App\Models\Timer;
use App\Models\Curso;
use App\Models\Disciplina;
use App\Models\Horario;
use App\Models\DisciplinaHorario;
use App\Models\Aula;
use App\Models\Presence;

use Illuminate\Support\Facades\DB;

class DepartamentoController extends Controller
{

    private $ano;

    private function mostrarPresencas($id){

        $presenca = PresencaFuncionario::where("codigo_funcionario",base64_decode($id))->orderBy("data_presenca","asc")->paginate(10);

        return $presenca;
    }

    public function index() {
        
        $cursos = Curso::where("fk_tbl_departamento_codigo_departamento",session("dep")->fk_tbl_departamento_codigo_departamento)->get();

        return view('departamento.home',["curso" => $cursos]);
    }

    public function loginView() {
        return view('departamento.login');
    }

    public function subject($cadeira = 0,$ano = 0){
        date_default_timezone_set("Africa/maputo");

        $disciplina = DB::select("SELECT tbl_disciplina.*,tbl_curso_disciplina.*,tbl_docente.* FROM tbl_disciplina,tbl_curso_disciplina,tbl_docente WHERE tbl_disciplina.codigo_disciplina = tbl_curso_disciplina.fk_tbl_disciplina_codigo_disciplina AND tbl_docente.codigo_docente = tbl_curso_disciplina.fk_codigo_docente AND tbl_curso_disciplina.codigo_curso_disciplina = ?", [base64_decode($cadeira)]);
        
        $horario  = DB::select("SELECT tbl_horario.*,tbl_curso_disciplina.*,tbl_disciplina_horario.* FROM tbl_horario,tbl_curso_disciplina,tbl_disciplina_horario WHERE tbl_disciplina_horario.fk_codigo_curso_disciplina = tbl_curso_disciplina.codigo_curso_disciplina AND tbl_horario.codigo_ = tbl_disciplina_horario.fk_tbl_horario_codigo_ AND tbl_curso_disciplina.codigo_curso_disciplina = ?",[base64_decode($cadeira)]);

        $presenca = Aula::where("fk_codigo_curso_disciplina",base64_decode($cadeira))->where("data_aula","LIKE",base64_decode($ano)."%")->orderBy("data_aula","desc")->get();


        return view('departamento.subject',["disciplina" => $disciplina,"horario" => $horario, "presenca" => $presenca,"cadeira" => $cadeira]);
    }


    public function login(Request $request){

        $user = UsuarioDepartamento::where("email_usuario_departamento",$request->email)
                                    ->where("senha_usuario_departamento",md5($request->password))->first();

        if(!$user){
            return redirect()->route("dep.login.view")->with("message","Dados incorrectos");
        }

        $request->session()->put("user",$user);

        return redirect()->route("dep.mobile.view");
    }

    public function subjectByCourse($id = 0){
        $subjects = DB::select("SELECT tbl_disciplina.*,tbl_curso.*,tbl_curso_disciplina.* FROM tbl_disciplina,tbl_curso,tbl_curso_disciplina WHERE tbl_disciplina.codigo_disciplina=tbl_curso_disciplina.fk_tbl_disciplina_codigo_disciplina AND tbl_curso.codigo_curso=tbl_curso_disciplina.fk_tbl_curso_codigo_curso AND tbl_curso.codigo_curso=?",[$id]);

        return $subjects;
    }

    public function searchTeacherSubject(depSearchValidator $request){
        $ano = $request->ano;
        $curso = $request->curso;
        $cadeira = $request->cadeira;
        
        return redirect()->route("dep.subject",["cadeira" => urlencode(base64_encode($cadeira)),"ano" => base64_encode($ano)]);
      
    }

    public function addTimeTable(TimeValidator $request){
            // echo json_decode($id)[0]->dia;

            
            $cadeira = $request->cadeira;

            $timetable = json_decode($request->array);

            $check = DisciplinaHorario::where("fk_codigo_curso_disciplina",base64_decode($cadeira))->first();

    
            if($check){
                //delete all previous data
                $check->where("fk_codigo_curso_disciplina",base64_decode($cadeira))->delete();
                $horario = Horario::where("fk_codigo_curso_disciplina",base64_decode($cadeira))->get();
                foreach($horario as $linha){
                    Horario::where("fk_codigo_curso_disciplina",base64_decode($cadeira))->delete();
                }
            }
        
            for($i = 0; $i < count($timetable); $i++){

                $id = rand(11111,99999);
                Horario::create([
                    "inicio" => $timetable[$i]->inicio,
                    "termino" => $timetable[$i]->fim,
                    "dia_semana" => $timetable[$i]->dia,
                    "codigo_" => $id,
                    "fk_codigo_curso_disciplina" => base64_decode($cadeira)
                ]);
                DisciplinaHorario::create([
                    "fk_tbl_horario_codigo_" => $id,
                    "fk_codigo_curso_disciplina" => base64_decode($cadeira)
                ]);
            }

            
            
    }

    public function addPresence(Request $request){

        $id = $request->id;
        $aula = Aula::where("codigo_aula",$id)->first();

        if($aula){
            $aula->where("codigo_aula",$id)->update(["tema_aula" => "Aula justificada"]);
            return response()->json(["success" => "Justificada"]);
        }else{
            return response()->json(["error" => "Houve um erro"]);
        }
    }

    public function check($idDisciplina = 0, $idAula = 0){
        date_default_timezone_set("Africa/maputo");

        $student = DB::select("SELECT tbl_estudante.*,tbl_disciplina.*,tbl_disciplina_estudante.*,tbl_curso_disciplina.* FROM tbl_estudante,tbl_disciplina,tbl_disciplina_estudante,tbl_curso_disciplina WHERE tbl_estudante.codigo_estudante = tbl_disciplina_estudante.fk_codigo_estudante AND tbl_disciplina_estudante.fk_codigo_curso_disciplina = tbl_curso_disciplina.codigo_curso_disciplina AND tbl_disciplina.codigo_disciplina = tbl_curso_disciplina.fk_tbl_disciplina_codigo_disciplina  AND tbl_curso_disciplina.codigo_curso_disciplina = ?", [base64_decode($idDisciplina)]);

        $presenca = DB::select("SELECT * FROM tbl_presenca WHERE fk_tbl_aula_codigo_aula = ?",  [base64_decode($idAula)]);

        return view('departamento.student',["student" => $student,"presenca" => $presenca,"codigoAula" => $idAula,"cadeira" => $idDisciplina]);
    }
    

    public function addPresenceStudent(Request $request){
        
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

    public function subjectSearch(Request $request) {

        $cadeira = $request->cadeira;
        $year =  explode("-",$request->ano);
        $ano = $year[0]."/".$year[1]."/".$year[2];

        date_default_timezone_set("Africa/maputo");

        $disciplina = DB::select("SELECT tbl_disciplina.*,tbl_curso_disciplina.*,tbl_docente.* FROM tbl_disciplina,tbl_curso_disciplina,tbl_docente WHERE tbl_disciplina.codigo_disciplina = tbl_curso_disciplina.fk_tbl_disciplina_codigo_disciplina AND tbl_docente.codigo_docente = tbl_curso_disciplina.fk_codigo_docente AND tbl_curso_disciplina.codigo_curso_disciplina = ?", [base64_decode($cadeira)]);
        
        $horario  = DB::select("SELECT tbl_horario.*,tbl_curso_disciplina.*,tbl_disciplina_horario.* FROM tbl_horario,tbl_curso_disciplina,tbl_disciplina_horario WHERE tbl_disciplina_horario.fk_codigo_curso_disciplina = tbl_curso_disciplina.codigo_curso_disciplina AND tbl_horario.codigo_ = tbl_disciplina_horario.fk_tbl_horario_codigo_ AND tbl_curso_disciplina.codigo_curso_disciplina = ?",[base64_decode($cadeira)]);

        $presenca = Aula::where("fk_codigo_curso_disciplina",base64_decode($cadeira))->where("data_aula",$ano)->orderBy("data_aula","desc")->get();


        return view('departamento.search-subject',["disciplina" => $disciplina,"horario" => $horario, "presenca" => $presenca,"cadeira" => $cadeira]);
    }

}