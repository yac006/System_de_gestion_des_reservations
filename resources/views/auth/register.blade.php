@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Alerts Container -->
        @if (Session::has('msg_success'))
            <div class="alert alert-success col-md-8" style="text-align: center">
                <span style="padding:50p 20px">{{ Session::pull('msg_success') }}</span>
            </div>         
        @endif
        @if (Session::has('img_msg'))
        <div class="alert alert-warning col-md-8" style="text-align: center">
            <span style="padding:50p 20px">{{ Session::pull('img_msg') }}</span>
        </div>         
        @endif
        <!-- ///////////////// -->
        <div class="col-md-8" style="margin-top: 40px;">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('Register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3" hidden>
                            <label for="avatar_num" class="col-md-4 col-form-label text-md-end">Avatar path</label>

                            <div class="col-md-6">
                                <input id="avatar_path" type="text" class="form-control" name="avatar_path" >
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                                <a  class="btn btn-outline-secondary" id="avatar_btn" data-toggle="modal" data-target="#imgModal"  style="float:right">
                                    Choisir un avatar .......
                                </a>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- images avtr Modal -->
    <div class="modal fade" id="imgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:640px; margin-top: 3px  ">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Avatars</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body avtr_cont"><!-- start body modal-->
                
                    <ul class="avtr_ul">
                    <li class="selection"><img src="{{asset('images/avatars/1.jpg')}}" /></li>
                    <li><img src="{{asset('images/avatars/2.jpg')}}" /></li>
                    <li><img src="{{asset('images/avatars/3.jpg')}}" /></li>
                    <li><img src="{{asset('images/avatars/4.jpg')}}" /></li>
                    <li><img src="{{asset('images/avatars/5.jpg')}}" /></li>
                    <li><img src="{{asset('images/avatars/6.jpg')}}" /></li>
            
                    </ul>

            </div><!-- end body modal-->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="save_btn" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
