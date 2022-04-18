

        {{-- Container Start --}}
        <div class="container my-1 alert">

            <div id='calendar'  style="width:92%;  margin: 0px auto ;"></div> 


            <!---------- Modal Dialog D'insertion --------------> 
            <div class="modal fade bd-example-modal-lg" id="insert_model" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog  new_model_lg">
                    <div class="modal-content" style="font-size: 15px ; height: auto ; background: rgba(247, 247, 247, 1)">
                            <div class="card card-small">
                              <div class="card-header border-bottom">
                                <h6 class="m-0">Details</h6>
                              </div>
                              <ul class="list-group list-group-flush">
                                <li class="list-group-item p-3">
                                  <div class="row">
                                    <div class="col">
                                      <form>
                                        <div class="form-row">
                                          <div class="form-group col-md-6">
                                            <label for="fetitle">Title</label>
                                            <input type="text" class="form-control model_inputs" id="fetitle" placeholder="title"> </div>
                                          <div class="form-group col-md-6">
                                            <label for="feClient">Client</label>
                                            <input type="text" class="form-control model_inputs" id="feClient" placeholder="type de client"> </div>
                                        </div>
                                        <div class="form-row">
                                          <div class="form-group col-md-6">
                                            <label for="feNom">Nom</label>
                                            <input type="text" class="form-control model_inputs" id="feNom" placeholder="nom de client"> </div>
                                          <div class="form-group col-md-6">
                                            <label for="fePrenom">Prénom</label>
                                            <input type="text" class="form-control model_inputs" id="fePrenom" placeholder="prénom de client"> </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="feAddress">Address</label>
                                          <input type="text" class="form-control model_inputs" id="feAddress" placeholder=""> </div>
                                        <div class="form-row">
                                          <div class="form-group col-md-6">
                                            <label for="feEmail">Email</label>
                                            <input type="email" class="form-control model_inputs" id="feEmail"> </div>
                                          <div class="form-group col-md-4">
                                            <label for="feReservation" style="color: rgb(233, 159, 23)">Réservation</label>
                                            <select id="feReservation" class="form-control">
                                              <option selected>Choisir ....</option>
                                              <option>Salle</option>
                                              <option>Véhicule</option>
                                            </select>
                                          </div>
                                          <div class="form-group col-md-2">
                                            <label for="feTele">télé</label>
                                            <input type="text" class="form-control" id="feTele"> </div>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                            
                            <div class="container_btn"> 
                              <button type="submit" class="btn btn-outline-danger" id="btn_save">Enregistrer</button>
                          </div>
                    </div>
                </div>
            </div>

            <!---------- Modal Dialog D'insertion --------------> 
            <div class="modal fade bd-example-modal-lg" id="display_model" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog  new_model_lg">
                  <div class="modal-content" style="font-size: 15px ; padding: 7px; height: 470px; border: dotted 2px red">
    
                        
                  </div>
              </div>
          </div>


        </div>  <!-- Container ends -->

