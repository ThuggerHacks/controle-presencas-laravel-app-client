
<div class="modal  fade " tabindex="-1" id="timetable">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header bg-primary text-light">
          <h5 class="modal-title">Alterar Horario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            
            <form action="#" method="post">
    
                @csrf
                <div class="content-uz">
                    <div class="card p-4 d-flex align-items-center" style="width: 600px">
    
    
                        <div class="input-group w-100 mb-2">
    
                            <span class="input-group-text bg-transparent border-end-0" id="basic-addon1">
                                <i class="fa fa-table"></i>
                            </span>
                            <select name="dias[]" class="form-select border-start-0 dia" >
                                <option value="1" selected>Segunda-feira</option>
                            </select>
                            <input type="text"  class="form-control ini" pattern="()|([0-9]{2}:[0-9]{2}:[0-9){2})" placeholder="Inicio de aulas">
                            <input type="text"  class="form-control fim" pattern="()|([0-9]{2}:[0-9]{2}:[0-9){2})" placeholder="Fim de aulas">
                           
    
                        </div>
    
                        <div class="input-group w-100 mb-2">
    
                            <span class="input-group-text bg-transparent border-end-0" id="basic-addon1">
                                <i class="fa fa-table"></i>
                            </span>
                            <select name="dias[]" class="form-select border-start-0 dia"  >
                                <option value="2" selected>Terca-feira</option>
                            </select>
                            <input type="text"  class="form-control ini"  pattern="()|([0-9]{2}:[0-9]{2}:[0-9){2})" placeholder="Inicio de aulas">
                            <input type="text"  class="form-control fim"  pattern="()|([0-9]{2}:[0-9]{2}:[0-9){2})" placeholder="Fim de aulas">
                           
    
                        </div>
    
                        <div class="input-group w-100 mb-2">
    
                            <span class="input-group-text bg-transparent border-end-0" id="basic-addon1">
                                <i class="fa fa-table"></i>
                            </span>
                            <select name="dias[]" class="form-select border-start-0 dia"  >
                                <option value="3" selected>Quarta-feira</option>
                            </select>
                            <input type="text"  class="form-control ini"  pattern="()|([0-9]{2}:[0-9]{2}:[0-9){2})" placeholder="Inicio de aulas">
                            <input type="text"  class="form-control fim"  pattern="()|([0-9]{2}:[0-9]{2}:[0-9){2})" placeholder="Fim de aulas">
                           
    
                        </div>
                        
                        <div class="input-group w-100 mb-2">
    
                            <span class="input-group-text bg-transparent border-end-0" id="basic-addon1">
                                <i class="fa fa-table"></i>
                            </span>
                            <select name="dias[]" class="form-select border-start-0 dia"   >
                                <option value="4" selected>Quinta-feira</option>
                            </select>
                            <input type="text"  class="form-control ini"  pattern="()|([0-9]{2}:[0-9]{2}:[0-9){2})" placeholder="Inicio de aulas">
                            <input type="text"  class="form-control fim"  pattern="()|([0-9]{2}:[0-9]{2}:[0-9){2})"placeholder="Fim de aulas">
                           
    
                        </div>

                        <div class="input-group w-100 mb-2">
    
                            <span class="input-group-text bg-transparent border-end-0" id="basic-addon1">
                                <i class="fa fa-table"></i>
                            </span>
                            <select name="dias[]" class="form-select border-start-0 dia" >
                                <option value="5" selected>Sexta-feira</option>
                            </select>
                            <input type="text"  class="form-control ini" placeholder="Inicio de aulas">
                            <input type="text"  class="form-control fim" placeholder="Fim de aulas">
                            <input type="hidden" name="" id="cadeira" value="{{$cadeira}}">
                            
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer ">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary" onclick="changeTime()">Guardar altera&ccedil;&atilde;o</button>
        </div>
      </div>
    </div>
  </div>


  <script>

      const changeTime = async() => {
          const cnf = confirm("Alterar Horario?");

          if(cnf){
            let dias = document.querySelectorAll(".dia");
            let ini = document.querySelectorAll(".ini");
            let fim = document.querySelectorAll(".fim");
            let cadeira = document.querySelector("#cadeira");
        

            let array = [];

            for(let i = 0; i < dias.length; i++){
                if(ini[i].value.trim().length > 0){
                    if(!ini[i].value.match(/[0-9]{2}:[0-9]{2}:[0-9]{2}/i)){
                        toast("Por favor siga o seguinte formato para a hora: xx:xx:xx","error");
                        return;
                    }
                }

                if(fim[i].value.trim().length > 0){
                    if(!fim[i].value.match(/[0-9]{2}:[0-9]{2}:[0-9]{2}/i)){
                        toast("Por favor siga o seguinte formato para a hora: xx:xx:xx","error");
                        return;
                    }
                }

                array.push({
                    dia:dias[i].value,
                    inicio:ini[i].value,
                    fim:fim[i].value
                });
            }

            const data = await axios.post("/addtimetable",{array:JSON.stringify(array),cadeira:cadeira.value});

            if(data ){
                if(!data.data.errors){
                    window.open(window.location.href,"_self");
                }else{
                    alert(data.data.errors)
                }
            }else{
               toast("Houve um erro","error")
            }
          }
          
      }

  </script>