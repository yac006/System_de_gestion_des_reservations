<div class="card mb-3 " id="box_one">
    <div class="card-header">Réservation</div>
        <div class="cont_icon hvr-radial-out">
            <i class="zmdi zmdi-calendar-note zmdi-hc-5x hvr-wobble-horizontal" style="color:#c3c7cc;" 
            data-toggle="modal" data-target="#exampleModal_rsv" data-whatever="@mdo"></i>
        </div>
  </div>
  <!------------------- Model Réservation --------------------->
  <div class="modal fade" id="exampleModal_rsv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nouvelle réservation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="titre" class="col-form-label">titre</label>
              <input type="text" class="form-control" id="titre">
            </div>
            <div class="form-group">
              <label for="tp_réservation" class="col-form-label">Type de réservation</label>
              <select class="form-control" id="tp_réservation" name="type_rsv">
                <option>Salle</option>
                <option>Vehicule</option>
            </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="btn_envoyer" class="btn btn-primary">Envoyer</button>
        </div>
      </div>
    </div>
  </div>
  <!------------------- Model Réservation Ends --------------------->
  <!--*****-->
  <div class="card mb-3" id="box_two">
    <div class="card-header">Contact</div>
        <div class="cont_icon hvr-radial-out">
            <i class="zmdi zmdi-email zmdi-hc-5x hvr-wobble-horizontal" style="color:#c3c7cc; "></i>
        </div>
  </div>
  <!--*****-->
  <div class="card mb-3 " id="box_three">
    <div class="card-header">Historique</div>
        <div class="cont_icon hvr-radial-out">
            <i class="zmdi zmdi-help-outline zmdi-hc-5x hvr-wobble-horizontal" style="color:#c3c7cc; "></i>
        </div>
  </div>