@extends("layouts.layout")

@section("title","Home")

@section("content")

@include("_partials.navbar")

    <div class="container my-4">

        <div class="table-responsive">
            <table class="table table-hover table-bordered border-primary">
                <thead>
                    <tr class="bg-light" >
                        <th scope="col" colspan="3" class="text-center"> <h5 class="py-2 pb-2 text-secondary">SISTEMAS OPERATIVOS</h5></th>
                    </tr>
                    
                    <tr>
                        <td colspan="3">
                            <strong>Topico: </strong> <span>Gestao de processos</span><br>
                            <strong>Data: </strong> <span>20-10-2022</span>
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
                    <th scope="col">Nome do estudante</th>
                    <th scope="col">Presente</th>
                    <th scope="col">Marcar</th>
                  </tr>
                </thead>
                <tbody>
                  <tr data-bs-target="#studentinfo" data-bs-toggle="modal">
                    <td>Belcio Armando</td>
                    <td>
                        <i class="fa fa-check"></i>
                    </td>
                    <td class="text-center">
                        <input type="checkbox" name="" id="" class="form-check-input" checked>
                    </td>
                  </tr>
                  <tr data-bs-target="#studentinfo" data-bs-toggle="modal">
                    <td>Braimo Selimane</td>
                    <td>
                        <i class="fa fa-times"></i>
                    </td>
                    <td class="text-center">
                        <input type="checkbox" name="" id="" class="form-check-input">
                    </td>
                  </tr>
                  <tr data-bs-target="#studentinfo" data-bs-toggle="modal">
                    <td>Renato Meque</td>
                    <td>
                        <i class="fa fa-check"></i>
                    </td>
                    <td class="text-center">
                        <input type="checkbox" name="" id="" class="form-check-input" checked>
                    </td>
                  </tr>
                  
                  <tr  data-bs-target="#studentinfo" data-bs-toggle="modal">
                    <td>Keven Jose</td>
                    <td>
                        <i class="fa fa-times"></i>
                    </td>
                    <td class="text-center">
                        <input type="checkbox" name="" id="" class="form-check-input" >
                    </td>
                  </tr>

                  <tr data-bs-target="#studentinfo" data-bs-toggle="modal">
                    <td>Kelven Bulha</td>
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

    </div>

    <!----------------------------modal--------------------->

    <x-student-info-modal></x-student-info-modal>

@endsection