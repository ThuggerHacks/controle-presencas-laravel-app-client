@extends("layouts.layout")

@section("title","Presenca")

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
                <th scope="col">Nome do estudante</th>
                <th scope="col">Presente</th>
                <th scope="col">Marcar</th>
                <th scope="col">Mais</th>
              </tr>
            </thead>
            <tbody>
              <tr >
                <td>Belcio Armando</td>
                <td>
                    <i class="fa fa-check"></i>
                </td>
                <td class="text-center">
                    <input type="checkbox" name="" id="" class="form-check-input" checked>
                </td>
                <td class="text-center">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#studentinfo" >
                        <span>
                            <i class="fa fa-add"></i>
                        </span>
                        <span>Informa&ccedil;&atilde;o</span>
                    </button>
                </td>
              </tr>
              <tr >
                <td>Braimo Selimane</td>
                <td>
                    <i class="fa fa-times"></i>
                </td>
                <td class="text-center">
                    <input type="checkbox" name="" id="" class="form-check-input">
                </td>
                <td class="text-center">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#studentinfo" >
                        <span>
                            <i class="fa fa-add"></i>
                        </span>
                        <span>Informa&ccedil;&atilde;o</span>
                    </button>
                </td>
              </tr>
              <tr >
                <td>Renato Meque</td>
                <td>
                    <i class="fa fa-check"></i>
                </td>
                <td class="text-center">
                    <input type="checkbox" name="" id="" class="form-check-input" checked>
                </td>
                <td class="text-center">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#studentinfo" >
                        <span>
                            <i class="fa fa-add"></i>
                        </span>
                        <span>Informa&ccedil;&atilde;o</span>
                    </button>
                </td>
              </tr>
              
              <tr  >
                <td>Keven Jose</td>
                <td>
                    <i class="fa fa-times"></i>
                </td>
                <td class="text-center">
                    <input type="checkbox" name="" id="" class="form-check-input" >
                </td>
                <td class="text-center">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#studentinfo" >
                        <span>
                            <i class="fa fa-add"></i>
                        </span>
                        <span>Informa&ccedil;&atilde;o</span>
                    </button>
                </td>
              </tr>

              <tr >
                <td>Kelven Bulha</td>
                <td>
                    <i class="fa fa-check"></i>
                </td>
                <td class="text-center">
                    <input type="checkbox" name="" id="" class="form-check-input" checked>
                </td>
                <td class="text-center">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#studentinfo" >
                        <span>
                            <i class="fa fa-add"></i>
                        </span>
                        <span>Informa&ccedil;&atilde;o</span>
                    </button>
                </td>
              </tr>
            </tbody>
          </table>
          <a class="btn btn-primary" href="#">
            <span>
                <i class="fa fa-chevron-left"></i>
            </span>
            <span>Voltar</span>
        </a>
    </div>
    
</div>
    <x-student-info-modal></x-student-info-modal>

@endsection