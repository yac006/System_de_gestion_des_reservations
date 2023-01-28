
<form class="sal_dmnd_form" hidden>
    <div class="form">
        <div class="row">
            <div class="form-group col-md-4">
                <label for="_inp_num_dmnd">N° demande</label>
                <input type="text" class="form-control" id="_inp_num_dmnd" readonly> 
                <input type="text" class="form-control" id="_inp_id_rsv_sal" hidden>

            </div>
            <div class="form-group col-md-8">
                <label for="">Demandeur</label>
                <input type="text" class="form-control" id="_inp_demandeur" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="">Theme</label>
                <input type="text" class="form-control" id="inpt_theme">
            </div>
        
        </div>
        <div class="row">
        <div class="col-md-8" style="padding-right: 5px;">
            <label for="">Date rsv</label>
            <input type="date" class="form-control" id="_inp_date_rsv">
        </div>
        <div class="col-md-4" style="padding-left: 5px;">
            <label for="inputState">Salle</label>
            <select id="inpt_select_sal" class="form-control">
            <option selected></option>
            {{-- <option>Salle 01</option>
            <option>Salle 02</option>
            <option>Salle 03</option> --}}
            </select>
        </div>
        </div>

        <div class="row">
        <div class="col" style="padding-right: 5px;">
            <label for="">Heure début</label>
            <input type="time" class="form-control" id="inpt_hr_debut">
        </div>
        <div class="col" style="padding-left: 5px;">
            <label for="">Heure fin</label>
            <input type="time" class="form-control" id="inpt_hr_fin">
        </div>
        </div>
        
    </div> <!-- Form End-->
</form>
