@extends('layouts.app')
@section('title', 'Dinner')
@section('content')
    <?php
        $option = 'dinner';
    ?>

    <div class="be-wrapper be-fixed-sidebar be-fixed-sidebar123" style="background-color: #fff;" >
        @include('layouts.checkout-heading', ['currentPage' => $currentPage ?? null])
        @include('layouts.catering-side-menu')
        
        <form id="menu">
            @csrf
            <div class="be-content dinner-page" id="main-option">
                <div class="main-content">
                    <div class="dinner-cafe-section py-4">
                        <div class="container-fluid buffet-main-options">
                            <div class="row mt-4">
                                <div class="col-lg-3 col-12">
                                <div class="full title-buffet">
                                    <h3>BUFFET <br> STYLE</h3>
                                </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                <div class="full inner-title">
                                    <h3 style="color: #8EC39B; font-weight: 500; font-size: 18px;">INCLUDED IN ALL FOUR OPTIONS</h3>
                                    <ul>
                                        <li>Butter & herbed roasted potatoes</li>
                                        <li>Gourmet bread rolls & condiments</li>
                                        <li>Seasonal fruit platter or salad</li>
                                    </ul>
                                </div>
                                </div>
                                <div class="col-lg-3 col-12">
                                <!--<div class="full total-users">-->
                                <!--    <img src="/assets/front/assets/img/black.png" class="img" alt="">-->
                                <!--    <h3 class="mt-3">20</h3>-->
                                <!--</div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="food-section">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-8 col-md-12 col-12 row">
                                    @if(isset($data) && isset($data['main-options']) && count($data['main-options']) > 0)
                                        <?php
                                            $count = count($data['main-options']) / 2;
                                            $exact = count($data['main-options']);
                                        ?>
                                        <div class="col-lg-6 col-md-12 col-12">
                                            @for($i=0;$i<$count;$i++)
                                                <div class="option3-section option-dinner<?= $i;?>">
                                                    <div class="row" style="margin-top: 44px;">
                                                        <div class="col-md-12">

                                                                <div class="full full-custom card" style="border:none">
                                                                    <div class="head card-header" style="background-color: #F4F4F4; border: none;">

                                                                        <div class="row">
                                                                            <div class="col-md-7">
                                                                                <h4>{{$data['main-options'][$i]['name']}}</h4>
                                                                            </div>
                                                                            <div class="col-md-4 text-center tooltip-div">
                                                                                <img src="/assets/front/assets/img/green-2.png" alt="man icon">
                                                                                <!--<p class="mb-0" style="color: #8ec39b;">$ <?=number_format($data['main-options'][$i]['price'],2)?> </p>-->
                                                                                <!--<span class="tooltiptext">Minimum Order</span>                                -->
                                                                            </div>
                                                                            <div class="col-md-1">
                                                                                <div class="box3 float-right">
                                                                                    <input class="form-check-input setup-radio check-dinner-input" type="radio" value="{{$data['main-options'][$i]['id']}}" id="flexCheckChecked" name="main-options" >
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="card-body bg-white">

                                                                            <div class="content double-column-ul">
                                                                                {!! $data['main-options'][$i]['content'] !!}
                                                                                <p class="mt-1" style="color: #8EC39B;; font-weight: 500; font-size: 13px;">Minimum People - {{$data['main-options'][$i]['group']}}</p>
                                                                            </div>



                                                                    </div>

                                                                    @if(isset($data['setup']) && count($data['setup']) > 0)

                                                                        <div class="card-footer  setup setup-{{$data['main-options'][$i]['id']}}" style="background: rgba(142, 195, 155, 0.2); border:none;">
                                                                            <div class="" id="">
                                                                                <div class="main-content">
                                                                                    <div class="dinner-cafe-section py-4">
                                                                                        
                                                                                        <div class="row">
                                                                                            <div class="col-lg-12 col-12">
                                                                                                <!-- option 1 -->
                                                                                                @if(isset($data) && isset($data['carvery']) && count($data['carvery']))
                                                                                                    <div class="option3-section dinner">
                                                                                                        <div class="row" style="margin-top: 44px;">
                                                                                                            <div class="col-12">
                                                                                                                <div class="full cavery-option">
                                                                                                                    <div class="head " style="background-color: #F4F4F4; ">
                                                                                                                        <div class="row">
                                                                                                                            <div class="col">
                                                                                                                                <h4>CARVERY</h4>
                                                                                                                                {{-- {{ dd($data['main-options'][$i]['max_option'] )  }} --}}
                                                                                                                                @php
                                                                                                                                    $maxOption = json_decode($data['main-options'][$i]['max_option']);
                                                                                                                                    
                                                                                                                                @endphp
                                                                                                                                <p>
                                                                                                                                    SELECT : 
                                                                                                                                    <span class="countSelectDinner">{{ isset( $maxOption) ?  $maxOption->carvery : '' }}</span>
                                                                                                                                </p>
                                                                                                       
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class=" height  p-5"  style="background-color: white; border: none !important; border-radius: none !important; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;"  >
                                                                                                                        @foreach($data['carvery'] as $d)
                                                                                                                            <div class="check-1">
                                                                                                                                <input class="form-check-input carvery-input" type="checkbox" value="{{$d->id}}" id="flexCheckDefault" name="carvery[]"> &nbsp; <span>{{$d->name}}
                                                                                                                            </div>
                                                                                                                        @endforeach
                                                                                                                    </div>
                                                                        
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif
                                                                
                                                                                                @if(isset($data) && isset($data['hot']) && count($data['hot']))
                                                                                                    <div class="option3-section dinner">
                                                                                                        <div class="row" style="margin-top: 44px;">
                                                                                                            <div class="col-12">
                                                                                                                <div class="full hot-option">
                                                                                                                    <div class="head " style="background-color: #F4F4F4; ">
                                                                                                                        <div class="row">
                                                                                                                            <div class="col">
                                                                                                                                <h4>HOT OPTIONS</h4>
                                                                                                                                @php
                                                                                                                                    $maxOption = json_decode($data['main-options'][$i]['max_option']);
                                                                                                                                
                                                                                                                                @endphp
                                                                                                                                 <span class="countSelectDinner">{{ isset( $maxOption) ?  $maxOption->hot : '' }}</span>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class=" height  p-5"  style="background-color: white; border: none !important; border-radius: none !important; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;"  >
                                                                                                                        @foreach($data['hot'] as $d)
                                                                                                                            <div class="check-1">
                                                                                                                                <input class="form-check-input hot-input" type="checkbox" value="{{$d->id}}" id="flexCheckDefault" name="hot[]"> &nbsp; <span>{{$d->name}}
                                                                                                                            </div>
                                                                                                                        @endforeach
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif
                                                                                            </div>
                                                                
                                                                                            <div class="col-lg-12 col-12">
                                                                                                <!-- option 1 -->
                                                                                                @if(isset($data) && isset($data['sea-food']) && count($data['sea-food']))
                                                                                                    <div class="option3-section dinner">
                                                                                                        <div class="row" style="margin-top: 44px;">
                                                                                                            <div class="col-12">
                                                                                                                <div class="full seafood-option">
                                                                                                                    <div class="head " style="background-color: #F4F4F4; ">
                                                                                                                        <div class="row">
                                                                                                                            <div class="col">
                                                                                                                                <h4>SEAFOOD OPTIONS</h4>
                                                                                                                                @php
                                                                                                                                    $maxOption = json_decode($data['main-options'][$i]['max_option']);
                                                                                                                                
                                                                                                                                @endphp
                                                                                                                                <span class="countSelectDinner">{{ isset( $maxOption) ?  $maxOption->seafood : '' }}</span>
                                                                                                
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class=" height  p-5"  style="background-color: white; border: none !important; border-radius: none !important; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;"  >
                                                                                                                        @foreach($data['sea-food'] as $d)
                                                                                                                            <div class="check-1">
                                                                                                                                <input class="form-check-input seafood-input" type="checkbox" value="{{$d->id}}" id="flexCheckDefault" name="sea-food[]"> &nbsp; <span>{{$d->name}}
                                                                                                                            </div>
                                                                                                                        @endforeach
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif
                                                                
                                                                                                @if(isset($data) && isset($data['salad']) && count($data['salad']))
                                                                                                    <div class="option3-section dinner">
                                                                                                        <div class="row" style="margin-top: 44px;">
                                                                                                            <div class="col-12">
                                                                                                                <div class="full salad-option">
                                                                                                                    <div class="head " style="background-color: #F4F4F4; ">
                                                                                                                        <div class="row">
                                                                                                                            <div class="col">
                                                                                                                                <h4>SALAD OPTIONS</h4>
                                                                                                                                @php
                                                                                                                                    $maxOption = json_decode($data['main-options'][$i]['max_option']);
                                                                                                                                
                                                                                                                                @endphp
                                                                                                                                 <span class="countSelectDinner">{{ isset( $maxOption) ?  $maxOption->salad : '' }}</span>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class=" height  p-5"  style="background-color: white; border: none !important; border-radius: none !important; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;"  >
                                                                                                                        @foreach($data['salad'] as $d)
                                                                                                                            <div class="check-1">
                                                                                                                                <input class="form-check-input salad-input" type="checkbox" value="{{$d->id}}" id="flexCheckDefault" name="salad[]"> &nbsp; <span>{{$d->name}}
                                                                                                                            </div>
                                                                                                                        @endforeach
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif
                                                                                            </div>
                                                                
                                                                                            <div class="col-lg-12 col-12">
                                                                                                <!-- option 1 -->
                                                                                                @if(isset($data) && isset($data['sweet']) && count($data['sweet']))
                                                                                                    <div class="option3-section dinner">
                                                                                                        <div class="row" style="margin-top: 44px;">
                                                                                                            <div class="col-12">
                                                                                                                <div class="full sweet-option">
                                                                                                                    <div class="head " style="background-color: #F4F4F4; ">
                                                                                                                        <div class="row">
                                                                                                                            <div class="col">
                                                                                                                                <h4>SWEET OPTIONS</h4>
                                                                                                                                @php
                                                                                                                                    $maxOption = json_decode($data['main-options'][$i]['max_option']);
                                                                                                                                
                                                                                                                                @endphp
                                                                                                                                 <span class="countSelectDinner">{{ isset( $maxOption) ?  $maxOption->sweet : '' }}</span>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class=" height  p-5"  style="background-color: white; border: none !important; border-radius: none !important; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;"  >
                                                                                                                        @foreach($data['salad'] as $d)
                                                                                                                            <div class="check-1">
                                                                                                                                <input class="form-check-input sweet-input" type="checkbox" value="{{$d->id}}" id="flexCheckDefault" name="sweet[]"> &nbsp; <span>{{$d->name}}
                                                                                                                            </div>
                                                                                                                        @endforeach
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif
                                                                                            </div>
                                                                                        </div>
                                                                                       
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <h4 class="text-center p-2" style="font-size: 26px; line-height: 45px;">PLEASE SELECT</h4>
                                                                            @foreach($data['setup'] as $s)
                                                                                @if(($data['main-options'][$i]['name'] == 'Dinner | Option 1' && ($s->name == '1. FULL BUFFET SETUP P/Person' || $s->name == '1. SERVES IN DISPOSABLE FOIL TRAY P/Person')) || 
                                                                                ($data['main-options'][$i]['name'] == 'Dinner | Option 2' && ($s->name == '2. FULL BUFFET SETUP P/Person' || $s->name == '2. SERVES IN DISPOSABLE FOIL TRAY P/Person')))
                                                                                    <div class="selection" style="justify-content: space-between; align-items: center; margin-bottom: 10px;">
                                                                                        <span class="selection-name" style="font-size: 18px; font-weight: 500; color: #8EC39B; text-transform: uppercase;">{{$s->name}}</span>
                                                                                        <span class="price-span">$ <?=number_format($s->price,2)?></span>
                                                                                        <input class="form-check-input setup-dinner-radio" type="radio" value="{{$s->id}}" id="flexCheckDefault" name="setup">&nbsp; &nbsp;
    
                                                                                    </div>
                                                                                @endif
                                                                            @endforeach
                                                                            <div class="main-selction-4  pb-5 mt-6">
                                                                                <div class="button text-center ">
                                                                                    <button type="submit" class="btn btn-outline-success view-my-selection-button" disabled> VIEW MY SELECTION</button>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    @endif
                                                                    
                                                                </div>



                                                        </div>
                                                    </div>
                                                </div>
                                            @endfor
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-12">
                                            @for($i=$count;$i<$exact;$i++)
                                                <div class="option3-section">
                                                    <div class="row" style="margin-top: 44px;">
                                                        <div class="col-md-12">
                                                            <div class="full full-custom card " style="border:none;">
                                                                <div class="head card-header" style="background-color: #F4F4F4; ">
                                                                    <div class="row">
                                                                        <div class="col-md-7">
                                                                            <h4>{{$data['main-options'][$i]['name']}}</h4>
                                                                        </div>
                                                                        <div class="col-md-4 text-center tooltip-div">
                                                                            <img src="/assets/front/assets/img/green-2.png" alt="man icon">
                                                                            <!--<p class="mb-0" style="color: #8ec39b;">$ <?=number_format($data['main-options'][$i]['price'],2)?> </p>-->
                                                                            <!--<span class="tooltiptext">Minimum Order</span>-->
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                            <div class="box3 float-right">
                                                                                <input class="form-check-input setup-radio check-dinner-input" type="radio" value="{{$data['main-options'][$i]['id']}}" id="flexCheckChecked" name="main-options" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body bg-white">
                                                                    <div class="content double-column-ul">
                                                                        {!! $data['main-options'][$i]['content'] !!}
                                                                        <p class="mt-1" style="color: #8EC39B;; font-weight: 500; font-size: 13px;">Minimum People - {{$data['main-options'][$i]['group']}}</p>
                                                                    </div>


                                                                </div>

                                                                <div class="card-footer border-0 setup setup-{{$data['main-options'][$i]['id']}}" style="background: rgba(142, 195, 155, 0.2);">
                                                                    <div class="" id="">
                                                                        <div class="main-content">
                                                                            <div class="dinner-cafe-section py-4">
                                                                                
                                                                                <div class="row">
                                                                                    <div class="col-lg-12 col-12">
                                                                                        <!-- option 1 -->
                                                                                        @if(isset($data) && isset($data['carvery']) && count($data['carvery']))
                                                                                            <div class="option3-section dinner">
                                                                                                <div class="row" style="margin-top: 44px;">
                                                                                                    <div class="col-12">
                                                                                                        <div class="full cavery-option">
                                                                                                            <div class="head " style="background-color: #F4F4F4; ">
                                                                                                                <div class="row">
                                                                                                                    <div class="col">
                                                                                                                        <h4>CARVERY</h4>
                                                                                                                        {{-- {{ dd($data['main-options'][$i]['max_option'] )  }} --}}
                                                                                                                        @php
                                                                                                                            $maxOption = json_decode($data['main-options'][$i]['max_option']);
                                                                                                                            
                                                                                                                        @endphp
                                                                                                                        <p>
                                                                                                                            SELECT : 
                                                                                                                            <span class="countSelectDinner">{{ isset( $maxOption) ?  $maxOption->carvery : '' }}</span>
                                                                                                                        </p>
                                                                                               
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class=" height  p-5"  style="background-color: white; border: none !important; border-radius: none !important; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;"  >
                                                                                                                @foreach($data['carvery'] as $d)
                                                                                                                    <div class="check-1">
                                                                                                                        <input class="form-check-input carvery-input" type="checkbox" value="{{$d->id}}" id="flexCheckDefault" name="carvery[]"> &nbsp; <span>{{$d->name}}
                                                                                                                    </div>
                                                                                                                @endforeach
                                                                                                            </div>
                                                                
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        @endif
                                                        
                                                                                        @if(isset($data) && isset($data['hot']) && count($data['hot']))
                                                                                            <div class="option3-section dinner">
                                                                                                <div class="row" style="margin-top: 44px;">
                                                                                                    <div class="col-12">
                                                                                                        <div class="full hot-option">
                                                                                                            <div class="head " style="background-color: #F4F4F4; ">
                                                                                                                <div class="row">
                                                                                                                    <div class="col">
                                                                                                                        <h4>HOT OPTIONS</h4>
                                                                                                                        @php
                                                                                                                            $maxOption = json_decode($data['main-options'][$i]['max_option']);
                                                                                                                        
                                                                                                                        @endphp
                                                                                                                         <span class="countSelectDinner">{{ isset( $maxOption) ?  $maxOption->hot : '' }}</span>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class=" height  p-5"  style="background-color: white; border: none !important; border-radius: none !important; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;"  >
                                                                                                                @foreach($data['hot'] as $d)
                                                                                                                    <div class="check-1">
                                                                                                                        <input class="form-check-input hot-input" type="checkbox" value="{{$d->id}}" id="flexCheckDefault" name="hot[]"> &nbsp; <span>{{$d->name}}
                                                                                                                    </div>
                                                                                                                @endforeach
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        @endif
                                                                                    </div>
                                                        
                                                                                    <div class="col-lg-12 col-12">
                                                                                        <!-- option 1 -->
                                                                                        @if(isset($data) && isset($data['sea-food']) && count($data['sea-food']))
                                                                                            <div class="option3-section dinner">
                                                                                                <div class="row" style="margin-top: 44px;">
                                                                                                    <div class="col-12">
                                                                                                        <div class="full seafood-option">
                                                                                                            <div class="head " style="background-color: #F4F4F4; ">
                                                                                                                <div class="row">
                                                                                                                    <div class="col">
                                                                                                                        <h4>SEAFOOD OPTIONS</h4>
                                                                                                                        @php
                                                                                                                            $maxOption = json_decode($data['main-options'][$i]['max_option']);
                                                                                                                        
                                                                                                                        @endphp
                                                                                                                        <span class="countSelectDinner">{{ isset( $maxOption) ?  $maxOption->seafood : '' }}</span>
                                                                                        
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class=" height  p-5"  style="background-color: white; border: none !important; border-radius: none !important; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;"  >
                                                                                                                @foreach($data['sea-food'] as $d)
                                                                                                                    <div class="check-1">
                                                                                                                        <input class="form-check-input seafood-input" type="checkbox" value="{{$d->id}}" id="flexCheckDefault" name="sea-food[]"> &nbsp; <span>{{$d->name}}
                                                                                                                    </div>
                                                                                                                @endforeach
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        @endif
                                                        
                                                                                        @if(isset($data) && isset($data['salad']) && count($data['salad']))
                                                                                            <div class="option3-section dinner">
                                                                                                <div class="row" style="margin-top: 44px;">
                                                                                                    <div class="col-12">
                                                                                                        <div class="full salad-option">
                                                                                                            <div class="head " style="background-color: #F4F4F4; ">
                                                                                                                <div class="row">
                                                                                                                    <div class="col">
                                                                                                                        <h4>SALAD OPTIONS</h4>
                                                                                                                        @php
                                                                                                                            $maxOption = json_decode($data['main-options'][$i]['max_option']);
                                                                                                                        
                                                                                                                        @endphp
                                                                                                                         <span class="countSelectDinner">{{ isset( $maxOption) ?  $maxOption->salad : '' }}</span>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class=" height  p-5"  style="background-color: white; border: none !important; border-radius: none !important; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;"  >
                                                                                                                @foreach($data['salad'] as $d)
                                                                                                                    <div class="check-1">
                                                                                                                        <input class="form-check-input salad-input" type="checkbox" value="{{$d->id}}" id="flexCheckDefault" name="salad[]"> &nbsp; <span>{{$d->name}}
                                                                                                                    </div>
                                                                                                                @endforeach
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        @endif
                                                                                    </div>
                                                        
                                                                                    <div class="col-lg-12 col-12">
                                                                                        <!-- option 1 -->
                                                                                        @if(isset($data) && isset($data['sweet']) && count($data['sweet']))
                                                                                            <div class="option3-section dinner">
                                                                                                <div class="row" style="margin-top: 44px;">
                                                                                                    <div class="col-12">
                                                                                                        <div class="full sweet-option">
                                                                                                            <div class="head " style="background-color: #F4F4F4; ">
                                                                                                                <div class="row">
                                                                                                                    <div class="col">
                                                                                                                        <h4>SWEET OPTIONS</h4>
                                                                                                                        @php
                                                                                                                            $maxOption = json_decode($data['main-options'][$i]['max_option']);
                                                                                                                        
                                                                                                                        @endphp
                                                                                                                         <span class="countSelectDinner">{{ isset( $maxOption) ?  $maxOption->sweet : '' }}</span>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class=" height  p-5"  style="background-color: white; border: none !important; border-radius: none !important; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;"  >
                                                                                                                @foreach($data['salad'] as $d)
                                                                                                                    <div class="check-1">
                                                                                                                        <input class="form-check-input sweet-input" type="checkbox" value="{{$d->id}}" id="flexCheckDefault" name="sweet[]"> &nbsp; <span>{{$d->name}}
                                                                                                                    </div>
                                                                                                                @endforeach
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                               
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <h4 class="text-center p-2" style="font-size: 26px; line-height: 45px;">PLEASE SELECT</h4>
                                                                    @foreach($data['setup'] as $s)
                                                                        @if(($data['main-options'][$i]['name'] == 'Dinner | Option 3' && ($s->name == '3. FULL BUFFET SETUP P/Person' || $s->name == '3. SERVES IN DISPOSABLE FOIL TRAY P/Person')) || 
                                                                                ($data['main-options'][$i]['name'] == 'Dinner | Option 4' && ($s->name == '4. FULL BUFFET SETUP P/Person' || $s->name == '4. SERVES IN DISPOSABLE FOIL TRAY P/Person')))
                                                                            <div class="selection" style="justify-content: space-between; align-items: center; margin-bottom: 10px;">
                                                                                <span class="selection-name" style="font-size: 18px; font-weight: 500; color: #8EC39B; text-transform: uppercase;">{{$s->name}}</span>
                                                                                <span class="price-span">$ <?=number_format($s->price,2)?></span>
                                                                                <input class="form-check-input setup-dinner-radio" type="radio" value="{{$s->id}}" id="flexCheckDefault" name="setup">&nbsp; &nbsp;
    
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                    <div class="main-selction-4  pb-5 mt-6">
                                                                        <div class="button text-center ">
                                                                            <button type="submit" class="btn btn-outline-success view-my-selection-button" disabled> VIEW MY SELECTION</button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endfor
                                        </div>
                                    @endif
                                </div>
                                @if(isset($data) && isset($data['beverage']) && count($data['beverage']) > 0)
                                    <div class="col-lg-4 col-md-4 col-12 option3-section">
                                        <div class="row marign-top-44">
                                            <div class="col-12">
                                                <div class="additional-section">
                                                    <div class="full full-custom p-3 pb-5 " style="background-color: white;">
                                                        <div class="bever dinner-bavver" style="margin-top: 12px;">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <h3 style="font-weight: bold;">BEVERAGES</h3>
                                                                </div>
                                                                <div class="col">
                                                                    <img src="/assets/front/assets/img/box.png" class="float-right" width="50px">
                                                                </div>
                                                            </div>

                                                            <div class="row p-3">
                                                            @foreach($data['beverage'] as $d)

                                                                    <div class="col-md-12">
                                                                        <div class="form-check mt-5">
                                                                            <input class="form-check-input" type="checkbox" value="{{$d->id}}" id="flexCheckDefault" name="beverage[]">
                                                                            <label class="form-check-label items-name" for="flexCheckDefault">
                                                                                {{$d->name}}
                                                                            </label>
                                                                            <label class="form-check-label items-price" for="flexCheckDefault">
                                                                                $ <?=number_format($d->price,2)?>
                                                                            </label>
                                                                        </div>
                                                                    </div>



                                                            @endforeach
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="row">


                                <div class="col-lg-8 col-md-12 col-12 row">
                                    <div class="main-selction-4  pb-5 mt-6">
                                        {{-- <div class="view-my-selection m-auto text-center  pb-5">
                                            <button type="button" class="btn btn-success main-option arrow-button-white w-100">ADDITIONAL OPTIONS</button>
                                        </div> --}}
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-12 col-12 row">
                                    {{-- <div class="main-selction-4  pb-5 mt-6">
                                        <div class="button text-center ">
                                            <button type="submit" class="btn btn-outline-success view-my-selection-button" disabled> VIEW MY SELECTION</button>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

           
        </form>
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

        function countSelectDinner(input){
    
            $(input).each(function (){
            
                $(this).on('change', function(){
                    limit = $(this).parent().parent().parent().find('.countSelectDinner').html();
                    countlimit = parseInt(limit);
                countLengthSelect=$(this).parent().parent().parent().parent().find('input[type="checkbox"]:checked').length;

                    //  Other case  
                if(countLengthSelect >= countlimit){
                    $(this).parent().parent().parent().parent().find('input[type="checkbox"]').not(":checked").attr("disabled",true);
                }else{
                    $(this).parent().parent().parent().parent().find('input[type="checkbox"]').not(":checked").attr("disabled",false);
                }
                })
            })
        }
        countSelectDinner('.cavery-option input[type="checkbox"]');
        countSelectDinner('.hot-option input[type="checkbox"]');
        countSelectDinner('.seafood-option input[type="checkbox"]');
        countSelectDinner('.salad-option input[type="checkbox"]');
        countSelectDinner('.sweet-option input[type="checkbox"]'); 
        });
    </script>
@endsection