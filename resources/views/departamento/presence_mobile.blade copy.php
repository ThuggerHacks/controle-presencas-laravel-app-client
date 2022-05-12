@extends("layouts.layout")

@section("title","Home")

@section("content")

@include("_partials.navbar")

    <div class="container my-4">

        <div class="table-responsive">
            <a href="{{ route("dep.mobile.view")}}" class="btn btn-primary mb-2">Voltar</a>
            <table class="table table-hover table-bordered border-primary">
                <thead>
                    <tr>
                        <td colspan="5">
                            <form method="POST" action={{ route("dep.mobile.search",["id" => $id]) }}>
                                @csrf
                                <div class="container d-flex px-5 search" >
                                    <div class="input-group w-25 mb-2">
                                        <input type="date" name="date" id="" class="form-control" placeholder="Pesquisar">
                                        <button class="input-group-text bg-primary btn border-end-0" id="basic-addon1">
                                            <i class="fa fa-search text-light"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                <tr class="bg-primary text-light">
                    <th scope="col">Nome do funcionario</th>
                    <th scope="col">Entrada</th>
                    <th>Saida</th>
                    <th>Data</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>

                    @if (session("data"))
                        @foreach (session("data") as $mark)
                        <tr>
                            <th scope="row" >{{ getNome($mark['codigo_funcionario']) }}</th>
                            <th> {{ $mark['entrada'] }}</th>
                            <th>
                                {{ $mark['saida']}}
                            </th>
                            <th>{{ $mark['data_presenca']}}</th>
                            <th>
                                <a href="" class="btn btn-primary">Horas</a>
                            </th>
                        </tr>
                        @endforeach
                    @else
                        @foreach ($data as $mark)
                        <tr>
                            <th scope="row" >{{ getNome($mark['codigo_funcionario']) }}</th>
                            <th> {{ $mark['entrada'] }}</th>
                            <th>
                                {{ $mark['saida']}}
                            </th>
                            <th>{{ $mark['data_presenca']}}</th>
                            <th>
                                <a href="" class="btn btn-primary">Horas</a>
                            </th>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
                </table>
                @if($data['next_page_url'])
                    <a class="btn btn-primary" href={{ $data['next_page_url'] }}>Proximo</a>
                @endif
                @if($data['prev_page_url'])
                    <a class="btn btn-primary" href={{ $data['prev_page_url'] }}>Proximo</a>
                @endif
        </div>
    </div>
   


    <!---------------------------------modal---------------------->

    <x-time-table-modal></x-time-table-modal>

@endsection