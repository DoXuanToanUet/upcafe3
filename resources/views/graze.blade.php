@extends('layouts.app')
@section('title', 'Graze')
@section('content')
    <?php
        $option = 'graze';
    ?>

    <div class="be-wrapper be-fixed-sidebar be-fixed-sidebar123" style="background-color: #fff;" >
        @include('layouts.checkout-heading', ['currentPage' => $currentPage ?? null])
        @include('layouts.catering-side-menu')
        
        <div class="be-content">
            <div class="main-content">
                <form class="row" id="menu">
                    @csrf
                    <div class="food-section" style="margin-top: 44px;">
                        <div class="container-fluid">

                            <hr>
                            {{--                        GRAZE CARD START--}}
                            <div class="row mt-5 graze-container">
                                <div class="col-md-12">
                                    <h2 class="fw-bold">
                                        GRAZE <small>(minimum order 25 people, pricing available on request)</small>
                                    </h2>
                                </div>

                                @foreach($data['graze'] as $graze)
                                    <div class="col-md-4 ">
                                        <div class="title doll mb-5">

                                            <div class="card"
                                                 style="margin-top: 15px; border: none !important; border-radius: 0 !important; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                                                <div class="card-header p-4 d-flex justify-content-between"
                                                     style="border: none !important; background: rgb(232 232 232);">
                                                    <h4>{!! $graze->name !!}</h4>
                                                    @if($graze->price != null)
                                                        @if($graze->price >= 0)
                                                            <span class="price-span">$ {{ number_format($graze->price, 2) }} pp</span>
                                                        @endif
                                                        <input class="form-check-input setup-buffet-radio graze"
                                                               type="radio" value="{{ $graze->id }}"
                                                               id="flexCheckDefault" name="graze">
                                                    @else
                                                        <input type="radio" class="d-none graze"
                                                               value="{{ $graze->id }}"
                                                               id="flexCheckDefault" name="graze">
                                                    @endif
                                                </div>
                                                <div class="card-body p-4">
                                                    {!! $graze->content !!}
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{--                        GRAZE CARD END--}}
   
                        </div>

                    </div>

                    <div class="container-fluid main-selction-4  py-5">
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
    @media screen and (max-width:767px) {
        .be-left-sidebar .sidebar-elements{
            margin-top: -9px !important;
        }
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

@section('scripts')
    <script>
        $('body').on('change', '.form-check-input', function () {
            if ($('.form-check-input:checked').length > 0) {
                if ($('.view-my-selection-button').prop('disabled')) {
                    $('.view-my-selection-button').prop('disabled', false);
                }
            } else {
                $('.view-my-selection-button').prop('disabled', true);
            }
        });
    </script>
@endsection