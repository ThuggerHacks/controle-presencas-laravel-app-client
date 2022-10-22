@extends("layouts.layout")

@section("title","Home")

@section("content")

@include("_partials.navbar")

    <div class="d-flex align-items-center justify-content-center">

        <form  action="{{ route("student.subject.post") }}" method="post">
            @csrf
            <div class="content-uz">
                <div class="card p-4 d-flex align-items-center" style="width: 600px">

                    <div class="input-group w-100 mb-2">

                        <span class="input-group-text bg-transparent border-end-0" id="basic-addon1">
                            <i class="fa fa-book"></i>
                        </span>
                        <select class="form-select border-start-0" name="curso" id="curso" onchange="selectCourse(this.value)">
                            @foreach ($curso as $cursos)
                                <option value="{{ $cursos['codigo_curso']}}">{{ $cursos["nome_curso"] }}</option>
                            @endforeach
                        </select>
                       

                    </div>

                    <div class="input-group w-100 mb-2">

                        <span class="input-group-text bg-transparent border-end-0" id="basic-addon1">
                            <i class="fa fa-book"></i>
                        </span>
                        <select class="form-select border-start-0"  name="cadeira" id="chairs">
                            <option  value="" selected>Selecionar cadeira</option>
                            @foreach ($disciplina as $subject)
                                <option value="{{ $subject->codigo_curso_disciplina }}">{{ $subject->nome_disciplina }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn btn-primary w-100">
                        <span>
                            <i class="fa fa-search"></i>
                        </span>
                        <span>
                            Procurar
                        </span>
                    </button>
                </div>
            </div>
        </form>
    </div>
   

@endsection