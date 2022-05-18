
<div class="card mb-3 " id="box_one">
    <div class="card-header">Réservation</div>
        <div class="cont_icon hvr-radial-out">
            <i class="zmdi zmdi-calendar-note zmdi-hc-5x hvr-wobble-horizontal" style="color:#c3c7cc;" 
            data-toggle="modal" data-target="#exampleModal_rsv" data-whatever="@mdo"></i>
        </div>
  </div>
  <!------------------- Model Réservation --------------------->
  <div class="modal fade" id="exampleModal_rsv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal_dlg_rsv" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nouvelle réservation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" >
            <!-- -------------- Radio button container ---------------- -->
            <div class="rad_btn_cont">
              <div class="col-md-12" style="padding-left: 65px;">
                <div class="icon_inpt_container">
                  <i class="zmdi zmdi-car zmdi-hc-5x" style="color:#c3c7cc;"></i>
                  <div class="form-check form-check-inline cont_labl_inpt">
                      <input class="form-check-input" type="radio" name="inlineRadioBtn" id="inlineRadio1" value="Salles">
                      <label class="form-check-label" for="inlineRadio1">Salles</label>
                  </div>
                </div>
                <div class="icon_inpt_container" style="margin-left: 25px;">
                  <i class="zmdi zmdi-city-alt zmdi-hc-5x" style="color:#c3c7cc"></i>
                  <div class="form-check form-check-inline cont_labl_inpt">
                      <input class="form-check-input" type="radio" name="inlineRadioBtn" id="inlineRadio2" value="Vehicules">
                      <label class="form-check-label" for="inlineRadio2">Vehicules</label>
                  </div>
                </div>
            </div>

            </div>
            <!-- -------------- Form pour réservation des Salles ---------------- -->
            <div class="salles_form_cont">
              <form style="padding: 23px 18px;">
                <div class="row">
                  <div class="col">
                    <input type="text" class="form-control" placeholder="Theme">
                  </div>
                  <div class="col">
                    <input type="date" class="form-control" placeholder="Date">
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <input type="time" class="form-control" placeholder="Heure début">
                  </div>
                  <div class="col">
                    <input type="time" class="form-control" placeholder="Heure fin">
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    {{-- <label for="inputState">State</label> --}}
                    <select id="inputState" class="form-control">
                      <option selected>Choose...</option>
                      <option>Salle 01</option>
                      <option>Salle 02</option>
                      <option>Salle 03</option>
                    </select>
                  </div>
                  <div class="col">
                    <input type="text" class="form-control" placeholder="">
                  </div>
                </div>
              </form> <!-- Form End-->
            </div>
            <!-- -------------- Form pour réservation des Vehicule ---------------- -->
            <div class="vehc_form_cont">
              <form>
                <div class="form-group">
                  <label for="nom_expidéteur" class="col-form-label">Vechicule</label>
                  <label for="nom_expidéteur" class="col-form-label">Nom & Prénom</label>
                  <input type="text" class="form-control" id="nom_expidéteur">
                </div>
                <div class="form-group">
                  <label for="tp_réservation" class="col-form-label">Type de réservation</label>
                  <select class="form-control" id="tp_réservation" name="type_rsv">
                    <option>Salle</option>
                    <option>Vehicule</option>
                </select>
                </div>
              </form><!-- Form End-->
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" id="btn_back" class="btn btn-secondary">Précédent</button>
          <button type="button" id="btn_next" class="btn btn-primary">Suivant</button>
          <button type="button" id="btn_envoyer" class="btn btn-primary" style="display: none">Envoyer</button>
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

