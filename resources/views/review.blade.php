@extends('layouts.app')
@section('title', 'Review')
@section('content')
<style>
    hr {
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, .4) !important;
    }
</style>
    <?php
    $is_active = 'review';
    ?>
    {{-- {{dd($data)}}; --}}
    <div class="be-wrapper be-fixed-sidebar be-fixed-sidebar123 review-page" style="background-color: white;">
        @include('layouts.checkout-heading', ['currentPage' => $currentPage ?? null])
       
        <div class="be-left-sidebar">
            <div class="left-sidebar-wrapper"><a class="left-sidebar-toggle" href="#">Dashboard</a>
                <div class="left-sidebar-spacer">
                    <div class="left-sidebar-scroll">
                    </div>
                </div>
                <div class="progress-widget">
                    <div class="back-section">
                        <?php
                        // (isset($link) && $link) ? $link : '/';
                        ?>
                        <a href="{{ url('catering/breakfast') }}"><i class="fa fa-angle-left"
                                                                     style="margin-left: 27px; color: black;"></i>
                            &nbsp;&nbsp; <span class="" style="font-size: 17px; color: black;">BACK</span></a>
                    </div>
                </div>
            </div>
        </div>
     
        @if($data)
            <div class="be-content">
                <div class="main-content">
                    <div class="confirm-section confirm-box-2 py-4">
                        <div class="container-fluid" style="width: 96%;">
                            <form id="editMenu">
                            <div class="row margin-top-desktop">

                                    @csrf
                                    <div class="col-lg-9 col-12 review-table review-table-detail">
                                        <div class="full p-5">
                                            <?php $i=0; ?>
                                            @foreach($data as $d) 
                                                
                                                <input type="hidden" value="{{$d['menu']['id']}}" name="id[]">
                                                <div class="row mt-5 ">
                                                    <div class="col-md-6">
                                                        <div class="main-box cart-page-title">
                                                            <h3 class="<?= ($i==0) ? 'review-main-item':'review-item';?>">
                                                                {{$d['menu']['name']}}
                                                            </h3>
                                                            @if($d['menu']['price'] == null || $d['menu']['price'] == 0)
                                                            <b style="font-size: 20px; color: #B0D5B9;">Price to be confirmed</b>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 user-group-img">
                                                        @if($d['menu']['price'] && $d['menu']['name'] != 'Dinner | Option 1' && $d['menu']['name'] != 'Dinner | Option 2' && $d['menu']['name'] != 'Dinner | Option 3' && $d['menu']['name'] != 'Dinner | Option 4')
                                                            <img src="/assets/front/assets/img/green-1.png"
                                                                 style="width: 30px;  transform: translate(-2px, -3px);">
                                                            <span style="color: green;">$ {{ $d['menu']['price'] }} pp</span>

                                                        @endif
                                                    </div>
                                                    <div class="col-md-3 user-group-img">
                                                        @if($d['menu']['group'] && $d['menu']['name'] != 'Dinner | Option 1' && $d['menu']['name'] != 'Dinner | Option 2' && $d['menu']['name'] != 'Dinner | Option 3' && $d['menu']['name'] != 'Dinner | Option 4')
                                                            <div class="number">
                                                                <span class="minus">-</span>
                                                                <input type="text" value="{{$d['quantity']}}"
                                                                       data-limit="{{$d['menu']['group']}}"
                                                                       name="quantity[]"/>
                                                                <span class="plus">+</span>
                                                            </div>
                                                        @else
                                                            <input type="hidden" name="quantity[]" value="1"
                                                                   data-limit="1">
                                                        @endif
                                                    </div>
                                                    <div class="col-md-1 user-group-img">
                                                        <div class="text-center">
                                                            <?php
                                                            $deleteId = $d['menu']['id'];
                                                            ?>
                                                            <img src="/assets/front/assets/Icon/delete.svg"
                                                                 style="width: 20px;   transform: translate(-2px, -3px);"
                                                                 onClick="destroy('{{$deleteId}}', '/delete-menu', '/review');">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- 2nd -->
                                                @if($d['menu']['content'])
                                                <div class="row mt-4">
                                                    <div class="col-12">
                                                        <div class="review_ul">
                                                            {!! $d['menu']['content'] !!}
                                                            <?php 
                                                                $itemGrandparent = $d['menu']['grandparent'];
                                                                $itemParent = $d['menu']['parent'];
                                                                $itemId =  $d['menu']['id'];
                                                            ?>
                                                            @if ($itemGrandparent === 'breakfast' && $itemParent === 1 || $itemGrandparent === 'lunch' || $itemGrandparent === 'tea' || $itemGrandparent === 'more' &&  $itemId === 157 ||  $itemGrandparent === 'more' &&  $itemId === 168 ||  $itemGrandparent === 'more' &&  $itemId === 169 ||  $itemGrandparent === 'more' &&  $itemId === 170 || $itemGrandparent === 'more' &&  $itemId === 190 || $itemGrandparent === 'more' &&  $itemId === 192 || $itemGrandparent === 'more' &&  $itemId === 193 ||$itemGrandparent === 'more' &&  $itemId === 194    )
                                                                <p>Individual Packaging (pricing on request) </p>
                                                            @elseif ($itemGrandparent === 'breakfast' && $itemParent === 2 || $itemGrandparent === 'dinner' || $itemGrandparent === 'more' &&  $itemId ===156 )
                                                                <p>Full Buffet off-site setup (pricing on request) </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                <hr>
                                                <?php $i++;?>
                                            @endforeach
                                        </div>

                                    </div>
                                    <!-- right -->
                                    <div class="col-lg-3 col-12 review-table">
                                        <div class="full time p-5">
                                            <p>Please let us know about special dietary or individual packing
                                                requirements
                                                here (fee apply)</p>
                                            <p style="color: green">*All items are excluding GST, You have to pay the GST at the time of payment</p>
                                        </div>
                                        <div class="button text-center mt-5">
                                            <a class="btn btn-add-more w-80" href="{{ url('catering/breakfast') }}">ADD MORE </a>
                                        </div>
                                        <div class="button text-center mt-5">
                                            <button class="btn btn-success view-my-selection-button w-100">CONFIRM
                                            </button>
                                        </div>

                                    </div>

                            </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <?php
    $inner = true;
    $review = true;
    ?>

    <style>
        @media screen and (max-width: 767px) {
            .be-left-sidebar .sidebar-elements {
                margin-top: -9px !important;
            }
        }


        @media screen and (max-width: 810px) {
            .main-page .button-section .show {
                background-color: black;
                padding: 9px 11px;
                color: black;
                color: white;
                font-size: 17px;

            }
        }

        .main-page .button-section span::before {

            background-color: white;

        }

        .main-page .button-section .remove::before {

            background-color: white;

        }


        /* plus and minus */

        span {
            cursor: pointer;
        }

        .number {
            margin: 0px;
        }

        input {
            height: 34px;
            width: 100px;
            text-align: center;
            font-size: 26px;
            border: 1px solid #ddd;
            border-radius: 4px;
            display: inline-block;
            vertical-align: middle;
        }


        input {
            height: 20px;
            width: 27px;
            text-align: center;
            font-size: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            border: none;
            display: inline-block;
            vertical-align: middle;
            font-weight: bold !important;
        }

        .minus,.plus {
            width: 32px;
            height: 32px;
            background: #f2f2f2;
            border-radius: 50%;
            border: 0px solid #ddd;
            font-weight: bold;
            vertical-align: middle;
            text-align: center;
            font-size: 18px;
            display: inline-flex;
            justify-content: center;
            align-items: center;

        }

        .plus {
            background: rgba(142, 195, 155, 0.2);
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