@extends("layouts.layout")

@section("title","Home")

@section("content")

@include("_partials.navbar")


<div class="container my-5">
    <a href="{{ route("dep.home")}}" class="mb-2" style="text-decoration: none;display:flex;align-items:flex-end;">
        <span class="fa fa-chevron-left" style="font-size: 14px;position:relative;top:0.5px"></span>
        {{-- <span class="fa fa-home" ></span> --}}
        <span style="font-size: 12px;position: relative;top:3px">&nbsp;Voltar</span>
    </a>
    @foreach ($disciplina as $disc)
        <div class="card mb-5 my-3">
            <div class="card-header text-center bg-primary text-light">
                <strong>Nome da disciplina: </strong>
                <span>{{ $disc->nome_disciplina}}</span>
            </div>
            <div class="card-body" >
                <div id="home">
                    <div class="col-md-12 row">
                        <div  class="col-md-4">
                            <strong>Nome do docente: </strong> <span>{{ $disc->nome_docente }}</span>
                        </div>
                        <div  class="col-md-4">
                            <strong>Email do docente: </strong> <span>{{ $disc->email_docente }}</span>
                        </div>
                        <div class="col-md-4 pb-2">
                            <strong>N&uacute;mero de horas da disciplina: </strong> <span>{{ $disc->hora_total_disciplina}}h</span>
                        </div>
                    </div>
                    <div class="row col-md-12 py-2" style="border-top:1px solid #ebebeb;border-bottom:1px solid #ebebeb;">
                        @foreach ($horario as $time)
                      
                            <div class="col-md-2">
                              @switch($time->dia_semana)
                                    @case(1)
                                        <strong>Segunda-feira: </strong><br> <span>{{ $time->inicio }} - {{ $time->termino}}</span>
                                    @break
                                    @case(2)
                                        <strong>Ter&ccedil;a-feira: </strong><br> <span>{{ $time->inicio }} - {{ $time->termino}}</span>
                                    @break
                                    @case(3)
                                        <strong>Quarta-feira: </strong><br> <span>{{ $time->inicio }} - {{ $time->termino}}</span>
                                    @break
                                    @case(4)
                                        <strong>Quinta-feira: </strong><br> <span>{{ $time->inicio }} - {{ $time->termino}}</span>
                                    @break
                                    @case(5)
                                        <strong>Sexta-feira: </strong> <br><span>{{ $time->inicio }} - {{ $time->termino}}</span>
                                    @break
                                  @default
                                    <strong>#: </strong> 
                                      
                              @endswitch

                            </div>
                        @endforeach
                    </div>
                </div>
                <!--------------timetable---->
                <button class="btn btn-primary my-2 text-light ml-2 mr-2" data-bs-target="#timetable" data-bs-toggle="modal">
                    <span class="fa fa-table"></span>
                    <span>Alterar Horario</span>
                </button>
                
            </div>
            
        </div>
        @break
    @endforeach

    <div class="row my-3 mb-4">
        <div class="col-md-8"></div>
        <div class="col-md-4">
            <form action="{{ route("dep.subject.search") }}" method="post" class=" d-flex"  style="width:100%">
                @csrf
                <input type="date" name="ano" id="" class="form-control " placeholder="Pesquisar" min="2009/12/31">
                &nbsp;<button class="btn btn-primary ml-2">
                <input type="hidden" name="cadeira" value="{{ $cadeira }}">
                <span class="fa fa-search"></span>
                </button>
            </form>
        </div>
    </div>
    <div class="card">
       
        <div class="card-body table-responsive">
           
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Topico</th>
                    <th scope="col">Presente</th>
                    <th scope="col">Marcar</th>
                    <th>
                        <span class="fa fa-plus"></span>
                    </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($presenca as $presence)
                        @if ($presence->tema_aula)
                            <tr>
                                <th>{{ $presence->data_aula}}</th>
                                    <td>{{ $presence->tema_aula}}</td>
                                <td>
                                    <span class="fa fa-check"></span>
                                </td>
                               
                                <td>
                                    <input type="checkbox" name="" id="" checked disabled>
                                </td>
                                <td>
                                    @if($presence->tema_aula != "Aula justificada")
                                        <a href="{{ route("dep.student",["id_aula" => base64_encode($presence->codigo_aula),"id_disciplina" => base64_encode($presence->fk_codigo_curso_disciplina)])}}" class="btn btn-light">
                                            <span class="fa fa-plus"></span>
                                        </a>
                                    
                                    @else
                                        <a class="btn btn-light">#</a>
                                    @endif
                                </td>
                            </tr>

                        @else
                            <tr>
                                <th>{{ $presence->data_aula}}</th>
                                    <td>---</td>
                                <td>
                                    <span class="fa fa-times"></span>
                                </td>
                               
                                <td>
                                    <input type="checkbox" name="" id="" onclick="addPresence('{{$presence->codigo_aula}}')">
                                </td>
                                <td>
                                    <a class="btn btn-light">#</a>
                                </td>
                            </tr> 
                        @endif
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>

<x-time-table-modal :cadeira="$cadeira"></x-time-table-modal>

<script>

    const addPresence = async(id) => {
        if(id){
            const cnf = confirm("Continuar ?");

            if(cnf){
                const explain = await axios.post("/explain",{id});

                if(explain.data){
                    if(explain.data.error){
                        alert(explain.data.error);
                    }else{
                        window.open(window.location.href,"_self");
                    }
                }else{  
                    alert("Houve um erro");
                }
            }
        }
    }

</script>

        

@endsection 