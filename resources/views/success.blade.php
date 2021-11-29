@extends('layouts.app')
@section('title', 'Details')
@section('content')
    {{-- {{$order}} --}}
    <div class="be-wrapper be-fixed-sidebar success-page " style="background-color: white" >
        @include('layouts.checkout-heading', ['currentPage' => $currentPage ?? null])

        <div class="be-left-sidebar">
            <div class="left-sidebar-wrapper"><a class="left-sidebar-toggle" href="#">Dashboard</a>
                <div class="left-sidebar-spacer">
                    <div class="left-sidebar-scroll">
                      
                    </div>
                </div>
            </div>
        </div>

        <div class="be-content" style="background-color: white">
            <div class="main-content success-page">
                <div class="confirm-section py-4 success-page-container">
                        <div class="container-fluid ">
                            <div class="title mt-4">
                                <h2 class=" p-2">Thanks for placing your order!</h2>
                                <div class="para">
                                    <p class=" px-2">We send you a confirmation email. And will call you shortly.</p>
                                </div>
                            </div>



                            <div class="row mt-5 mr-6   container-success
                             ">
                                <div class="col-lg-9 col-md-12 col-12 review-table mb-4">
                                    <div class="full order-details-done table-responsive p-3">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                            <tr>

                                                <th scope="col">Items</th>
                                                <th scope="col">Price /Per Person</th>
                                                <th scope="col">Group Size</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @if($data)
                                                @foreach($data as $d)
                                            <tr>

                                                <td class="align-middle">

                                                    <h4>{{$d['menu']['name']}}</h4>

                                                </td>
                                                <td class="align-middle"><h5 class="fw-bold  text-center">{{ number_format($d['menu']['price'], 2) }}</h5></td>
                                                <td class="text-center align-middle">
                                                    @if($d['menu']['group'])
                                                        <img src="/assets/front/assets/img/black.png" style="width: 30px;   transform: translate(-2px, -3px);"> <span style="font-weight: bold;">{{$d['quantity']}}</span>
                                                    @endif
                                                </td>
                                            </tr>

                                                @endforeach
                                            @endif


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                @if($order->order_type === 'pick up')
                                    <div class="col-lg-3 col-md-12 col-12 review-table review-detail-contact">
                                        <div class="full order-details-done table-responsive p-3">

                                            <div class="time">
                                                <h3 class="fw-bold mb-4 order-detail-title" >PICKUP</h3>
                                                {{-- <h4 class="mt-1" style="font-weight: bold;">Email - {{ $site->email }}</h4>
                                                <h4 class="mt-1" style="font-weight: bold;">Call- {{ $site->contact }}</h4> --}}
                                                <h4 class="mb-4 order-detail-desc"><p style="font-weight: bold; ">The Upcafe </p>{{$site->address}}</h4>

                                                {{-- <a class="btn btn-dark mt-1" href="#" role="button">CONTACT US</a> --}}
                                            </div>
                                            {{-- <hr> --}}
                                            <div class="or-contact-us text-center ">
                                                {{-- <h5>Want to order more?</h5> --}}
                                                
                                            </div>

                                        </div>
                                        <a href="{{ url('/') }}" class="btn btn-success mt-5 backtotheCafe" style="background-color: #8EC39B;font-weight: bold; border: none;">BACK TO THE CAFE</a>
                                    </div>
                                @endif


                                @if($order->order_type === 'delivery')
                                    <div class="col-lg-3 col-md-12 col-12 review-table review-detail-contact">
                                        <div class="full order-details-done table-responsive p-3">

                                            <div class="time">
                                                <h3 class="fw-bold mb-4 order-detail-title" >DELIVERY</h3>
                                                 <!-- <h4 class="mt-1" style="font-weight: bold;">Email - {{ $order->email }}</h4> -->
                                                <!-- <h4 class="mt-1" style="font-weight: bold;">Call- {{ $order->contact }}</h4> -->
                                                <div class="mb-4 order-detail-desc">
                                                    <p class="delivery-infomation">{{$order->street}}</p>
                                                    <p class="delivery-infomation">{{$order->apartment}}</p>
                                                    <p class="delivery-infomation">Auckland {{$order->postal_code}}</p>
                                                </div>

                
                                            </div>
                                            <!-- {{-- <hr> --}}
                                            <div class="or-contact-us text-center ">
                                                {{-- <h5>Want to order more?</h5> --}}
                                                
                                            </div> -->

                                        </div>
                                        <a href="{{ url('/') }}" class="btn btn-success mt-5 backtotheCafe" style="background-color: #8EC39B;font-weight: bold; border: none;">BACK TO THE CAFE</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>
<?php
    $inner = true;
    $success = true;
?>

<style>
    @media screen and (max-width:767px) {
        .be-left-sidebar .sidebar-elements{
            margin-top: -9px !important;
        }
    }

    @media screen and (max-width: 810px){
    .main-page .button-section .show {
        background-color: black;
        padding: 9px 11px;
        color: black;
        color: white;
        font-size: 17px;
    
    }
    }
    .main-page .button-section span::before {
    
        background-color: black;

    }
    .be-left-sidebar:before {
        content: "";
        position: fixed;
        z-index: -1;
        width: inherit;
        top: 0;
        width: 247px;
        left: 0;
        bottom: 0;
        background-color: inherit;
        border-right: none;
    }
</style>

@endsection