@extends('layouts.app')

@section('title', 'FUNERAL')

@section('content')

    <?php

    $option = 'funeral';

    ?>



    <div class="be-wrapper be-fixed-sidebar be-fixed-sidebar123" style="background-color: #D1E6D7;">

        @include('layouts.checkout-heading', ['currentPage' => $currentPage ?? null])

        @include('layouts.catering-side-menu')



        <div class="be-content">

            <div class="main-content">

                <form class="row" id="menu">

                    @csrf

                    <div class="food-section" style="margin-top: 44px;">

                        <div class="container-fluid">



                            <div class="row mt-5 funeral-container">

                                <div class="col-md-12">

                                    <h2 class="fw-bold">

                                        FUNERAL <small>(minimum order 25 people, individual packaging available)</small>

                                    </h2>

                                </div>



                                @foreach($data['funeral'] as $key => $funeral)

                                    <div class="col-md-4 ">

                                        <div class="title doll mb-5">



                                            <div class="card"

                                                 style="margin-top: 15px; border: none ; border-radius: 0 !important; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                                                <div class="card-header p-4 d-flex justify-content-between"

                                                     style="border: none !important; background: rgb(232 232 232);">

                                                    <h4>{!! $funeral->name !!}</h4>

                                                    @if($funeral->price != null)

                                                        @if($funeral->price >= 0)

                                                            <span class="price-span">$ {{ number_format($funeral->price, 2) }} pp</span>

                                                        @endif

                                                    @endif

                                                    <input class="form-check-input setup-buffet-radio funeral check-more-input"

                                                           type="radio" value="{{ $funeral->id }}"

                                                           id="flexCheckDefault" name="funeral">

                                                </div>

                                                <div class="card-body p-4">

                                                    {!! $funeral->content !!}

                                                    @if(array_key_exists('funeral-option-' . ($key+1) . '-setup', $data))

                                                        @foreach($data['funeral-option-' . ($key+1) . '-setup'] as $setup)

                                                            <div class="selection"

                                                                 style="justify-content: space-between; align-items: center; margin-bottom: 10px;">

                                                <span class="selection-name"

                                                      style="font-size: 16px; color: #000; text-transform:capitalize;">{!! $setup->name !!}</span>

                                                                <span class="price-span">$ {{ number_format($setup->price, 2) }} pp</span>

                                                                <input class="form-check-input setup-buffet-radio funeral-setup "

                                                                       type="radio"

                                                                       value="{{ $setup->id }}" id="flexCheckDefault"

                                                                       name="funeral-setup">

                                                            </div>

                                                        @endforeach

                                                    @endif

                                                </div>



                                            </div>

                                        </div>

                                    </div>

                                @endforeach

                            </div>

                           



                            





                        </div>



                    </div>



                    <div class="container-fluid main-selction-4 center-button  py-5">

                        <div class="row">

                            <div class="view-my-selection mt-4 pb-5 ">

                                <button type="submit" class="btn btn-outline-success view-my-selection-button float-end"

                                        disabled=""> VIEW MY SELECTION

                                </button>



                            </div>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>



    <?php

    $inner = true;

    ?>

    <style>

        @media screen and (max-width: 767px) {

            .be-left-sidebar .sidebar-elements {

                margin-top: -9px !important;

            }

        }

    </style>

@endsection



@section('scripts')

    <script>

        $(function () {

            const $body = $('body');

            $body.on('change', '.funeral-setup', function (event) {

                $('.funeral').prop('checked', false);

                $(event.target).closest('.card').find('.funeral').prop('checked', true);

            });

            $body.on('change', '.form-check-input', function () {

                if ($('.form-check-input:checked').length > 0) {

                    if ($('.view-my-selection-button').prop('disabled')) {

                        $('.view-my-selection-button').prop('disabled', false);

                    }

                } else {

                    $('.view-my-selection-button').prop('disabled', true);

                }

            });

        });

    </script>

@endsection