@extends('frontend.main_master')
@section('content')
    <!-- Query Builder -->
    {{-- Desenvolvido à partir do Database Access Objects, o query builder permite que você construa 
    uma instrução SQL em um programático e independente de banco de dados. Comparado a escrever 
    instruções SQL à mão, usar query builder lhe ajudará a escrever um código SQL relacional mais 
    legível e gerar declarações SQL mais seguras.  --}}
    @php
    $user = DB::table('users')
        ->where('id', Auth::user()->id)
        ->first();
    @endphp
    


    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2"><br><br>
                    <img class="card-img-top" style="border-radius: 50%"
                        src="{{ !empty($user->profile_photo_path)
                            ? url('upload/user_images/' . $user->profile_photo_path)
                            : url('upload/no-image.png') }}"
                        style=" width: 100px; height: 100px;"><br><br>
                   
                    <ul class="list-group list-group-flush">
                        
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


                </div>

                <div class="col-md-2">
                    <!-- PLACEHOLDER: se tirar, bagunça o layout -->
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger">
                                <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                @if (session()->get('language') == 'portuguese')
                                    Mudar Senha
                                @else
                                    Change Password
                                @endif
                            </span><strong>
                            </strong></h3>

                        <div class="card-body">
                            <form method="post" action="{{ route('user.password.update') }}">
                                @csrf

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputemail1">
                                        <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                        @if (session()->get('language') == 'portuguese')
                                            Senha Atual
                                        @else
                                            Current Password
                                        @endif
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="password" id="current_password" name="oldpassword"
                                        class="form-control unicase-form-control text-input">
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputemail1">
                                        <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                        @if (session()->get('language') == 'portuguese')
                                            Nova Senha
                                        @else
                                            New Password
                                        @endif
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="password" id="password" name="password"
                                        class="form-control unicase-form-control text-input">
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputemail1">
                                        <!-- CONDIÇÃO: verificar a sessão do usuário, se for portugues, mostrar a opção inglês, se for inglês, mostrar opção português -->
                                        @if (session()->get('language') == 'portuguese')
                                            Confirmar
                                        @else
                                            Password Confirmation
                                        @endif
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
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

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
