
<form class="vehc_dmnd_form" hidden>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="_inp_num_dmnd">N° demande</label>
            <input type="text" class="form-control" id="_inp_num_dmnd" readonly>
            <input type="text" class="form-control" id="_inp_id_rsv_vehc" hidden>

        </div>
        <div class="form-group col-md-8">
            <label for="">Demandeur</label>
            <input type="text" class="form-control" id="_inp_demandeur" readonly>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="">Date demande</label>
            <input type="text" class="form-control" id="_inp_date_demande" readonly>
        </div>
        <div class="form-group col-md-6">
            <label for="">Date réservation</label>
            <input type="text" class="form-control" id="_inp_date_rsv">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="">Motif</label>
            <input type="text" class="form-control" id="_inp_motif">
        </div>
        <div class="form-group col-md-4">
            <label for="">Destination</label>
            <input type="text" class="form-control" id="_inp_dest">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="">Date départ</label>
            <input type="date" class="form-control" id="_inp_date_dep">
        </div>
        <div class="form-group col-md-4">
            <label for="">Date retour</label>
            <input type="date" class="form-control" id="_inp_date_retr">
        </div>
        <div class="form-group col-md-2">
            <label for="">Heure dep</label>
            <input type="time" class="form-control" id="_inp_heur_dep">
        </div>
        <div class="form-group col-md-2">
            <label for="">Heure retr</label>
            <input type="time" class="form-control" id="_inp_heur_retr">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="">Type vehicule</label>
            <select id="select_type_vehc"  class="form-control">
                <option id="op1" selected></option> 
            
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="">Model vehicule</label>
            <select id="select_model_vehc" class="form-control">
                <option></option>

            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="">Num parc</label>
            <input type="text" class="form-control" id="_inp_num_parc" disabled>
        </div>
        <div class="form-group col-md-1">
            <div class="form-check chauf_chexbox_cont">
                <input class="form-check-input" type="checkbox" id="_chfr_checkbox">
                <label class="form-check-label" for="gridCheck">Chauffeur</label>
            </div>
        </div>
    </div>
    
    
</form>



