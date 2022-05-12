@extends("layouts.layout")

@section("title","Home")

@section("content")

@include("_partials.navbar")


<div class="container my-5">
    <a href="{{ route("student.home") }}" class="mb-2" style="text-decoration: none;display:flex;align-items:flex-end;">
        <span class="fa fa-chevron-left" style="font-size: 14px;position:relative;top:0.5px"></span>
        {{-- <span class="fa fa-home" ></span> --}}
        <span style="font-size: 12px;position: relative;top:3px">&nbsp;Voltar</span>
    </a>


    @if (session("message"))
        <div class="alert alert-info text-center">{{ session("message") }}</div>
    @elseif(session("error"))
        <div class="alert alert-danger text-center">{{session("error")}} </div>
    @endif
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
                    <div class="row col-md-12 py-2" style="border-top:1px solid #ebebeb;">
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
                
                
            </div>
        
        </div>
        @break
    @endforeach

    


   
    <div class="row my-3 mb-4">
        <div class="col-md-8"></div>
        <div class="col-md-4">
            <form action="{{ route("student.subject.search") }}" method="post" class=" d-flex"  style="width:100%">
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
                    <th>Topico</th>
                    <th scope="col">Presente</th>
                    <th>
                        <span class="fa fa-plus"></span>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  
                  @foreach ($aula as $lessons)
                    @if ($lessons->tema_aula != "Aula justificada")
                        <tr>
                            <th>{{ $lessons->data_aula }}</th>
                            <td>{{ $lessons->tema_aula }}</td>
                            <td>
                            @if (isAbsent(session("student")->codigo_estudante,$lessons->codigo_aula) && $lessons->data_aula )
                                    <span class="fa fa-times"></span>
                                @else
                                    <span class="fa fa-check"></span>
                            @endif
                            </td>
                            <td>
                                @if (isAbsent(session("student")->codigo_estudante,$lessons->codigo_aula))
                                    <button class="btn btn-light" data-bs-target="#feedback" data-bs-toggle="modal" onclick="openSendMailModal('{{ $lessons->codigo_aula }}')">
                                        <span class="fa fa-envelope"></span>
                                    </button>
                                @else
                                    <button class="btn btn-light"  >
                                        <span class="fa fa-check"></span>
                                    </button>
                                @endif
                            
                            </td>
                        </tr>
                    @endif
                  @endforeach
                  <tr>
                      <th colspan="1">Participa&ccedil;&atilde;o</th>
                      <th colspan="3" class="text-end mr-3">
                            {{(misses(session("student")->codigo_estudante,      $lessons->fk_codigo_curso_disciplina))}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      </th>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>
</div>


<x-student-feed-back-modal></x-student-feed-back-modal>

<script>
    const openSendMailModal = (idAula) => {
        let aula = document.querySelector("#idaula");
        aula.value = idAula;
    }    
</script>        

@endsection