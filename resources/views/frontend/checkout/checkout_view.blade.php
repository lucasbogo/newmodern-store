@extends('frontend.main_master')
@section('content')

@section('title')
    @if (session()->get('language') == 'portuguese')
        Conferir Compras
    @else
        Checkout
    @endif
@endsection


<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>
                    @if (session()->get('language') == 'portuguese')
                        Conferir Compras
                    @else
                        Checkout
                    @endif
                </li>
            </ul>
        </div>
    </div>
</div>
