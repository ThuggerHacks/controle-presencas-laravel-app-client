
<div class="modal  fade " tabindex="-1" id="feedback">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header bg-primary text-light">
          <h5 class="modal-title">Justificar Falta</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div >
            <div class="card p-4 d-flex align-items-center">
              <form action="{{route("student.msg")}}" method="post">
                  @csrf
                  <div >
                      <div >
                          <div class="input-group w-100 mb-2">
      
                              <span class="input-group-text bg-transparent border-end-0" id="basic-addon1">
                                  <i class="fa fa-book-open"></i>
                              </span>
                              <input type="text" name="subject" id="" class="form-control" placeholder="Assunto">
                          </div>
      
                          <div class="input-group w-100 mb-2">
      
                              <textarea name="message" id=""  cols="50" rows="7" class="form-control" placeholder="Mensagem"></textarea>
                            
                          </div>
      
                      </div>
                      <input type="hidden" name="sendfeed" id="sendfeed">
                      <input type="hidden" name="aula" id="idaula">
                  </div>
                  <button type="submit" class="btn btn-primary">
                    <span>
                      <i class="fa fa-paper-plane"></i>
                    </span>
                    <span>Enviar</span>
                </button>
              </form>
            </div>
          </div>  
        </div>
        <div class="modal-footer">   
        </div>
      </div>
    </div>
  </div>