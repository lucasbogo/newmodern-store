@extends('frontend.main_master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2"><br><br>
                    <img class="card-img-top" style="border-radius: 50%"
                        src="{{ !empty($user->profile_photo_path)
                            ? url('upload/user_images/' . $user->profile_photo_path)
                            : url('upload/no-image.png') }}"
                        style=" width: 100px; height: 100px;"><br><br>
                    <!-- bootstrap class list-group e list-group-flush -->
                    <ul class="list-group list-group-flush">
                        <!-- botão primário pequeno -->
                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">
                            <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                            @if (session()->get('language') == 'portuguese')
                                Atualizar Perfil
                            @else
                                Profile Update
                            @endif
                        </a>
                        <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">
                            <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                            @if (session()->get('language') == 'portuguese')
                                Mudar Senha
                            @else
                                Change Password
                            @endif

                        </a>
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">
                            <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                            @if (session()->get('language') == 'portuguese')
                                Sair
                            @else
                                Logout
                            @endif
                        </a>

                    </ul>


                </div><!-- /col -->

                <div class="col-md-2">


                </div><!-- /col -->

                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger">
                                <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                @if (session()->get('language') == 'portuguese')
                                    Olá...
                                @else
                                    Hello...
                                @endif
                            </span><strong>
                                {{ Auth::user()->name }}</strong>
                            <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                            @if (session()->get('language') == 'portuguese')
                                Você pode editar o seu perfil aqui.
                            @else
                                You can edit your profile here.
                            @endif
                        </h3>

                        <div class="card-body">
                            <form method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputemail1">
                                        <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                        @if (session()->get('language') == 'portuguese')
                                            Nome
                                        @else
                                            Name
                                        @endif
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" id="name" name="name" value="{{ $user->name }}"
                                        class="form-control unicase-form-control text-input">
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputemail1">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="email" id="email" name="email" value="{{ $user->email }}"
                                        class="form-control unicase-form-control text-input">
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputemail1">
                                        <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                        @if (session()->get('language') == 'portuguese')
                                            Telefone
                                        @else
                                            Phone
                                        @endif
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" id="phone" name="phone" value="{{ $user->phone }}"
                                        class="form-control unicase-form-control text-input">
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputemail1">
                                        <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                        @if (session()->get('language') == 'portuguese')
                                            Foto Perfil
                                        @else
                                            Profile Picture
                                        @endif
                                        <span class="text-info">OPCIONAL</span>
                                    </label>
                                    <input type="file" id="" name="profile_photo_path"
                                        class="form-control unicase-form-control text-input">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">
                                        <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                        @if (session()->get('language') == 'portuguese')
                                            Atualizar
                                        @else
                                            Update
                                        @endif
                                    </button>

                            </form><!-- end form method post -->



                        </div><!-- /div button -->

                    </div><!-- /div class "card-body" -->
                </div><!-- /div class="card" -->


            </div><!-- /col -->

        </div><!-- /row -->
    </div><!-- /container -->
    </div><!-- /content -->
@endsection
