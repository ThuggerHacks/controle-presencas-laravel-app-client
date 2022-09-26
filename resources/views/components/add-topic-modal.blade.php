
<div class="modal  fade " tabindex="-1" id="topic">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header bg-primary text-light">
          <h5 class="modal-title">Novo Topico</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
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
    
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer ">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary">
            <span>
                <i class="fa fa-add"></i>
            </span>
            <span>Adicionar</span>
          </button>
        </div>
      </div>
    </div>
  </div>