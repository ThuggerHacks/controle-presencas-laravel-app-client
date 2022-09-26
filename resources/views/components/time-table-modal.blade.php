
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
                            <select name="tipo" class="form-select border-start-0"  id="form">
                                <option name="" id="" selected>Segunda-feira</option>
                            </select>
                            <input type="text" name="" id="" class="form-control" placeholder="Inicio de aulas">
                            <input type="text" name="" id="" class="form-control" placeholder="Fim de aulas">
                           
    
                        </div>
    
                        <div class="input-group w-100 mb-2">
    
                            <span class="input-group-text bg-transparent border-end-0" id="basic-addon1">
                                <i class="fa fa-table"></i>
                            </span>
                            <select name="tipo" class="form-select border-start-0"  id="form">
                                <option name="" id="" selected>Terca-feira</option>
                            </select>
                            <input type="text" name="" id="" class="form-control" placeholder="Inicio de aulas">
                            <input type="text" name="" id="" class="form-control" placeholder="Fim de aulas">
                           
    
                        </div>
    
                        <div class="input-group w-100 mb-2">
    
                            <span class="input-group-text bg-transparent border-end-0" id="basic-addon1">
                                <i class="fa fa-table"></i>
                            </span>
                            <select name="tipo" class="form-select border-start-0"  id="form">
                                <option name="" id="" selected>Quarta-feira</option>
                            </select>
                            <input type="text" name="" id="" class="form-control" placeholder="Inicio de aulas">
                            <input type="text" name="" id="" class="form-control" placeholder="Fim de aulas">
                           
    
                        </div>
                        
                        <div class="input-group w-100 mb-2">
    
                            <span class="input-group-text bg-transparent border-end-0" id="basic-addon1">
                                <i class="fa fa-table"></i>
                            </span>
                            <select name="tipo" class="form-select border-start-0"  id="form">
                                <option name="" id="" selected>Quinta-feira</option>
                            </select>
                            <input type="text" name="" id="" class="form-control" placeholder="Inicio de aulas">
                            <input type="text" name="" id="" class="form-control" placeholder="Fim de aulas">
                           
    
                        </div>

                        <div class="input-group w-100 mb-2">
    
                            <span class="input-group-text bg-transparent border-end-0" id="basic-addon1">
                                <i class="fa fa-table"></i>
                            </span>
                            <select name="tipo" class="form-select border-start-0"  id="form">
                                <option name="" id="" selected>Sexta-feira</option>
                            </select>
                            <input type="text" name="" id="" class="form-control" placeholder="Inicio de aulas">
                            <input type="text" name="" id="" class="form-control" placeholder="Fim de aulas">
                           
    
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer ">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary">Guardar altera&ccedil;&atilde;o</button>
        </div>
      </div>
    </div>
  </div>