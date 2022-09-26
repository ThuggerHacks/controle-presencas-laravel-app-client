@extends("layouts.layout")

@section("title","Home")

@section("content")

@include("_partials.navbar")

    <div class="d-flex align-items-center justify-content-center">

        <form action="#" method="post">
            @csrf
            <div class="content-uz">
                <div class="card p-4 d-flex align-items-center" style="width: 600px">

                    <div class="input-group w-100 mb-2">

                        <span class="input-group-text bg-transparent border-end-0" id="basic-addon1">
                            <i class="fa fa-clock"></i>
                        </span>
                        <select name="tipo" class="form-select border-start-0"  id="form">
                        <option name="" id="" selected>Selecionar ano</option>
                        <option value="estagio">2013</option>
                        <option value="certificado">2014</option>
                        <option value="notas">2015</option>
                        <option value="bolsa">2016</option>
                        <option value="bolsa">2017</option>
                        <option value="bolsa">2018</option>
                        <option value="bolsa">2019</option>
                        <option value="bolsa">2020</option>
                        </select>
                       

                    </div>

                    <div class="input-group w-100 mb-2">

                        <span class="input-group-text bg-transparent border-end-0" id="basic-addon1">
                            <i class="fa fa-book-open"></i>
                        </span>
                        <select name="tipo" class="form-select border-start-0"  id="form">
                        <option name="" id="" selected>Selecionar nivel</option>
                        <option value="estagio">1</option>
                        <option value="certificado">2</option>
                        <option value="notas">3</option>
                        <option value="bolsa">4</option>
                        </select>
                       

                    </div>
                    
                    <div class="input-group w-100 mb-2">

                        <span class="input-group-text bg-transparent border-end-0" id="basic-addon1">
                            <i class="fa fa-pen"></i>
                        </span>
                        <select name="tipo" class="form-select border-start-0"  id="form">
                        <option name="" id="" selected>Selecionar semestre</option>
                        <option value="estagio">1</option>
                        <option value="certificado">2</option>
                        </select>
                       

                    </div>

                    <div class="input-group w-100 mb-2">

                        <span class="input-group-text bg-transparent border-end-0" id="basic-addon1">
                            <i class="fa fa-graduation-cap"></i>
                        </span>
                        <select name="tipo" class="form-select border-start-0"  id="form">
                            <option name="" id="" selected>Selecionar curso</option>
                            <option value="estagio">Engenharia Informatica</option>
                            <option value="certificado">Engenharia Civil</option>
                            <option value="certificado">Engenharia de processos</option>
                            <option value="certificado">Engenharia Ambiental</option>
                            <option value="certificado">Engenharia Mecanica</option>
                            <option value="certificado">Engenharia Mecatronica</option>
                        </select>
                       

                    </div>


                    <div class="input-group w-100 mb-2">

                        <span class="input-group-text bg-transparent border-end-0" id="basic-addon1">
                            <i class="fa fa-book"></i>
                        </span>
                        <select name="tipo" class="form-select border-start-0"  id="form">
                            <option name="" id="" selected>Selecionar cadeira</option>
                            <option value="estagio">SIOP</option>
                            <option value="certificado">INAR</option>
                            <option value="certificado">SIIF</option>
                            <option value="certificado">MEPP</option>
                            <option value="certificado">PRCO</option>
                            <option value="certificado">ENSOWII</option>
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