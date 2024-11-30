<!--Modal Cadastrar Item -->
<div class="modal fade" id="modalPago" tabindex="-1" >
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Status Pago</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!--Content-->
          
            
            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Data</label>
                <div class="group">
                  <input type="text" id="calpagostatus" name='data' class="d-none">
                </div>
                </div>
              </div>
            </div>
  
          <!--Content-->
        </div>
        <div class="modal-footer">
          <input type="hidden" id='ag_idcliente' name="idcliente">
          <input type="hidden" id='ag_idagenda' name="idagenda">
          <input type="hidden" id='ag_status' name="status">
          <input type="hidden" id='ag_paginaorigem' name="paginaorigem">
  
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button id="okmodal" type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
        </div>
        
      </div>
    </div>
  </div>