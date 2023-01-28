<form class="salles_form_cont" hidden>
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
        
        <div class="btn_cont">
            <button type="button" id="_btn_showCalendar_s" class="btn btn-outline-warning">Voir planing</button>
            <button type="button" id="_btn_send_s" class="btn btn-outline-success">Envoyer</button>
        </div> 
    </div> <!-- Form End-->
</form>