@extends('layouts.master')



@section('content')
        <!-- --------- Header --------- -->
        <div class="container">
            <div class="row row_cont">
                    <div class="col-md-2 col_style">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter">
                            Nv réservation
                        </button>
                    </div>
                    <div class="col-md-6 col_style">
                            <span id="title" style="text-align: center">Welcome <span style="color:red">{{ $arr->name }}</span> in your Account</span>
                    </div>                    
                    <div class="col-md-4 col_style" >
                            <button type="button" class="btn btn-outline-primary" id="notif_btn" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Notifications <span class="badge badge-light">0</span>
                            </button>
                        
                            {{-- -------------- --}}
                            <a id="lgout_link" class="btn btn-outline-secondary" href="{{ route('deleteInSession') }}">Logout</a>
                    </div>
            </div>
        </div>
        

        <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Demande Réservation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="{{route('checkNotif')}}" method="post">
            {{ csrf_field() }}
            <div class="modal-body">

                <select class="form-control" name="type_rsv">
                    <option>Salle</option>
                    <option>Vehicule</option>
                </select>
            </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" name="submit" value="Envoyer">
            </div>
        </form>
        
        
    </div>
    </div>
</div>


@endsection