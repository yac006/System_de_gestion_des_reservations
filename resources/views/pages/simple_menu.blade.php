
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
        <div class="modal-body" style="padding-top: 20px; padding-bottom: 30px;">
            <!-- -------------- Radio button container ---------------- -->
            <div class="rad_btn_cont">
              <div class="col-md-12" style="padding-left: 65px;">
                <div class="icon_inpt_container">
                  <i class="zmdi zmdi-city-alt zmdi-hc-5x" style="color:#c3c7cc"></i>
                  <div class="form-check form-check-inline cont_labl_inpt">
                      <input class="form-check-input" type="radio" name="radioBtnTypeDmnd" id="inlineRadio" value="Salles">
                      <label class="form-check-label" for="inlineRadio1">Salles</label>
                  </div>
                </div>
                <div class="icon_inpt_container" style="margin-left: 25px;">
                  <i class="zmdi zmdi-car zmdi-hc-5x" style="color:#c3c7cc"></i>
                  <div class="form-check form-check-inline cont_labl_inpt">
                      <input class="form-check-input" type="radio" name="radioBtnTypeDmnd" id="inlineRadio" value="Vehicules">
                      <label class="form-check-label" for="inlineRadio2">Vehicules</label>
                  </div>
                </div>
            </div>

            </div>
            <!-- -------------- Form pour réservation des Salles ---------------- -->
            <form class="salles_form_cont">
              <div class="form">
                <div class="row">
                  <div class="col-md-12">
                    <label for="inputEmail4">Theme</label>
                    <input type="text" class="form-control" id="inpt_theme" placeholder="Theme">
                  </div>
                  
                </div>
                <div class="row">
                  <div class="col-md-8" style="padding-right: 5px;">
                    <label for="inputEmail4">Date</label>
                    <input type="date" class="form-control" id="inpt_date" placeholder="Date">
                  </div>
                  <div class="col-md-4" style="padding-left: 5px;">
                    <label for="inputState">Salle</label>
                    <select id="inpt_select_sal" class="form-control">
                      <option selected>Choose...</option>
                      <option>Salle 01</option>
                      <option>Salle 02</option>
                      <option>Salle 03</option>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col" style="padding-right: 5px;">
                    <label for="inputEmail4">Heure début</label>
                    <input type="time" class="form-control" id="inpt_hr_debut" placeholder="Heure début">
                  </div>
                  <div class="col" style="padding-left: 5px;">
                    <label for="inputEmail4">Heure fin</label>
                    <input type="time" class="form-control" id="inpt_hr_fin" placeholder="Heure fin">
                  </div>
                </div>
                
              </div> <!-- Form End-->
            </form>
            <!-- -------------- Form pour réservation des Vehicule ---------------- -->
              <form class="vehc_form_cont">
                <div class="form">
                  <div class="row">
                    <div class="col-md-12">
                      <label for="motif_inpt">Motif</label>
                      <input type="text" class="form-control" id="motif_inpt" placeholder="motif">
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-md-8" style="padding-right: 5px;">
                      <label for="date_dmnd_v_inpt">Date</label>
                      <input type="date" class="form-control" id="date_dmnd_v_inpt" placeholder="Date">
                    </div>
                    <div class="col-md-4" style="padding-left: 5px;">
                      <label for="dest_inpt">Destination</label>
                      <input  type="text" class="form-control" id="dest_inpt" placeholder="Destination">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6" style="padding-right: 5px;">
                      <label for="date_dmnd_v_inpt">Date départ</label>
                      <input type="date" class="form-control" id="inp_date_dep" placeholder="Date">
                    </div>
                    <div class="col-md-6" style="padding-left: 5px;">
                      <label for="dest_inpt">Date estimé de retour</label>
                      <input  type="date" class="form-control" id="inp_date_rtr" placeholder="Date">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6" style="padding-right: 5px;">
                      <label for="date_dmnd_v_inpt">Heure départ</label>
                      <input type="time" class="form-control" id="inp_heure_dep" placeholder="time">
                    </div>
                    <div class="col-md-6" style="padding-left: 5px;">
                      <label for="dest_inpt">Heure retour</label>
                      <input  type="time" class="form-control" id="inp_heure_rtr" placeholder="time">
                    </div>
                  </div>
  
                  <div class="row">
                    <div class="col" style="padding-right: 5px;">
                      <label for="input_select_Vech">Vehicule</label>
                      <select id="input_select_Vech" class="form-control">
                        <option disabled>Choisir le type...</option>
                        <option>Touristique </option>
                        <option>Utilitaire</option>
                        <option>Autres</option>
                      </select>
                    </div>
                    <div class="col style_col_rd_btn" >
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="radioBtnChauf" id="inlineRadio1" value="True">
                        <label class="form-check-label" for="inlineRadio1">Avec chauffeur</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="radioBtnChauf" id="inlineRadio2" value="False">
                        <label class="form-check-label" for="inlineRadio2">Sans chauffeur</label>
                      </div>
                    </div>
                  </div>
                  
                </div> <!-- Form End-->
              </form>

        </div>
        <div class="modal-footer">
          <button type="button" id="btn_show_clndr" class="btn btn-warning" style="display: none">Voir planning</button>
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
            <i id="open_mdl_contact_btn" class="zmdi zmdi-email zmdi-hc-5x hvr-wobble-horizontal" style="color:#c3c7cc; "></i>
        </div>
  </div>
  <!--*****-->
  <div class="card mb-3 " id="box_three">
    <div class="card-header">Historique</div>
        <div class="cont_icon hvr-radial-out">
            <i id="open_hstrq_btn" class="zmdi zmdi-help-outline zmdi-hc-5x hvr-wobble-horizontal" style="color:#c3c7cc; "></i>
        </div>
  </div>


