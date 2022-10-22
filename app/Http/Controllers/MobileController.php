<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Docente;

use Illuminate\Support\Facades\DB;

class MobileController extends Controller{

    public function mobilePresence(Request $request, $id = 0){
        
        $docente = Docente::where("codigo_docente",base64_decode($id))->first();
        if(!$docente){
            return redirect()->back();
        }
        return view("mobile.departamento.presence_mobile",["data" => $this->mostrarPresencas($id),"id" => $id,"docente" => $docente]);
    }

    public function mobileTimer(Request $request,$id = 0,$user_id = 0){

        $timer = Timer::where("id_presenca",base64_decode($id))->get();

        return view("mobile.departamento.horas_mobile",["data" => $timer,"id" => $user_id]);
    }

    public function mobileView(Request $request){

        $docente = Docente::paginate(10);

        return view("mobile.departamento.mobile",["data" => $docente]);
    }

    public function mobileSearch(Request $request,$id = 0){

        $docente = Docente::where("nome_docente",'LIKE','%'.$request->name.' %')->get();

        if(isset($request->date) && $id != 0){
            $presenca = PresencaFuncionario::where("data_presenca",'LIKE',$request->date.'%')->where("codigo_funcionario",base64_decode($id))->get();

        return redirect()->route("dep.mobile.presence",["id" => $id])->with("data" ,$presenca);

        }

        return redirect()->route("dep.mobile.view")->with("data" ,$docente);
    }

    public function mobileFingerPrint(Request $request, $id = 0){
        $user = Docente::where("codigo_docente",base64_decode($id))->first();

        if(!$user){
            return redirect()->back()->with("error","Houve um erro");
        }

        $user->where("codigo_docente",base64_decode($id))->update(["reset_fingerprint" => 1]);

        return redirect()->back()->with("success","Impressão digital registado com sucesso");
    }
}