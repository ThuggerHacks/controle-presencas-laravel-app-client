@extends("layouts.layout")

@section("title","Home")

@section("content")

@include("_partials.navbar")

    <div class="d-flex align-items-center justify-content-center">

        <form  action="{{ route("search.teacher.all") }}" method="post">
            @csrf
            <div class="content-uz">
                <div class="card p-4 d-flex align-items-center" style="width: 600px">

                    <div class="input-group w-100 mb-2">

                        <span class="input-group-text bg-transparent border-end-0" id="basic-addon1">
                            <i class="fa fa-book"></i>
                        </span>
                        <select class="form-select border-start-0" name="curso" id="curso" onchange="selectCourse(this.value)">
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
                        <input type="hidden" id="teacher" value="{{ session("teacher")->codigo_docente }}">

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
           const data = await axios.get("/teacher/subjects/"+e);
            let subjets = document.querySelector("#chairs");
            let teacher = document.querySelector("#teacher");
            let course = document.querySelector("#curso");
   
            subjets.innerHTML = "";
            let opt;

          if(data){
        
            data.data.map((result) => {
                if(result.fk_codigo_docente == teacher.value){
                    opt = document.createElement("option");
                    opt.value = result.codigo_curso_disciplina;
                    opt.textContent = result.nome_disciplina;
                    subjets.appendChild(opt)
                }
           })
          }
           
        }
    </script>

@endsection