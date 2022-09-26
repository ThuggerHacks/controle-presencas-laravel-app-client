
<div class="modal  fade " tabindex="-1" id="feedback">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header bg-primary text-light">
          <h5 class="modal-title">Justificar Falta</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="content-uz">
            <div class="card p-4 d-flex align-items-center" style="width: 600px">
              <form action="#" method="post">
                  @csrf
                  <div >
                      <div >
      
      
                          <div class="input-group w-100 mb-2">
      
                              <span class="input-group-text bg-transparent border-end-0" id="basic-addon1">
                                  <i class="fa fa-feather"></i>
                              </span>
                              <input type="text" name="" id="" class="form-control" placeholder="Assunto">
                          </div>
      
                          <div class="input-group w-100 mb-2">
      
                              <textarea name="" id=""  cols="50" rows="7" class="form-control" placeholder="Mensagem"></textarea>
                            
                          </div>
      
                      </div>
                  </div>
              </form>
            </div>
          </div>  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary">
              <span>
                <i class="fa fa-paper-plane"></i>
              </span>
              <span>Enviar</span>
          </button>
        </div>
      </div>
    </div>
  </div>