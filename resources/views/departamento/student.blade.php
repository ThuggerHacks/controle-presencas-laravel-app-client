@extends("layouts.layout")

@section("title","Home")

@section("content")

@include("_partials.navbar")


<div class="container my-5">
    <a href="{{ route("dep.subject",["cadeira" => $cadeira])}}" class="mb-2" style="text-decoration: none;display:flex;align-items:flex-end;">
        <span class="fa fa-chevron-left" style="font-size: 14px;position:relative;top:0.5px"></span>
        {{-- <span class="fa fa-home" ></span> --}}
        <span style="font-size: 12px;position: relative;top:3px">&nbsp;Voltar</span>
    </a>
    <div class="card mb-5 my-3">
        <div class="card-header text-center bg-primary text-light">
            <strong>Nome da disciplina: </strong><span>
                @foreach ($student as $students)
                    {{ $students->nome_disciplina }}
                    @break
                @endforeach
            </span>
        </div>
    </div>

    <div class="card">
       
        <div class="card-body table-responsive">
           
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Nome do estudante</th>
                    <th scope="col">Presente</th>
                    <th scope="col">Marcar</th>
                    <th>
                        <span class="fa fa-plus"></span>
                    </th>
                  </tr>
                </thead>
                <tbody>
                    
                    @foreach ($student as $students)
                        @php( $isChecked = 0)
                        @php( $isChecked2 = 0)
                        <tr>
                            <th>{{ $students->nome_estudante }}</th>
                            <td>
                                @foreach ($presenca as $linha)
                                    @if ($linha->fk_tbl_estudante_codigo_estudante == $students->fk_codigo_estudante)
                                        {{(misses($students->codigo_estudante,      $students->codigo_curso_disciplina))}}
                                        @php($isChecked = 1)
                                    @endif
                                @endforeach
                               
                                @if ($isChecked == 0)
                                    {{(misses($students->codigo_estudante,      $students->codigo_curso_disciplina))}}
                                @endif
                            </td>
                            <td>
                                @foreach ($presenca as $linha)
                                    @if ($linha->fk_tbl_estudante_codigo_estudante == $students->fk_codigo_estudante)
                                        <input type="checkbox" name="" id=""  checked onclick="addPresence({{ $students->fk_codigo_estudante}})">
                                        @php($isChecked2 = 1)
                                   @endif
                               @endforeach
                               @if ($isChecked2 == 0)
                                    <input type="checkbox" name="" id="" onclick="addPresence({{ $students->fk_codigo_estudante}})">
                               @endif
                            </td>
                            <td>
                                <input type="hidden" name="" value="{{ $codigoAula }}" id="codigo_aula">
                                
                                <button class="btn btn-light" data-bs-target="#studentinfo" data-bs-toggle="modal" >
                                    <span class="fa fa-info-circle" onclick="studentInfo('{{$students->fk_codigo_estudante}}','{{$students->nome_estudante}}','{{$students->email_estudante}}')"></span>
                                </button>
                            </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>

<x-student-info-modal></x-student-info-modal>

<script>
    //presence add
     let checked = true;

    const addPresence = async(id) => {
       let check = document.querySelector("#check"+id);
       let codigoAula = document.querySelector("#codigo_aula");


        const data = await axios.post("/dep/addpresence",{codigoAula:codigoAula.value,codigoEstudante:id});

        if(data){
            if(data.data.msg){
                if(checked){
                    check.classList.remove("fa-xmark");
                    check.classList.add("fa-check");
                    checked = false;
               
                }else{
                    check.classList.remove("fa-check");
                    check.classList.add("fa-xmark");
                    checked = true;
                }
            }else{
                toast("Houve um erro","error")
            }
        }else{
            toast("Houve um erro","error")
        }
       
      
    }    
    
    //student info

    const studentInfo = (...data) => {

       let name = document.querySelector("#namex");
       let email = document.querySelector("#emailx");
       let code = document.querySelector("#codex");
    

      setTimeout(() => {
        name.textContent  = data[1];
        email.textContent  = data[2];
        code.textContent = data[0];
      },500)
       
       
    }


const dismiss = () => {
    let name = document.querySelector("#namex");
    let email = document.querySelector("#emailx");
    let code = document.querySelector("#codex");

   setTimeout(() => {
        name.textContent = "carregando...";
        email.textContent = "carregando...";
        code.textContent = "carregando...";
   }, 500);

}
</script>        

@endsection