@extends('layouts.app')
@section('title', 'Island')
@section('content')
    <?php
        $option = 'island';
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

                            {{-- ISLAND CARD START--}}
                            <div class="row island-container">
                                <div class="col-md-12">
                                    <h2 class="fw-bold">
                                        ISLAND <small>(minimum order 35 people)</small>
                                    </h2>
                                </div>

                                @foreach($data['island'] as $island)
                                    <div class="col-md-4">
                                        <div class="title doll mb-5">

                                            <div class="card"
                                                 style="margin-top: 15px; border: none !important; border-radius: 0 !important; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                                                <div class="card-header p-4 d-flex justify-content-between"
                                                     style="border: none !important; background: rgb(232 232 232);">
                                                    <h4>{!! $island->name !!} <small>(Minimum order {{ $island->group }}
                                                            people)</small></h4>
                                                    @if($island->price != null)
                                                        @if($island->price >= 0)
                                                            <span class="price-span">$ {{ number_format($island->price, 2) }} pp</span>
                                                        @endif
                                                    @endif
                                                    <input class="form-check-input setup-buffet-radio island"
                                                           type="radio" value="{{ $island->id }}"
                                                           id="flexCheckDefault" name="island">
                                                </div>
                                                <div class="card-body">
                                                    {!! $island->content !!}
                                                    <div class="card_end_icon">
                                                        @if(array_key_exists('island-' . Str::slug($island->name, '-') . '-setup', $data))
                                                            @foreach($data['island-' . Str::slug($island->name, '-') . '-setup'] as $islandSetup)
                                                                <div class="selection selection-island island-{{ $island->id }} d-none"
                                                                     style="justify-content: space-between; align-items: center; margin-bottom: 10px;">
                                                            <span class="selection-name"
                                                                  style="font-size: 16px; color: #000; text-transform:capitalize;">{!! $islandSetup->name !!}</span>
                                                                    @if($islandSetup->price != null)
                                                                        @if($islandSetup->price >= 0)
                                                                            <span class="price-span">$ {{ number_format($islandSetup->price, 2) }} pp</span>
                                                                        @endif
                                                                        <input class="form-check-input setup-buffet-radio island-setup"
                                                                               type="radio"
                                                                               value="{{ $islandSetup->id }}"
                                                                               id="flexCheckDefault"
                                                                               name="island-setup">
                                                                    @endif

                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                                @if(array_key_exists('island-' . Str::slug($island->name, '-') . '-additional-options', $data))
                                                    <div class="setup setup-6 setup-buffet-6 setup-island island-{{ $island->id }} d-none"
                                                         style="display: block;">

                                                        <h5 class="text-center p-2 fw-bold" style="font-size: 20px;">
                                                            ADDITIONAL
                                                            OPTIONS </h5>
                                                        <div class="card-footer border-0"
                                                             style="background: rgba(142, 195, 155, 0.2);">
                                                            <div class="if-select-buffet">
                                                                @foreach($data['island-' . Str::slug($island->name, '-') . '-additional-options'] as $additionalOptions)
                                                                    <div class="selection"
                                                                         style="justify-content: space-between; align-items: center; margin-bottom: 10px;">
                                                        <span class="selection-name"
                                                              style="font-size: 18px; color: #8EC39B; text-transform: uppercase;">{!! $additionalOptions->name !!}</span>
                                                                        <span class="price-span">$ {{ number_format($additionalOptions->price, 2) }} pp</span>
                                                                        <input class="form-check-input setup-buffet-radio island-options"
                                                                               type="checkbox"
                                                                               value="{{ $additionalOptions->id }}"
                                                                               id="flexCheckDefault"
                                                                               name="island-options[]">
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>

                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                            {{-- ISLAND CARD END --}}
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