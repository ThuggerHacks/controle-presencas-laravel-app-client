@extends("layouts.layout")

@section("title","Home")

@section("content")

@include("_partials.navbar")

    <div class="container my-4">

        <div class="table-responsive">
            
            <table class="table table-hover table-bordered border-primary text-center">
                <thead>
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
                    <th scope="col">Data da justifica&ccedil;ao</th>
                    <th scope="col">Disciplina</th>
                    <th scope="col">Assunto</th>
                    <th scope="col">Remetente</th>
                  </tr>
                </thead>
                <tbody>
                    <tr data-bs-target="#message" data-bs-toggle="modal">
                        <th scope="row">10-10-2022</th>
                        <td>SIOP</td>
                        <td>
                            Justificar falta
                        </td>
                        <td>Braimo Selimane</td>
                    </tr>
                  <tr data-bs-target="#message" data-bs-toggle="modal">
                        <th scope="row">10-10-2022</th>
                        <td>SIOP</td>
                        <td>
                            Justificar falta
                        </td>
                        <td>Braimo Selimane</td>
                  </tr>
                  
                  <tr data-bs-target="#message" data-bs-toggle="modal">
                        <th scope="row">10-10-2022</th>
                        <td>SIOP</td>
                        <td>
                            Justificar falta
                        </td>
                        <td>Braimo Selimane</td>
                  </tr>
                  
                  <tr data-bs-target="#message" data-bs-toggle="modal">
                        <th scope="row">10-10-2022</th>
                        <td>SIOP</td>
                        <td>
                            Justificar falta
                        </td>
                        <td>Braimo Selimane</td>
                  </tr>

                  <tr data-bs-target="#message" data-bs-toggle="modal">
                    <th scope="row">10-10-2022</th>
                    <td>SIOP</td>
                    <td>
                        Justificar falta
                    </td>
                    <td>Braimo Selimane</td>
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

    </div>
   


    <!---------------------------------modal---------------------->

    <x-view-message-modal></x-view-message-modal>

@endsection