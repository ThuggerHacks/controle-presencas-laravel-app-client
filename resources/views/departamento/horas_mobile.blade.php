@extends("layouts.layout")

@section("title","Home")

@section("content")

@include("_partials.navbar")

    <div class="container my-4">

        <div class="table-responsive">
            <a href="{{ route("dep.mobile.presence",["id" => $id])}}" class="btn btn-primary mb-2">Voltar</a>
            <table class="table table-hover table-bordered border-primary">
                <thead>
                    
                <tr class="bg-primary text-light">
                    <th scope="col">Horas</th>
                </tr>
                </thead>
                <tbody>

                    @foreach ($data as $mark)
                    <tr>
                        <th> {{ $mark['hora'] }}</th>
                    </tr>
                    @endforeach
                </tbody>
                </table>
        </div>
    </div>

@endsection