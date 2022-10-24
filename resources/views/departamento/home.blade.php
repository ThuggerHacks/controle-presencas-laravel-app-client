@extends("layouts.layout")

@section("title","Home")

@section("content")

@include("_partials.navbar")

    <div class="d-flex align-items-center justify-content-center">

        @if (session("error"))
            <div class="alert alert-danger text-center my-2">{{ session("error") }}</div>
        @elseif(session("success"))
            <div class="alert alert-success text-center my-2">{{ session("success") }}</div>
        @endif
        <form action="{{ route("search.dep.all")}}" method="post">
            @csrf
            <div class="content-uz">
                <div class="card p-4 d-flex align-items-center" style="width: 600px">
                    @if ($errors->any())
                        <small class="alert alert-danger text-center" style="width:100%"> {{ $errors->all()[0]  }}</small>
                    @endif
                    <div class="input-group w-100 mb-2">

                        <span class="input-group-text bg-transparent border-end-0" id="basic-addon1">
                            <i class="fa fa-clock"></i>
                        </span>
                        <select  name="ano" class="form-select border-start-0"  id="form">
                            <option value="" selected>Selecionar ano</option>
                            @for ($i = date("Y"); $i >= 2009 ; $i--)
                                <option value="{{$i}}">{{ $i }}</option>
                            @endfor
                        
                        </select>
                       

                    </div>

                    <div class="input-group w-100 mb-2">

                        <span class="input-group-text bg-transparent border-end-0" id="basic-addon1">
                            <i class="fa fa-graduation-cap"></i>
                        </span>
                        <select class="form-select border-start-0" name="curso" id="form" onchange="selectCourse(this.value)">
                            <option  value="" selected>Selecionar curso</option>
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
   
    <script>

        const selectCourse = async(e) => {
           const data = await fetch("/subjects/"+e);
           const result = await data.json();
            let subjets = document.querySelector("#chairs");
            subjets.innerHTML = "";
            let opt;
           result.map((data) => {
            opt = document.createElement("option");
            opt.value = data.codigo_curso_disciplina;
            opt.textContent = data.nome_disciplina;
            subjets.appendChild(opt)
           })
           
        }
    </script>

@endsection