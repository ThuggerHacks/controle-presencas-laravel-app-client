@extends("layouts.layout")

@section("title","Home")

@section("content")

@include("_partials.navbar")


<div class="container my-5">
    <a href="{{ route("teacher.subject",["cadeira" => $cadeira])}}" class="mb-2" style="text-decoration: none;display:flex;align-items:flex-end;">
        <span class="fa fa-chevron-left" style="font-size: 14px;position:relative;top:0.5px"></span>
        {{-- <span class="fa fa-home" ></span> --}}
        <span style="font-size: 12px;position: relative;top:3px">&nbsp;Voltar</span>
    </a>

    @if (session("message"))
        <div class="alert alert-info text-center">{{ session("message")}}</div>
    @elseif(session("error"))
        <div class="alert alert-danger text-center">{{ session("error") }}</div>
    @endif
    <div class="card mb-5 my-3">
        <div class="card-header text-center bg-primary text-light">
            <strong>Nome da disciplina: </strong><span>
                @foreach ($disciplina as $linha)
                    {{$linha->nome_disciplina}}
                    @break
                @endforeach
            </span>
        </div>   
    </div>


    <div class="row my-3 mb-4">
        <div class="col-md-8"></div>
        <div class="col-md-4">
            <form action="{{ route("teacher.me.search") }}" method="post" class=" d-flex"  style="width:100%">
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
                  @foreach ($presenca as $presence)
                    @if ($presence->tema_aula)
                        <tr>
                            <th>{{ $presence->data_aula}}</th>
                                <td>{{ $presence->tema_aula}}</td>
                            <td>
                                <span class="fa fa-check"></span>
                            </td>
                            <td>
                                <button class="btn btn-light" >
                                    <span class="fa  fa-check"></span>
                                </button>
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
                                <button class="btn btn-light" data-bs-target="#feedback" data-bs-toggle="modal" onclick="sendFeedback({{$presence->codigo_aula}},{{base64_decode($cadeira)}})">
                                    <span class="fa fa-envelope"></span>
                                </button>
                            </td>
                        </tr> 
                    @endif
                  @endforeach
                  
                </tbody>
              </table>
        </div>
    </div>
</div>


<x-feedback-modal></x-feedback-modal>

<script>

    const sendFeedback = (id_aula,id_cadeira) => {

        if(id_aula){
            let feedback = document.querySelector("#sendfeed");
            let cadeira = document.querySelector("#idcadeira")
            feedback.value = id_aula;
            cadeira.value = id_cadeira;
        }
    }

</script>
        

@endsection