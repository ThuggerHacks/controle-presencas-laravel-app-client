@extends("layouts.layout")

@section("title","Home")

@section("content")

@include("_partials.navbar")

    <div class="container my-4">

        <div class="table-responsive">
            
            <table class="table table-hover table-bordered border-primary text-center">
                <thead>
                    <tr class="bg-light" >
                        <th scope="col" colspan="4" class="text-center"> <h5 class="py-2 pb-2 text-secondary">SISTEMAS OPERATIVOS</h5></th>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <strong>Horas total: </strong> <span>50</span><br>
                            <strong>Nome de Docente: </strong> <span>Capachiua</span><br>
                            <strong>Email do Docente: </strong> <span>capachiua@gmail.com</span>
                            
                            <table class="table table-hover table-strpped ">
                                <thead>
                                    <tr class="bg-light">
                                        <th colspan="5" class="text-center text-secondary">Dias de aula</th>
                                    </tr>
                                    <tr>
                                        <th>Segunda</th>
                                        <th>Terca</th>
                                        <th>Quarta</th>
                                        <th>Quinta</th>
                                        <th>Sexta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2h</td>
                                        <td>#</td>
                                        <td>3h</td>
                                        <td>#</td>
                                        <td>#</td>
    
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <form>
                                <div class="container d-flex px-5 search" >
                                    <div class="input-group w-25 mb-2">
                                        <input type="search" name="" id="" class="form-control" placeholder="Pesquisar">
                                        <button class="input-group-text bg-primary btn border-end-0" id="basic-addon1">
                                            <i class="fa fa-search text-light"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                  <tr class="bg-primary text-light">
                    <th scope="col">Data</th>
                    <th scope="col">Topico</th>
                    <th scope="col">Presen&ccedil;a</th>
                  </tr>
                </thead>
                <tbody>
                    <tr >
                        <th scope="row">10-10-2022</th>
                        <td>Garbage colecotor</td>
                        <td>
                            <a class="btn btn-primary" href="/teacher/check">
                                <span>
                                    <i class="fa fa-pen"></i>
                                </span>
                                <span>Marcar</span>
                            </a>
                        </td>
                    </tr>
                  <tr >
                    <th scope="row">09-11-2022</th>
                    <td>Heap</td>
                    <td>
                        <a class="btn btn-primary" href="/teacher/check">
                            <span>
                                <i class="fa fa-pen"></i>
                            </span>
                            <span>Marcar</span>
                        </a>
                    </td>
                  </tr>
                  
                  <tr >
                    <th scope="row">10-10-2022</th>
                    <td>Gestao de Memoria</td>
                    <td>
                        <a class="btn btn-primary" href="/teacher/check">
                            <span>
                                <i class="fa fa-pen"></i>
                            </span>
                            <span>Marcar</span>
                        </a>
                    </td>
                  </tr>
                  
                  <tr >
                    <th scope="row">15-10-2022</th>
                    <td>Gestao de Memoria</td>
                    <td>
                        <a class="btn btn-primary" href="/teacher/check">
                            <span>
                                <i class="fa fa-pen"></i>
                            </span>
                            <span>Marcar</span>
                        </a>
                    </td>
                  </tr>

                  <tr >
                    <th scope="row">18-10-2022</th>
                    <td>Gestao de Memoria</td>
                    <td>
                        <a class="btn btn-primary" href="/teacher/check">
                            <span>
                                <i class="fa fa-pen"></i>
                            </span>
                            <span>Marcar</span>
                        </a>
                    </td>
                  </tr>
                </tbody>
              </table>
        </div>

        <a class="btn btn-primary" href="#">
            <span>
                <i class="fa fa-chevron-left"></i>
            </span>
            <span>Voltar</span>
        </a>

        <button class="btn btn-primary" data-bs-target="#topic" data-bs-toggle="modal">
            <span>
                <i class="fa fa-add"></i>
            </span>
            <span>Adicionar Topico</span>
        </button>

        <a class="btn btn-primary" href="/teacher/presence">
            <span>
                <i class="fa fa-book"></i>
            </span>
            <span>Minhas presen&ccedil;as</span>
        </a>

    </div>
   


    <!---------------------------------modal---------------------->

    <x-add-topic-modal></x-add-topic-modal>

@endsection