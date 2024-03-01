@extends('theme')



@section('content')
<div class="container">

    <div  class="col-md-4"> 
    </div>

<div class="col-md-12" style="padding-top: 46PX;">

    <div class="ms-card ms-widget ms-profile-widget ms-card-fh br-0">
      <div class="ms-card-img">
        <img src="assets/ass.webp" alt="card_img">
      </div>
      <img src="assets/avatar.png" class="ms-img-large ms-img-round ms-user-img" alt="people">
      <div class="ms-card-body">
        <h2>{{Auth::user()->name}}</h2>
        <span></span>
        <div class="box">
            <div class="">
                <h6 class="text-uppercase ls-2" style="margin-left: 20px;color:white; background-color:#009efb;    border-radius: 10px;
                padding-top: 3PX;
                padding-bottom: 5px;
                margin-top: 20px;">Changer le Mot de passe </h6>
              </div>
             
         
                <form method="POST" action="changepassword">
                    @csrf
    
                    <div class="form-group row">
                        <label for="current_password" class="col-md-4 col-form-label text-md-right" style="color: black">{{ __('Mot de passe actuel') }}</label>
    
                        <div class="col-md-6">
                            <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autocomplete="current-password" required>
                            @error('current_password')
                            <span >
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                            
                        </div>
                    </div>
    
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right" style="color: black">{{ __('Nouveau mot de passe') }}</label>
    
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" required>
    
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
    
                    <div class="form-group row">
                        <label for="password_confirmation" class="col-md-4 col-form-label text-md-right" style="color: black">{{ __('Confirmer le nouveau mot de passe') }}</label>
    
                        <div class="col-md-6">
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" required>
                        </div>
                    </div>
    
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary" style="    float: right;
                            ">
                                <i class="ti-save-alt"></i> enregistrer
                              </button>
                        </div>
                    </div>
                </form>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
    </div>

 
<div  class="col-md-4"> 
    </div>
</div>
@endsection