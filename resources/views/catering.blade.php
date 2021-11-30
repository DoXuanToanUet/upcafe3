@extends('layouts.app')
@section('title', 'Catering')
@section('content')
<?php
    $pageName = 'catering';
?>
@include('layouts.header')

    <!-- -------------------- banner area -------------------- -->
    @if($banner->count() > 0)
        <section id="banner_area">
            <div class="banner_slider">
                @foreach($banner as $b)
                    <div class="banner_slider_items">
                        <?php
                            $img = asset('uploads/banner/'.$b->name);
                        ?>
                        <img src="{{$img}}" alt="{{$b->title}}" class="banner-img">
                    </div>
                @endforeach
            </div>
            <div class="banner_overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="banner_overlay_content boct">
                                <h1>CATERING<br>
                                    <a href="#">FOR PRIVATE & CORPORATE EVENTS</a>
                                </h1>
                            </div>
                            <div class="banner_big_arrow2 text-center">
                                <img src="images/arrowstop.png" alt="arrow">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- -------------------- promise area-------------------- -->

    <!-- --------------------  service and delivary-------------------- -->
    <section id="serAndDeli_area">
        <div class="container-fluid d-flex">
            <div class="row justify-content-center row2">
                <div class="col-3">
                    <div class="text-center services">
                        <div class="img-icon">
                            <img src="images/serviceIcon (1).png" alt="27/7">
                        </div>
                        <p class="icon-content">Online Ordering</p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="text-center services">
                        <div class="img-icon">
                            <img src="images/serviceIcon (2).png" alt="delivery">
                        </div>
                        <p class="icon-content">Delivery Available</p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="text-center services">
                        <div class="img-icon">
                            <img src="images/serviceIcon (4).png" alt="review">
                        </div>
                        <p class="icon-content">Trusted</p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="text-center services">
                        <div class="img-icon">
                            <img src="images/serviceIcon (5).png" alt="sunIcon">
                        </div>
                        <p class="icon-content">All Day Options</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- -------------------- manu area  -------------------- -->
    <section id="manu_area_manu">
        <div class="container">
        <div class="manu_title text-center">
                        <p>MADE WITH AROHA</p>
                        <h2>OUR CATERING MENU</h2>
                        <p class="mtp">Select from our wide range of options for your next special event.
	</p>
                    </div>
            <div class="row d-flex align-items-center justify-content-center mt-5">

                <div class="col-12 col-md-3 catering-menu-button">
                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">BREAKFAST</button>
                        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">AM/PM TEA</button>
                        <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">LUNCH</button>
                        <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">DINNER</button>
                    </div>
                </div>

                <div class="col-12 col-md-6 catering-menu-items position-relative">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

                            <div class="model_img1">



                                    <div class="catering-menu-image" style="background-image: url(images/breaky.png);">
                                    </div>

                                <div class="manu_overley">
                                    <a class="venobox" data-bs-toggle="modal" data-bs-target="#breakfast"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="breakfast" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen">
                                    <div class="modal-content">

                                        <i class="fa-solid fa-xmark btn-close-catering-modal"data-bs-dismiss="modal" aria-label="Close"></i>
                                        <div class="modal-body p-0 bg-dark">
                                            <div class="text-center">
                                                <img src="{{asset('images/breaky.png')}}" class="img-fluid">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <div class="model_img1">

                                    <div class="catering-menu-image" style="background-image: url(images/am-pm-tea.png);">
                                    </div>

                                <div class="manu_overley">
                                    <a class="venobox" data-bs-toggle="modal" data-bs-target="#am-pm-tea"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="am-pm-tea" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen">
                                    <div class="modal-content">

                                        <i class="fa-solid fa-xmark btn-close-catering-modal"data-bs-dismiss="modal" aria-label="Close"></i>
                                        <div class="modal-body p-0 bg-dark">
                                            <div class="text-center">
                                                <img src="{{asset('images/am-pm-tea.png')}}" class="img-fluid">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                            <div class="model_img1">

                                    <div class="catering-menu-image" style="background-image: url(images/lunch.png);">
                                    </div>

                                <div class="manu_overley">
                                    <a class="venobox"  data-bs-toggle="modal" data-bs-target="#lunch"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="lunch" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen">
                                    <div class="modal-content">

                                        <i class="fa-solid fa-xmark btn-close-catering-modal"data-bs-dismiss="modal" aria-label="Close"></i>
                                        <div class="modal-body p-0 bg-dark">
                                            <div class="text-center">
                                                <img src="{{asset('images/lunch.png')}}" class="img-fluid">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">

                            <div class="model_img1">

                                    <div class="catering-menu-image" style="background-image: url(images/dinner.png);">
                                    </div>

                                <div class="manu_overley">
                                    <a class="venobox"  data-bs-toggle="modal" data-bs-target="#dinner"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="dinner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen">
                                    <div class="modal-content">

                                        <i class="fa-solid fa-xmark btn-close-catering-modal"data-bs-dismiss="modal" aria-label="Close"></i>
                                        <div class="modal-body p-0 bg-dark">
                                            <div class="text-center">
                                                <img src="{{asset('images/dinner.png')}}" class="img-fluid">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-island" role="tabpanel" aria-labelledby="v-pills-island-tab">

                            <div class="model_img1">

                                    <div class="catering-menu-image" style="background-image: url(images/dinner.png);">
                                    </div>

                                <div class="manu_overley">
                                    <a class="venobox"  data-bs-toggle="modal" data-bs-target="#dinner"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="dinner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen">
                                    <div class="modal-content">

                                        <i class="fa-solid fa-xmark btn-close-catering-modal"data-bs-dismiss="modal" aria-label="Close"></i>
                                        <div class="modal-body p-0 bg-dark">
                                            <div class="text-center">
                                                <img src="{{asset('images/dinner.png')}}" class="img-fluid">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-graze" role="tabpanel" aria-labelledby="v-pills-graze-tab">

                            <div class="model_img1">

                                    <div class="catering-menu-image" style="background-image: url(images/dinner.png);">
                                    </div>

                                <div class="manu_overley">
                                    <a class="venobox"  data-bs-toggle="modal" data-bs-target="#dinner"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="dinner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen">
                                    <div class="modal-content">

                                        <i class="fa-solid fa-xmark btn-close-catering-modal"data-bs-dismiss="modal" aria-label="Close"></i>
                                        <div class="modal-body p-0 bg-dark">
                                            <div class="text-center">
                                                <img src="{{asset('images/dinner.png')}}" class="img-fluid">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-funeral" role="tabpanel" aria-labelledby="v-pills-funeral-tab">

                            <div class="model_img1">

                                    <div class="catering-menu-image" style="background-image: url(images/dinner.png);">
                                    </div>

                                <div class="manu_overley">
                                    <a class="venobox"  data-bs-toggle="modal" data-bs-target="#dinner"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="dinner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen">
                                    <div class="modal-content">

                                        <i class="fa-solid fa-xmark btn-close-catering-modal"data-bs-dismiss="modal" aria-label="Close"></i>
                                        <div class="modal-body p-0 bg-dark">
                                            <div class="text-center">
                                                <img src="{{asset('images/dinner.png')}}" class="img-fluid">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-funeral" role="tabpanel" aria-labelledby="v-pills-funeral-tab">

                            <div class="model_img1">

                                    <div class="catering-menu-image" style="background-image: url(images/dinner.png);">
                                    </div>

                                <div class="manu_overley">
                                    <a class="venobox"  data-bs-toggle="modal" data-bs-target="#dinner"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="dinner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen">
                                    <div class="modal-content">

                                        <i class="fa-solid fa-xmark btn-close-catering-modal"data-bs-dismiss="modal" aria-label="Close"></i>
                                        <div class="modal-body p-0 bg-dark">
                                            <div class="text-center">
                                                <img src="{{asset('images/dinner.png')}}" class="img-fluid">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-hight-tea" role="tabpanel" aria-labelledby="v-pills-hight-tea-tab">

                            <div class="model_img1">

                                    <div class="catering-menu-image" style="background-image: url(images/dinner.png);">
                                    </div>

                                <div class="manu_overley">
                                    <a class="venobox"  data-bs-toggle="modal" data-bs-target="#dinner"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="dinner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen">
                                    <div class="modal-content">

                                        <i class="fa-solid fa-xmark btn-close-catering-modal"data-bs-dismiss="modal" aria-label="Close"></i>
                                        <div class="modal-body p-0 bg-dark">
                                            <div class="text-center">
                                                <img src="{{asset('images/dinner.png')}}" class="img-fluid">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-patters" role="tabpanel" aria-labelledby="v-pills-patters-tab">

                            <div class="model_img1">

                                    <div class="catering-menu-image" style="background-image: url(images/dinner.png);">
                                    </div>

                                <div class="manu_overley">
                                    <a class="venobox"  data-bs-toggle="modal" data-bs-target="#dinner"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="dinner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen">
                                    <div class="modal-content">

                                        <i class="fa-solid fa-xmark btn-close-catering-modal"data-bs-dismiss="modal" aria-label="Close"></i>
                                        <div class="modal-body p-0 bg-dark">
                                            <div class="text-center">
                                                <img src="{{asset('images/dinner.png')}}" class="img-fluid">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-patters" role="tabpanel" aria-labelledby="v-pills-patters-tab">

                            <div class="model_img1">

                                    <div class="catering-menu-image" style="background-image: url(images/dinner.png);">
                                    </div>

                                <div class="manu_overley">
                                    <a class="venobox"  data-bs-toggle="modal" data-bs-target="#dinner"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="dinner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen">
                                    <div class="modal-content">

                                        <i class="fa-solid fa-xmark btn-close-catering-modal"data-bs-dismiss="modal" aria-label="Close"></i>
                                        <div class="modal-body p-0 bg-dark">
                                            <div class="text-center">
                                                <img src="{{asset('images/dinner.png')}}" class="img-fluid">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-xmas" role="tabpanel" aria-labelledby="v-pills-xmas-tab">

                            <div class="model_img1">

                                    <div class="catering-menu-image" style="background-image: url(images/dinner.png);">
                                    </div>

                                <div class="manu_overley">
                                    <a class="venobox"  data-bs-toggle="modal" data-bs-target="#dinner"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="dinner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen">
                                    <div class="modal-content">

                                        <i class="fa-solid fa-xmark btn-close-catering-modal"data-bs-dismiss="modal" aria-label="Close"></i>
                                        <div class="modal-body p-0 bg-dark">
                                            <div class="text-center">
                                                <img src="{{asset('images/dinner.png')}}" class="img-fluid">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    {{--                    Order Button area--}}

                    <div class="row">
                        <div class="col-md-12 text-center cafe-page-order-button">
                            <a class="btn btn-primary order-now" href="/catering/breakfast" role="button">ORDER NOW</a>
                        </div>
                    </div>


                </div>

                <div class="col-md-3 catering-menu-button more-menu-block">
                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link" id="v-pills-island-tab" data-bs-toggle="pill" data-bs-target="#v-pills-island" type="button" role="tab" aria-controls="v-pills-island" aria-selected="true">ISLAND</button>
                        <button class="nav-link" id="v-pills-graze-tab" data-bs-toggle="pill" data-bs-target="#v-pills-graze" type="button" role="tab" aria-controls="v-pills-graze" aria-selected="false">GRAZE</button>
                        <button class="nav-link" id="v-pills-funeral-tab" data-bs-toggle="pill" data-bs-target="#v-pills-funeral" type="button" role="tab" aria-controls="v-pills-funeral" aria-selected="false">FUNERAL</button>
                        <button class="nav-link" id="v-pills-hight-tea-tab" data-bs-toggle="pill" data-bs-target="#v-pills-hight-tea" type="button" role="tab" aria-controls="v-pills-hight-tea" aria-selected="false">HIGH TEA</button>
                        <button class="nav-link" id="v-pills-patters-tab" data-bs-toggle="pill" data-bs-target="#v-pills-patters" type="button" role="tab" aria-controls="v-pills-patters" aria-selected="false">PATTERS</button>
                        <button class="nav-link" id="v-pills-xmas-tab" data-bs-toggle="pill" data-bs-target="#v-pills-xmas" type="button" role="tab" aria-controls="v-pills-xmas" aria-selected="false">XMAS THEMED</button>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <!-- -------------------- gallery area -------------------- -->
    @if($gallery->count() > 0)
        <section id="slide_gal_area">
            <div class="container-fluid">
            <div class="slide_gel_title text-center">
                            <p>NORMAL DAY AT THE OFFICE</p>
                            <h2>UP CAFE IN ACTION</h2>
                        </div>
                        <div class="social">
                <a href="https://www.facebook.com/upcafeakl" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com/up_cafe/?hl=en" target="_blank"><i class="fa fa-instagram"></i></a>
            </div>
                <div class="gal_slide_view">
                    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
                    <div class="elfsight-app-52c3bf59-a602-44c6-9d3b-481cb1263955"></div>

                </div>
            </div>
        </section>
    @endif
    @include('testimonials-contact')
    @include('layouts.footer')
@endsection