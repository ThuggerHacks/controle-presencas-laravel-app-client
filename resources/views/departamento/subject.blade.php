@extends("layouts.layout")

@section("title","Home")

@section("content")

@include("_partials.navbar")

    <div class="container my-4">

        <div class="table-responsive">
            <table class="table table-hover table-bordered border-primary">
                <thead>
                    <tr class="bg-light" >
                        <th scope="col" colspan="4" class="text-center"> <h5 class="py-2 pb-2 text-secondary">SISTEMAS OPERATIVOS</h5></th>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <strong>Horas total: </strong> <span>50</span><br>
                            <strong>Nome de Docente: </strong> <span>Capachiua</span><br>
                            <strong>Email do Docente: </strong> <span>capachiua@gmail.com</span>
                            
                            <table class="table table-hover table-strpped">
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
                    <th scope="col">Presente</th>
                    <th scope="col">Marcar</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">10-10-2022</th>
                    <td>Garbage colecotor</td>
                    <td>
                        <i class="fa fa-check"></i>
                    </td>
                    <td class="text-center">
                        <input type="checkbox" name="" id="" class="form-check-input" checked>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">09-11-2022</th>
                    <td>Heap</td>
                    <td>
                        <i class="fa fa-times"></i>
                    </td>
                    <td class="text-center">
                        <input type="checkbox" name="" id="" class="form-check-input">
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">10-10-2022</th>
                    <td>Gestao de Memoria</td>
                    <td>
                        <i class="fa fa-check"></i>
                    </td>
                    <td class="text-center">
                        <input type="checkbox" name="" id="" class="form-check-input" checked>
                    </td>
                  </tr>
                  
                  <tr>
                    <th scope="row">15-10-2022</th>
                    <td>Gestao de Memoria</td>
                    <td>
                        <i class="fa fa-check"></i>
                    </td>
                    <td class="text-center">
                        <input type="checkbox" name="" id="" class="form-check-input" checked>
                    </td>
                  </tr>

                  <tr>
                    <th scope="row">18-10-2022</th>
                    <td>Gestao de Memoria</td>
                    <td>
                        <i class="fa fa-check"></i>
                    </td>
                    <td class="text-center">
                        <input type="checkbox" name="" id="" class="form-check-input" checked>
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

        <button class="btn btn-primary" data-bs-target="#timetable" data-bs-toggle="modal">
            <span>
                <i class="fa fa-table"></i>
            </span>
            <span>Alterar Horario</span>
        </button>
    </div>
   


    <!---------------------------------modal---------------------->

    <x-time-table-modal></x-time-table-modal>

@endsection