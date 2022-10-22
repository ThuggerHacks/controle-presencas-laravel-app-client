
<div class="modal  fade " tabindex="-1" id="studentinfo">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header bg-primary text-light">
          <h5 class="modal-title">Informa&ccedil;&atilde;o do estudante</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div >
            <div class="card p-4 d-flex align-items-center" >
              <div >
                  <div class="card-body">
                    <div>
                      <strong>Codigo do estudante: </strong><span id="codex">carregando...</span>
                  </div>
                  <div>
                      <strong>Nome do estudante: </strong><span id="namex">carregando...</span>
                  </div>
                  <div>
                      <strong>Email do estudante: </strong><span id="emailx">carregando...</span>
                  </div>
                  {{-- <div>
                      <strong>Faculdade do estudante: </strong><span id="fac"></span>
                  </div>
                  <div>
                      <strong>Curso do estudante: </strong><span id="course"></span>
                  </div> --}}
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer bg-primary text-light">
          <button type="button" class="btn btn-secondary" onclick="dismiss()" data-bs-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

