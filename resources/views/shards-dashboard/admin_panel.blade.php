@extends('layouts.master')



@section('content')

        <div class="container">
                <div class="row row_cont">
                        <div class="col-md-2 col_style">
                                <button type="button" class="btn btn-secondary " id="notif_btn" data-toggle="collapse" href="#collapseExample_01" role="button" aria-expanded="false" aria-controls="collapseExample_01">
                                        Notifications <span class="badge badge-light"></span>
                                </button>
                        </div>
                        <div class="col-md-8 col_style">
                                <span id="title" style="text-align: center">Welcome <span style="color:red">{{ $arr->name }}</span> in Admin Panel</span>
                        </div>
                        <div class="col-md-2 col_style" >
                                <a id="lgout_link" class="btn btn-outline-secondary" href="{{ route('deleteInSession') }}">Logout</a>
                        </div>
                </div>
        </div>

        {{-- Collapse Menue --}}
        <div class="collapse col-md-3" id="collapseExample_01">
                <div class="card card-body" style="padding: 0">
                        <ul class="list-group">
                                @foreach ($arr->my_array->notifications as $notif)
                                        <li class="list-group-item">{{ $notif->id }}</li>
                                @endforeach
                                
                        </ul>
                </div>
        </div>

@endsection

        <!-- Jquery and Ajax Script -->
@section('jqry_ajax_script')   
        <script>
                $(document).ready(function(){
                        //Afficher le number de notifications
                        let user_id = {{$arr->id}} ;

                        $.ajaxSetup({
                                        headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                });
                        $.ajax({
                                method: 'GET' ,
                                url: 'retriveNumNotif' ,
                                data: {user_id : user_id} ,

                                success: function (number_notif){
                                        //afficher le nombre de notif dans le button notifications
                                        $(".badge-light").text(number_notif);
                                },
                                error: function (){
                                        alert("Error Ajax !!!");
                                }
                        });        

                        //si le button notification a été cliquer 
                        $('#notif_btn').click(function(){
                                let user_id = {{$arr->id}} ;                               

                                $.ajax({
                                        method: 'GET' ,
                                        url: 'markAsRead' ,
                                        data: { user_id :  user_id} ,

                                        success: function (new_number_notif){
                                                //afficher le nouveau nombre de notif qui a été dans le button notifications
                                                $(".badge-light").text(new_number_notif);        
                                        },
                                        error: function (){
                                                alert("Error Ajax !!!");
                                        }
                                });
                        })

                });
        </script>
@endsection