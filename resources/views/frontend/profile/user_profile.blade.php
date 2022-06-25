@extends('frontend.main_master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2"><br><br>
                    <img class="card-img-top" style="border-radius: 50%"
                        src="{{ !empty($editData->profile_photo_path)
                            ? url('upload/admin_images/' . $editData->profile_photo_path)
                            : url('upload/no-image.png') }}"
                        style=" width: 100px; height: 100px;"><br><br>
                    <!-- bootstrap class list-group e list-group-flush -->
                    <ul class="list-group list-group-flush">
                        <!-- botão primário pequeno -->
                        <a href="" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="{{ route('user.profile') }}"" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                        <a href="" class="btn btn-primary btn-sm btn-block">Change Password</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>

                    </ul>


                </div><!-- /col -->

                <div class="col-md-2">


                </div><!-- /col -->

                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger">Olá...</span><strong>
                                {{ Auth::user()->name }}</strong>Você pode editar seu perfil aqui.</h3>

                        <div class="card-body">
                            <form method="post" accept="">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputemail1">Email Address <span>*</span></label>
                                    <input type="email" id="email" name="email"
                                        class="form-control unicase-form-control text-input">
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputemail1">Email Address <span>*</span></label>
                                    <input type="email" id="email" name="email"
                                        class="form-control unicase-form-control text-input">
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputemail1">Email Address <span>*</span></label>
                                    <input type="email" id="email" name="email"
                                        class="form-control unicase-form-control text-input">
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputemail1">Email Address <span>*</span></label>
                                    <input type="email" id="email" name="email"
                                        class="form-control unicase-form-control text-input">
                                </div>
                            </form>

                        </div><!-- /div class "card-body" -->
                    </div><!-- /div class="card" -->


                </div><!-- /col -->

            </div><!-- /row -->
        </div><!-- /container -->
    </div><!-- /content -->
@endsection
