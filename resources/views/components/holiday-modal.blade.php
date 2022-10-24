
<div class="modal  fade " tabindex="-1" id="holiday">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header bg-primary text-light">
          <h5 class="modal-title">Marcar Feriado</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div >
            <div class="card p-4 d-flex align-items-center">
              <form action="{{route("dep.holiday")}}" method="post">
                  @csrf
                  <div >
                      <div >
                          <div class="input-group w-100 mb-2">
                              <input type="date" name="date" id="" class="form-control" placeholder="Assunto">
                              <button type="submit" class="btn btn-primary">
                                <span>
                                  <i class="fa fa-check"></i>
                                </span>
                                <span>Marcar</span>
                            </button>
                          </div>
      
                      </div>
                  </div>
              </form>
            </div>
          </div>  
        </div>
        <div class="modal-footer">   
        </div>
      </div>
    </div>
  </div>