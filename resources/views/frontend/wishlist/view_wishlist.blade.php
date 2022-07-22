@extends('frontend.main_master')
@section('content')

@section('title')
    @if (session()->get('language') == 'portuguese')
        NewModern | Lista de Desejos
    @else
        NewModern |Wish List
    @endif
@endsection


<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>
                    @if (session()->get('language') == 'portuguese')
                        Lista de Desejos
                    @else
                        Wishlist
                    @endif
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="body-content">
    <div class="container">
        <div class="my-wishlist-page">
            <div class="row">
                <div class="col-md-12 my-wishlist">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="4" class="heading-title">
                                        @if (session()->get('language') == 'portuguese')
                                            Minha Lista de Desejos
                                        @else
                                            My Wish List
                                        @endif
                                    </th>
                                </tr>
                            </thead>

                            <!-- Chamei, pelo Id, o Ajax wishlist codificado na main_master -->
                            <tbody id="wishlist">


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>


        @include('frontend.body.brands')

    </div>






@endsection
