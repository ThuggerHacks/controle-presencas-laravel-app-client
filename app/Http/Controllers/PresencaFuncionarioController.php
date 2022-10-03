<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PresencaFuncionario;
use App\Models\Timer;
use App\Models\Docente;

class PresencaFuncionarioController extends Controller
{
    public function index(Request $request,$id = 0){

        $getPresence = PresencaFuncionario::where("codigo_funcionario",$id)->paginate(10);

        return $getPresence;


    }

    public function sign(Request $request) {
        date_default_timezone_set("africa/maputo");

        $user = $request->id;

        $presence = PresencaFuncionario::where("codigo_funcionario",$user)->where("data_presenca",'LIKE',date("Y-m-d").' %')->orWhere("data_presenca",'LIKE',$request->date."%")->first();
 
        if(!$presence){
            PresencaFuncionario::create([
                "codigo_funcionario" => $user,
                "entrada" => $request->entrada != null ?$request->entrada:date("H:i:s"),
                "saida" => $request->saida!=null?$request->saida:null
            ]);
        }else if($presence->saida == null){
            $presence->update(["saida" => $request->saida!=null?$request->saida:null]);
        }else{
            return response()->json(["success" => "Ja assinou 2 vezes hoje!"]);
        }
  
        return response()->json(["success" => "Assinado!"]);

    }

    public function search(Request $request){

        date_default_timezone_set("africa/maputo");

        $user = $request->id;

        $presence = PresencaFuncionario::where("codigo_funcionario",$user)->where("data_presenca",'LIKE',$request->date.' %')->limit(1)->get();

        return response()->json(["data" => $presence]);

    }

    public function updateWorkTime(Request $request,$id = 0){

        date_default_timezone_set("africa/maputo");

        $worker = PresencaFuncionario::where("data_presenca","LIKE",'%'.date("Y-m-d").'%')->where("codigo_funcionario",$id)->first();

        if(!$worker){
            return response()->json(["error" => "Houve um erro"]);
        }

      if($worker->saida == null && $worker->entrada != null){
        $time = $request->time == null ? date("H:i:s"):$request->time;

            $timer = Timer::where("id_presenca",$worker->codigo_presenca)->where("hora",$time)->get();

            if(count($timer) == 0){
                Timer::create([
                    "hora" => $time,
                    "id_presenca" => $worker->codigo_presenca
                ]);
                return response()->json(["success" => "Atualizado com sucesso"]);
            }
        
            return null;
      }

      return null;

    }

    public function setFingerPrint(Request $request,$id = 0) {

        $user = Docente::where("codigo_docente",$id)->first();

        if(!$user){
            return response()->json(["error" => "Houve um erro"]);
        }

        $checkFingerPrint = Docente::where("docente_fingerprint",$request->fingerprint)->where("codigo_docente","<>",$id)->first();

        if($checkFingerPrint){
            return response()->json(["error" => "Impressão digital invalida"]);
        }

        $user->where("codigo_docente",$id)->update(["docente_fingerprint" => $request->fingerprint]);

        return response()->json(["success" => "Impressão digital registado com sucesso"]);

    }

    public function resetFingerPrint(Request $request, $id = 0){
        $user = Docente::where("codigo_docente",$id)->first();

        if(!$user){
            return response()->json(["error" => "Houve um erro"]);
        }

        $user->where("codigo_docente",$id)->update(["reset_fingerprint" => $request->num]);

        return response()->json(["success" => "Impressão digital registado com sucesso"]);
    }
}
