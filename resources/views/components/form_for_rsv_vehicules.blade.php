<form class="vehc_form_cont" hidden>
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
        <div class="col style_col_rd_btn" style="top: 34px;">
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

        
        <div class="btn_cont">
            <button type="button" id="_btn_showCalendar_v" class="btn btn-outline-warning">Voir planing</button>
            <button type="button" id="_btn_send_v" class="btn btn-outline-success">Envoyer</button>
        </div> 
    </div> <!-- Form End-->
</form>
