@extends('frontend.layout.app')
@section('content')


<section id="port" class="p_4">
    <div class="container-xl">
        <div class="row port_1 text-center">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <h1 class="font_60">Need Customize Painting?</h1>
                <span class="icon_line col_pink"><i class="fa fa-square-o"></i></span>
            </div>
        </div>

    </div>
</section>

<section>
    <div class="container text-center pb-5">
        {{-- <h2>Need Customize Painting?</h2> --}}
        <h2>Share your thoughts and we will give it a shape!</h2>
        <p class="m-0 m-auto w-75">
            We shall be very happy to get your customize order. Do include all the required details about your painting and rest assures to get the appropriate response.
        </p>
        <div class="m-0 m-auto w-75">
            <form action="{{ route('paintingStore') }}" method="POST">
                @csrf
                <div class="contact_2l1 mt-2 row">
                    <div class="col-md-12 mt-4">
                        <div class="contact_2l1i">
                            <input class="form-control" placeholder="Name" name="name" type="text" required>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="contact_2l1i">
                            <input class="form-control" placeholder="Address" name="address" type="text" required>
                        </div>
                    </div>
                    <div class="col-md-6 mt-4">
                        <div class="contact_2l1i">
                            <input class="form-control" placeholder="Email Address" name="email" type="email" required>
                        </div>
                    </div>
                    <div class="col-md-6 mt-4">
                        <div class="contact_2l1i">
                            <input class="form-control" placeholder="Phone" name="phone" type="text" required>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="contact_2l1i">
                            <input class="form-control" placeholder="Subject" name="subject" type="text">
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="contact_2l1i">
                            <textarea placeholder="Comment" class="form-control form_text" name="comment"></textarea>
                        </div>
                    </div>
                    <div>
                        <button class="btn button mt-3 text-uppercase ps-4 pe-4 pt-3 pb-3">Order Now</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</section>
{{-- <section id="folio" class="p_4">
    <div class="container-fluid">
        <div class="row folio_1 mt-4">
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <div class="folio_1i row">
                        <div class="col-md-3">
                            <div class="folio_main clearfix">
                                <div class="folio_1im position-relative clearfix">
                                    <div class="folio_1im1 clearfix">
                                        <a href="#"><img src="frontend/img/5.jpg" data-bs-target="#exampleModal"
                                                data-bs-toggle="modal" class="w-100" height="240" alt="abc"></a>
                                    </div>
                                    <div
                                        class="folio_1im2 pt-5 position-absolute top-0 h-100 text-center w-100 clearfix">
                                        <ul class="mb-0">
                                            <li class="d-inline-block fs-5 me-1"><a data-bs-target="#exampleModal"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a>
                                            </li>
                                            <li class="d-inline-block fs-5"><a data-bs-target="#exampleModal"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div
                                        class="folio_1im3  p-3 position-absolute bottom-0  text-center w-100 clearfix">
                                        <h6><a class="text-light" data-bs-target="#exampleModal"
                                                data-bs-toggle="modal" href="#">MASTER PIECE</a></h6>
                                        <h6 class="mb-0 text-white font_14">People, Still Life</h6>
                                    </div>

                                </div>
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-black" id="exampleModalLabel">Art Web
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="frontend/img/5.jpg" class="w-100" alt="abc">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn text-white bg_pink">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="folio_main clearfix mt-4">
                                <div class="folio_1im position-relative clearfix">
                                    <div class="folio_1im1 clearfix">
                                        <a href="#"><img src="frontend/img/8.jpg" data-bs-target="#exampleModal1"
                                                data-bs-toggle="modal" class="w-100" height="410" alt="abc"></a>
                                    </div>
                                    <div
                                        class="folio_1im2 pt-5 position-absolute top-0 h-100 text-center w-100 clearfix">
                                        <ul class="mb-0">
                                            <li class="d-inline-block fs-5 me-1"><a data-bs-target="#exampleModal1"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a>
                                            </li>
                                            <li class="d-inline-block fs-5"><a data-bs-target="#exampleModal1"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div
                                        class="folio_1im3  p-3 position-absolute bottom-0  text-center w-100 clearfix">
                                        <h6><a class="text-light" data-bs-target="#exampleModal1"
                                                data-bs-toggle="modal" href="#">MASTER PIECE</a></h6>
                                        <h6 class="mb-0 text-white font_14">People, Still Life</h6>
                                    </div>

                                </div>
                                <div class="modal fade" id="exampleModal1" tabindex="-1"
                                    aria-labelledby="exampleModal1Label" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-black" id="exampleModal1Label">Art Web
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="frontend/img/8.jpg" class="w-100" alt="abc">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn text-white bg_pink">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="folio_main clearfix">
                                <div class="folio_1im position-relative clearfix">
                                    <div class="folio_1im1 clearfix">
                                        <a href="#"><img src="frontend/img/9.jpg" data-bs-target="#exampleModal2"
                                                data-bs-toggle="modal" class="w-100" height="410" alt="abc"></a>
                                    </div>
                                    <div
                                        class="folio_1im2 pt-5 position-absolute top-0 h-100 text-center w-100 clearfix">
                                        <ul class="mb-0">
                                            <li class="d-inline-block fs-5 me-1"><a data-bs-target="#exampleModal2"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a>
                                            </li>
                                            <li class="d-inline-block fs-5"><a data-bs-target="#exampleModal2"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div
                                        class="folio_1im3  p-3 position-absolute bottom-0  text-center w-100 clearfix">
                                        <h6><a class="text-light" data-bs-target="#exampleModal2"
                                                data-bs-toggle="modal" href="#">MASTER PIECE</a></h6>
                                        <h6 class="mb-0 text-white font_14">People, Still Life</h6>
                                    </div>

                                </div>
                                <div class="modal fade" id="exampleModal2" tabindex="-1"
                                    aria-labelledby="exampleModal2Label" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-black" id="exampleModal2Label">Art Web
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="frontend/img/9.jpg" class="w-100" alt="abc">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn text-white bg_pink">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="folio_main clearfix mt-4">
                                <div class="folio_1im position-relative clearfix">
                                    <div class="folio_1im1 clearfix">
                                        <a href="#"><img src="frontend/img/10.jpg" data-bs-target="#exampleModal3"
                                                data-bs-toggle="modal" class="w-100" height="410" alt="abc"></a>
                                    </div>
                                    <div
                                        class="folio_1im2 pt-5 position-absolute top-0 h-100 text-center w-100 clearfix">
                                        <ul class="mb-0">
                                            <li class="d-inline-block fs-5 me-1"><a data-bs-target="#exampleModal3"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a>
                                            </li>
                                            <li class="d-inline-block fs-5"><a data-bs-target="#exampleModal3"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div
                                        class="folio_1im3  p-3 position-absolute bottom-0  text-center w-100 clearfix">
                                        <h6><a class="text-light" data-bs-target="#exampleModal3"
                                                data-bs-toggle="modal" href="#">MASTER PIECE</a></h6>
                                        <h6 class="mb-0 text-white font_14">People, Still Life</h6>
                                    </div>

                                </div>
                                <div class="modal fade" id="exampleModal3" tabindex="-1"
                                    aria-labelledby="exampleModal3Label" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-black" id="exampleModal3Label">Art Web
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="frontend/img/10.jpg" class="w-100" alt="abc">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn text-white bg_pink">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="folio_main clearfix">
                                <div class="folio_1im position-relative clearfix">
                                    <div class="folio_1im1 clearfix">
                                        <a href="#"><img src="frontend/img/6.jpg" data-bs-target="#exampleModal4"
                                                data-bs-toggle="modal" class="w-100" height="240" alt="abc"></a>
                                    </div>
                                    <div
                                        class="folio_1im2 pt-5 position-absolute top-0 h-100 text-center w-100 clearfix">
                                        <ul class="mb-0">
                                            <li class="d-inline-block fs-5 me-1"><a data-bs-target="#exampleModal4"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a>
                                            </li>
                                            <li class="d-inline-block fs-5"><a data-bs-target="#exampleModal4"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div
                                        class="folio_1im3  p-3 position-absolute bottom-0  text-center w-100 clearfix">
                                        <h6><a class="text-light" data-bs-target="#exampleModal4"
                                                data-bs-toggle="modal" href="#">MASTER PIECE</a></h6>
                                        <h6 class="mb-0 text-white font_14">People, Still Life</h6>
                                    </div>

                                </div>
                                <div class="modal fade" id="exampleModal4" tabindex="-1"
                                    aria-labelledby="exampleModal4Label" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-black" id="exampleModal4Label">Art Web
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="frontend/img/6.jpg" class="w-100" alt="abc">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn text-white bg_pink">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="folio_main mt-4 clearfix">
                                <div class="folio_1im position-relative clearfix">
                                    <div class="folio_1im1 clearfix">
                                        <a href="#"><img src="frontend/img/7.jpg" data-bs-target="#exampleModal5"
                                                data-bs-toggle="modal" class="w-100" height="240" alt="abc"></a>
                                    </div>
                                    <div
                                        class="folio_1im2 pt-5 position-absolute top-0 h-100 text-center w-100 clearfix">
                                        <ul class="mb-0">
                                            <li class="d-inline-block fs-5 me-1"><a data-bs-target="#exampleModal5"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a>
                                            </li>
                                            <li class="d-inline-block fs-5"><a data-bs-target="#exampleModal5"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div
                                        class="folio_1im3  p-3 position-absolute bottom-0  text-center w-100 clearfix">
                                        <h6><a class="text-light" data-bs-target="#exampleModal5"
                                                data-bs-toggle="modal" href="#">MASTER PIECE</a></h6>
                                        <h6 class="mb-0 text-white font_14">People, Still Life</h6>
                                    </div>

                                </div>
                                <div class="modal fade" id="exampleModal5" tabindex="-1"
                                    aria-labelledby="exampleModal5Label" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-black" id="exampleModal5Label">Art Web
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="frontend/img/7.jpg" class="w-100" alt="abc">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn text-white bg_pink">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="folio_main mt-4 clearfix">
                                <div class="folio_1im position-relative clearfix">
                                    <div class="folio_1im1 clearfix">
                                        <a href="#"><img src="frontend/img/11.jpg" data-bs-target="#exampleModal6"
                                                data-bs-toggle="modal" class="w-100" height="240" alt="abc"></a>
                                    </div>
                                    <div
                                        class="folio_1im2 pt-5 position-absolute top-0 h-100 text-center w-100 clearfix">
                                        <ul class="mb-0">
                                            <li class="d-inline-block fs-5 me-1"><a data-bs-target="#exampleModal6"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a>
                                            </li>
                                            <li class="d-inline-block fs-5"><a data-bs-target="#exampleModal6"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div
                                        class="folio_1im3  p-3 position-absolute bottom-0  text-center w-100 clearfix">
                                        <h6><a class="text-light" data-bs-target="#exampleModal6"
                                                data-bs-toggle="modal" href="#">MASTER PIECE</a></h6>
                                        <h6 class="mb-0 text-white font_14">People, Still Life</h6>
                                    </div>

                                </div>
                                <div class="modal fade" id="exampleModal6" tabindex="-1"
                                    aria-labelledby="exampleModal6Label" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-black" id="exampleModal6Label">Art Web
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="frontend/img/11.jpg" class="w-100" alt="abc">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn text-white bg_pink">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="folio_main clearfix">
                                <div class="folio_1im position-relative clearfix">
                                    <div class="folio_1im1 clearfix">
                                        <a href="#"><img src="frontend/img/12.jpg" data-bs-target="#exampleModal7"
                                                data-bs-toggle="modal" class="w-100" height="410" alt="abc"></a>
                                    </div>
                                    <div
                                        class="folio_1im2 pt-5 position-absolute top-0 h-100 text-center w-100 clearfix">
                                        <ul class="mb-0">
                                            <li class="d-inline-block fs-5 me-1"><a data-bs-target="#exampleModal7"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a>
                                            </li>
                                            <li class="d-inline-block fs-5"><a data-bs-target="#exampleModal7"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div
                                        class="folio_1im3  p-3 position-absolute bottom-0  text-center w-100 clearfix">
                                        <h6><a class="text-light" data-bs-target="#exampleModal7"
                                                data-bs-toggle="modal" href="#">MASTER PIECE</a></h6>
                                        <h6 class="mb-0 text-white font_14">People, Still Life</h6>
                                    </div>

                                </div>
                                <div class="modal fade" id="exampleModal7" tabindex="-1"
                                    aria-labelledby="exampleModal7Label" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-black" id="exampleModal7Label">Art Web
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="frontend/img/12.jpg" class="w-100" alt="abc">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn text-white bg_pink">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="folio_main mt-4 clearfix">
                                <div class="folio_1im position-relative clearfix">
                                    <div class="folio_1im1 clearfix">
                                        <a href="#"><img src="frontend/img/13.jpg" data-bs-target="#c5"
                                                data-bs-toggle="modal" class="w-100" height="240" alt="abc"></a>
                                    </div>
                                    <div
                                        class="folio_1im2 pt-5 position-absolute top-0 h-100 text-center w-100 clearfix">
                                        <ul class="mb-0">
                                            <li class="d-inline-block fs-5 me-1"><a data-bs-target="#exampleModal8"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a>
                                            </li>
                                            <li class="d-inline-block fs-5"><a data-bs-target="#exampleModal8"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div
                                        class="folio_1im3  p-3 position-absolute bottom-0  text-center w-100 clearfix">
                                        <h6><a class="text-light" data-bs-target="#exampleModal8"
                                                data-bs-toggle="modal" href="#">MASTER PIECE</a></h6>
                                        <h6 class="mb-0 text-white font_14">People, Still Life</h6>
                                    </div>

                                </div>
                                <div class="modal fade" id="exampleModal8" tabindex="-1"
                                    aria-labelledby="exampleModal5Label8" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-black" id="exampleModal5Label8">Art Web
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="frontend/img/13.jpg" class="w-100" alt="abc">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn text-white bg_pink">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="tab-pane" id="profile">
                    <div class="folio_1i row">
                        <div class="col-md-3">
                            <div class="folio_main clearfix">
                                <div class="folio_1im position-relative clearfix">
                                    <div class="folio_1im1 clearfix">
                                        <a href="#"><img src="frontend/img/6.jpg" data-bs-target="#exampleModal9"
                                                data-bs-toggle="modal" class="w-100" height="240" alt="abc"></a>
                                    </div>
                                    <div
                                        class="folio_1im2 pt-5 position-absolute top-0 h-100 text-center w-100 clearfix">
                                        <ul class="mb-0">
                                            <li class="d-inline-block fs-5 me-1"><a data-bs-target="#exampleModal9"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a>
                                            </li>
                                            <li class="d-inline-block fs-5"><a data-bs-target="#exampleModal9"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div
                                        class="folio_1im3  p-3 position-absolute bottom-0  text-center w-100 clearfix">
                                        <h6><a class="text-light" data-bs-target="#exampleModal9"
                                                data-bs-toggle="modal" href="#">MASTER PIECE</a></h6>
                                        <h6 class="mb-0 text-white font_14">People, Still Life</h6>
                                    </div>

                                </div>
                                <div class="modal fade" id="exampleModal9" tabindex="-1"
                                    aria-labelledby="exampleModal9Label" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-black" id="exampleModal9Label">Art Web
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="frontend/img/6.jpg" class="w-100" alt="abc">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn text-white bg_pink">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="folio_main mt-4 clearfix">
                                <div class="folio_1im position-relative clearfix">
                                    <div class="folio_1im1 clearfix">
                                        <a href="#"><img src="frontend/img/7.jpg" data-bs-target="#exampleModal10"
                                                data-bs-toggle="modal" class="w-100" height="240" alt="abc"></a>
                                    </div>
                                    <div
                                        class="folio_1im2 pt-5 position-absolute top-0 h-100 text-center w-100 clearfix">
                                        <ul class="mb-0">
                                            <li class="d-inline-block fs-5 me-1"><a data-bs-target="#exampleModal10"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a>
                                            </li>
                                            <li class="d-inline-block fs-5"><a data-bs-target="#exampleModal10"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div
                                        class="folio_1im3  p-3 position-absolute bottom-0  text-center w-100 clearfix">
                                        <h6><a class="text-light" data-bs-target="#exampleModal10"
                                                data-bs-toggle="modal" href="#">MASTER PIECE</a></h6>
                                        <h6 class="mb-0 text-white font_14">People, Still Life</h6>
                                    </div>

                                </div>
                                <div class="modal fade" id="exampleModal10" tabindex="-1"
                                    aria-labelledby="exampleModal10Label" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-black" id="exampleModal10Label">Art Web
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="frontend/img/7.jpg" class="w-100" alt="abc">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn text-white bg_pink">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="folio_main clearfix">
                                <div class="folio_1im position-relative clearfix">
                                    <div class="folio_1im1 clearfix">
                                        <a href="#"><img src="frontend/img/8.jpg" data-bs-target="#exampleModal11"
                                                data-bs-toggle="modal" class="w-100" height="410" alt="abc"></a>
                                    </div>
                                    <div
                                        class="folio_1im2 pt-5 position-absolute top-0 h-100 text-center w-100 clearfix">
                                        <ul class="mb-0">
                                            <li class="d-inline-block fs-5 me-1"><a data-bs-target="#exampleModal11"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a>
                                            </li>
                                            <li class="d-inline-block fs-5"><a data-bs-target="#exampleModal11"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div
                                        class="folio_1im3  p-3 position-absolute bottom-0  text-center w-100 clearfix">
                                        <h6><a class="text-light" data-bs-target="#exampleModal11"
                                                data-bs-toggle="modal" href="#">MASTER PIECE</a></h6>
                                        <h6 class="mb-0 text-white font_14">People, Still Life</h6>
                                    </div>

                                </div>
                                <div class="modal fade" id="exampleModal11" tabindex="-1"
                                    aria-labelledby="exampleModal11Label" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-black" id="exampleModal11Label">Art Web
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="frontend/img/8.jpg" class="w-100" alt="abc">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn text-white bg_pink">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="folio_main clearfix">
                                <div class="folio_1im position-relative clearfix">
                                    <div class="folio_1im1 clearfix">
                                        <a href="#"><img src="frontend/img/9.jpg" data-bs-target="#exampleModal12"
                                                data-bs-toggle="modal" class="w-100" height="410" alt="abc"></a>
                                    </div>
                                    <div
                                        class="folio_1im2 pt-5 position-absolute top-0 h-100 text-center w-100 clearfix">
                                        <ul class="mb-0">
                                            <li class="d-inline-block fs-5 me-1"><a data-bs-target="#exampleModal12"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a>
                                            </li>
                                            <li class="d-inline-block fs-5"><a data-bs-target="#exampleModal12"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div
                                        class="folio_1im3  p-3 position-absolute bottom-0  text-center w-100 clearfix">
                                        <h6><a class="text-light" data-bs-target="#exampleModal12"
                                                data-bs-toggle="modal" href="#">MASTER PIECE</a></h6>
                                        <h6 class="mb-0 text-white font_14">People, Still Life</h6>
                                    </div>

                                </div>
                                <div class="modal fade" id="exampleModal12" tabindex="-1"
                                    aria-labelledby="exampleModal12Label" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-black" id="exampleModal12Label">Art Web
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="frontend/img/9.jpg" class="w-100" alt="abc">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn text-white bg_pink">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-3">
                            <div class="folio_main clearfix">
                                <div class="folio_1im position-relative clearfix">
                                    <div class="folio_1im1 clearfix">
                                        <a href="#"><img src="frontend/img/12.jpg" data-bs-target="#exampleModal13"
                                                data-bs-toggle="modal" class="w-100" height="410" alt="abc"></a>
                                    </div>
                                    <div
                                        class="folio_1im2 pt-5 position-absolute top-0 h-100 text-center w-100 clearfix">
                                        <ul class="mb-0">
                                            <li class="d-inline-block fs-5 me-1"><a data-bs-target="#exampleModal13"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a>
                                            </li>
                                            <li class="d-inline-block fs-5"><a data-bs-target="#exampleModal13"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div
                                        class="folio_1im3  p-3 position-absolute bottom-0  text-center w-100 clearfix">
                                        <h6><a class="text-light" data-bs-target="#exampleModal13"
                                                data-bs-toggle="modal" href="#">MASTER PIECE</a></h6>
                                        <h6 class="mb-0 text-white font_14">People, Still Life</h6>
                                    </div>

                                </div>
                                <div class="modal fade" id="exampleModal13" tabindex="-1"
                                    aria-labelledby="exampleModal13Label" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-black" id="exampleModal13Label">Art Web
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="frontend/img/12.jpg" class="w-100" alt="abc">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn text-white bg_pink">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="settings">
                    <div class="folio_1i row">
                        <div class="col-md-3">
                            <div class="folio_main clearfix">
                                <div class="folio_1im position-relative clearfix">
                                    <div class="folio_1im1 clearfix">
                                        <a href="#"><img src="frontend/img/7.jpg" data-bs-target="#exampleModal14"
                                                data-bs-toggle="modal" class="w-100" height="240" alt="abc"></a>
                                    </div>
                                    <div
                                        class="folio_1im2 pt-5 position-absolute top-0 h-100 text-center w-100 clearfix">
                                        <ul class="mb-0">
                                            <li class="d-inline-block fs-5 me-1"><a data-bs-target="#exampleModal14"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a>
                                            </li>
                                            <li class="d-inline-block fs-5"><a data-bs-target="#exampleModal14"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div
                                        class="folio_1im3  p-3 position-absolute bottom-0  text-center w-100 clearfix">
                                        <h6><a class="text-light" data-bs-target="#exampleModal14"
                                                data-bs-toggle="modal" href="#">MASTER PIECE</a></h6>
                                        <h6 class="mb-0 text-white font_14">People, Still Life</h6>
                                    </div>

                                </div>
                                <div class="modal fade" id="exampleModal14" tabindex="-1"
                                    aria-labelledby="exampleModal14Label" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-black" id="exampleModal14Label">Art Web
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="frontend/img/7.jpg" class="w-100" alt="abc">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn text-white bg_pink">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="folio_main clearfix">
                                <div class="folio_1im position-relative clearfix">
                                    <div class="folio_1im1 clearfix">
                                        <a href="#"><img src="frontend/img/8.jpg" data-bs-target="#exampleModal15"
                                                data-bs-toggle="modal" class="w-100" height="410" alt="abc"></a>
                                    </div>
                                    <div
                                        class="folio_1im2 pt-5 position-absolute top-0 h-100 text-center w-100 clearfix">
                                        <ul class="mb-0">
                                            <li class="d-inline-block fs-5 me-1"><a data-bs-target="#exampleModal15"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a>
                                            </li>
                                            <li class="d-inline-block fs-5"><a data-bs-target="#exampleModal15"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div
                                        class="folio_1im3  p-3 position-absolute bottom-0  text-center w-100 clearfix">
                                        <h6><a class="text-light" data-bs-target="#exampleModal15"
                                                data-bs-toggle="modal" href="#">MASTER PIECE</a></h6>
                                        <h6 class="mb-0 text-white font_14">People, Still Life</h6>
                                    </div>

                                </div>
                                <div class="modal fade" id="exampleModal15" tabindex="-1"
                                    aria-labelledby="exampleModal15Label" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-black" id="exampleModal15Label">Art Web
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="frontend/img/8.jpg" class="w-100" alt="abc">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn text-white bg_pink">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="folio_main clearfix">
                                <div class="folio_1im position-relative clearfix">
                                    <div class="folio_1im1 clearfix">
                                        <a href="#"><img src="frontend/img/5.jpg" data-bs-target="#exampleModal16"
                                                data-bs-toggle="modal" class="w-100" height="240" alt="abc"></a>
                                    </div>
                                    <div
                                        class="folio_1im2 pt-5 position-absolute top-0 h-100 text-center w-100 clearfix">
                                        <ul class="mb-0">
                                            <li class="d-inline-block fs-5 me-1"><a data-bs-target="#exampleModal16"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a>
                                            </li>
                                            <li class="d-inline-block fs-5"><a data-bs-target="#exampleModal16"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div
                                        class="folio_1im3  p-3 position-absolute bottom-0  text-center w-100 clearfix">
                                        <h6><a class="text-light" data-bs-target="#exampleModal16"
                                                data-bs-toggle="modal" href="#">MASTER PIECE</a></h6>
                                        <h6 class="mb-0 text-white font_14">People, Still Life</h6>
                                    </div>

                                </div>
                                <div class="modal fade" id="exampleModal16" tabindex="-1"
                                    aria-labelledby="exampleModal16Label" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-black" id="exampleModal16Label">Art Web
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="frontend/img/5.jpg" class="w-100" alt="abc">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn text-white bg_pink">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="folio_main clearfix">
                                <div class="folio_1im position-relative clearfix">
                                    <div class="folio_1im1 clearfix">
                                        <a href="#"><img src="frontend/img/13.jpg" data-bs-target="#exampleModal18"
                                                data-bs-toggle="modal" class="w-100" height="240" alt="abc"></a>
                                    </div>
                                    <div
                                        class="folio_1im2 pt-5 position-absolute top-0 h-100 text-center w-100 clearfix">
                                        <ul class="mb-0">
                                            <li class="d-inline-block fs-5 me-1"><a data-bs-target="#exampleModal18"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a>
                                            </li>
                                            <li class="d-inline-block fs-5"><a data-bs-target="#exampleModal18"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div
                                        class="folio_1im3  p-3 position-absolute bottom-0  text-center w-100 clearfix">
                                        <h6><a class="text-light" data-bs-target="#exampleModal18"
                                                data-bs-toggle="modal" href="#">MASTER PIECE</a></h6>
                                        <h6 class="mb-0 text-white font_14">People, Still Life</h6>
                                    </div>

                                </div>
                                <div class="modal fade" id="exampleModal18" tabindex="-1"
                                    aria-labelledby="exampleModal18Label" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-black" id="exampleModal18Label">Art Web
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="frontend/img/13.jpg" class="w-100" alt="abc">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn text-white bg_pink">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="settings_o">
                    <div class="folio_1i row">
                        <div class="col-md-3">
                            <div class="folio_main clearfix">
                                <div class="folio_1im position-relative clearfix">
                                    <div class="folio_1im1 clearfix">
                                        <a href="#"><img src="frontend/img/5.jpg" data-bs-target="#exampleModal19"
                                                data-bs-toggle="modal" class="w-100" height="240" alt="abc"></a>
                                    </div>
                                    <div
                                        class="folio_1im2 pt-5 position-absolute top-0 h-100 text-center w-100 clearfix">
                                        <ul class="mb-0">
                                            <li class="d-inline-block fs-5 me-1"><a data-bs-target="#exampleModal19"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a>
                                            </li>
                                            <li class="d-inline-block fs-5"><a data-bs-target="#exampleModal19"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div
                                        class="folio_1im3  p-3 position-absolute bottom-0  text-center w-100 clearfix">
                                        <h6><a class="text-light" data-bs-target="#exampleModal19"
                                                data-bs-toggle="modal" href="#">MASTER PIECE</a></h6>
                                        <h6 class="mb-0 text-white font_14">People, Still Life</h6>
                                    </div>

                                </div>
                                <div class="modal fade" id="exampleModal19" tabindex="-1"
                                    aria-labelledby="exampleModal19Label" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-black" id="exampleModal19Label">Art Web
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="frontend/img/5.jpg" class="w-100" alt="abc">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn text-white bg_pink">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="folio_main clearfix">
                                <div class="folio_1im position-relative clearfix">
                                    <div class="folio_1im1 clearfix">
                                        <a href="#"><img src="frontend/img/7.jpg" data-bs-target="#exampleModal20"
                                                data-bs-toggle="modal" class="w-100" height="240" alt="abc"></a>
                                    </div>
                                    <div
                                        class="folio_1im2 pt-5 position-absolute top-0 h-100 text-center w-100 clearfix">
                                        <ul class="mb-0">
                                            <li class="d-inline-block fs-5 me-1"><a data-bs-target="#exampleModal20"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a>
                                            </li>
                                            <li class="d-inline-block fs-5"><a data-bs-target="#exampleModal20"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div
                                        class="folio_1im3  p-3 position-absolute bottom-0  text-center w-100 clearfix">
                                        <h6><a class="text-light" data-bs-target="#exampleModal20"
                                                data-bs-toggle="modal" href="#">MASTER PIECE</a></h6>
                                        <h6 class="mb-0 text-white font_14">People, Still Life</h6>
                                    </div>

                                </div>
                                <div class="modal fade" id="exampleModal20" tabindex="-1"
                                    aria-labelledby="exampleModal20Label" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-black" id="exampleModal20Label">Art Web
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="frontend/img/7.jpg" class="w-100" alt="abc">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn text-white bg_pink">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="folio_main mt-4 clearfix">
                                <div class="folio_1im position-relative clearfix">
                                    <div class="folio_1im1 clearfix">
                                        <a href="#"><img src="frontend/img/6.jpg" data-bs-target="#exampleModal21"
                                                data-bs-toggle="modal" class="w-100" height="240" alt="abc"></a>
                                    </div>
                                    <div
                                        class="folio_1im2 pt-5 position-absolute top-0 h-100 text-center w-100 clearfix">
                                        <ul class="mb-0">
                                            <li class="d-inline-block fs-5 me-1"><a data-bs-target="#exampleModal21"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a>
                                            </li>
                                            <li class="d-inline-block fs-5"><a data-bs-target="#exampleModal21"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div
                                        class="folio_1im3  p-3 position-absolute bottom-0  text-center w-100 clearfix">
                                        <h6><a class="text-light" data-bs-target="#exampleModal21"
                                                data-bs-toggle="modal" href="#">MASTER PIECE</a></h6>
                                        <h6 class="mb-0 text-white font_14">People, Still Life</h6>
                                    </div>

                                </div>
                                <div class="modal fade" id="exampleModal21" tabindex="-1"
                                    aria-labelledby="exampleModal21Label" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-black" id="exampleModal21Label">Art Web
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="frontend/img/6.jpg" class="w-100" alt="abc">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn text-white bg_pink">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="folio_main clearfix">
                                <div class="folio_1im position-relative clearfix">
                                    <div class="folio_1im1 clearfix">
                                        <a href="#"><img src="frontend/img/10.jpg" data-bs-target="#exampleModal22"
                                                data-bs-toggle="modal" class="w-100" height="410" alt="abc"></a>
                                    </div>
                                    <div
                                        class="folio_1im2 pt-5 position-absolute top-0 h-100 text-center w-100 clearfix">
                                        <ul class="mb-0">
                                            <li class="d-inline-block fs-5 me-1"><a data-bs-target="#exampleModal22"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a>
                                            </li>
                                            <li class="d-inline-block fs-5"><a data-bs-target="#exampleModal22"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div
                                        class="folio_1im3  p-3 position-absolute bottom-0  text-center w-100 clearfix">
                                        <h6><a class="text-light" data-bs-target="#exampleModal22"
                                                data-bs-toggle="modal" href="#">MASTER PIECE</a></h6>
                                        <h6 class="mb-0 text-white font_14">People, Still Life</h6>
                                    </div>

                                </div>
                                <div class="modal fade" id="exampleModal22" tabindex="-1"
                                    aria-labelledby="exampleModal22Label" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-black" id="exampleModal22Label">Art Web
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="frontend/img/10.jpg" class="w-100" alt="abc">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn text-white bg_pink">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="folio_main clearfix">
                                <div class="folio_1im position-relative clearfix">
                                    <div class="folio_1im1 clearfix">
                                        <a href="#"><img src="frontend/img/11.jpg" data-bs-target="#exampleModal23"
                                                data-bs-toggle="modal" class="w-100" height="240" alt="abc"></a>
                                    </div>
                                    <div
                                        class="folio_1im2 pt-5 position-absolute top-0 h-100 text-center w-100 clearfix">
                                        <ul class="mb-0">
                                            <li class="d-inline-block fs-5 me-1"><a data-bs-target="#exampleModal23"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a>
                                            </li>
                                            <li class="d-inline-block fs-5"><a data-bs-target="#exampleModal23"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div
                                        class="folio_1im3  p-3 position-absolute bottom-0  text-center w-100 clearfix">
                                        <h6><a class="text-light" data-bs-target="#exampleModal23"
                                                data-bs-toggle="modal" href="#">MASTER PIECE</a></h6>
                                        <h6 class="mb-0 text-white font_14">People, Still Life</h6>
                                    </div>

                                </div>
                                <div class="modal fade" id="exampleModal23" tabindex="-1"
                                    aria-labelledby="exampleModal23Label" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-black" id="exampleModal23Label">Art Web
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="frontend/img/11.jpg" class="w-100" alt="abc">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn text-white bg_pink">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="profile_o">
                    <div class="folio_1i row">
                        <div class="col-md-3">
                            <div class="folio_main clearfix">
                                <div class="folio_1im position-relative clearfix">
                                    <div class="folio_1im1 clearfix">
                                        <a href="#"><img src="frontend/img/12.jpg" data-bs-target="#exampleModal24"
                                                data-bs-toggle="modal" class="w-100" height="410" alt="abc"></a>
                                    </div>
                                    <div
                                        class="folio_1im2 pt-5 position-absolute top-0 h-100 text-center w-100 clearfix">
                                        <ul class="mb-0">
                                            <li class="d-inline-block fs-5 me-1"><a data-bs-target="#exampleModal24"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a>
                                            </li>
                                            <li class="d-inline-block fs-5"><a data-bs-target="#exampleModal24"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div
                                        class="folio_1im3  p-3 position-absolute bottom-0  text-center w-100 clearfix">
                                        <h6><a class="text-light" data-bs-target="#exampleModal24"
                                                data-bs-toggle="modal" href="#">MASTER PIECE</a></h6>
                                        <h6 class="mb-0 text-white font_14">People, Still Life</h6>
                                    </div>

                                </div>
                                <div class="modal fade" id="exampleModal24" tabindex="-1"
                                    aria-labelledby="exampleModal24Label" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-black" id="exampleModal24Label">Art Web
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="frontend/img/12.jpg" class="w-100" alt="abc">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn text-white bg_pink">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="folio_main clearfix">
                                <div class="folio_1im position-relative clearfix">
                                    <div class="folio_1im1 clearfix">
                                        <a href="#"><img src="frontend/img/9.jpg" data-bs-target="#exampleModal25"
                                                data-bs-toggle="modal" class="w-100" height="410" alt="abc"></a>
                                    </div>
                                    <div
                                        class="folio_1im2 pt-5 position-absolute top-0 h-100 text-center w-100 clearfix">
                                        <ul class="mb-0">
                                            <li class="d-inline-block fs-5 me-1"><a data-bs-target="#exampleModal25"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a>
                                            </li>
                                            <li class="d-inline-block fs-5"><a data-bs-target="#exampleModal25"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div
                                        class="folio_1im3  p-3 position-absolute bottom-0  text-center w-100 clearfix">
                                        <h6><a class="text-light" data-bs-target="#exampleModal25"
                                                data-bs-toggle="modal" href="#">MASTER PIECE</a></h6>
                                        <h6 class="mb-0 text-white font_14">People, Still Life</h6>
                                    </div>

                                </div>
                                <div class="modal fade" id="exampleModal25" tabindex="-1"
                                    aria-labelledby="exampleModal25Label" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-black" id="exampleModal25Label">Art Web
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="frontend/img/9.jpg" class="w-100" alt="abc">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn text-white bg_pink">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="folio_main clearfix">
                                <div class="folio_1im position-relative clearfix">
                                    <div class="folio_1im1 clearfix">
                                        <a href="#"><img src="frontend/img/11.jpg" data-bs-target="#exampleModal26"
                                                data-bs-toggle="modal" class="w-100" height="240" alt="abc"></a>
                                    </div>
                                    <div
                                        class="folio_1im2 pt-5 position-absolute top-0 h-100 text-center w-100 clearfix">
                                        <ul class="mb-0">
                                            <li class="d-inline-block fs-5 me-1"><a data-bs-target="#exampleModal26"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a>
                                            </li>
                                            <li class="d-inline-block fs-5"><a data-bs-target="#exampleModal26"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div
                                        class="folio_1im3  p-3 position-absolute bottom-0  text-center w-100 clearfix">
                                        <h6><a class="text-light" data-bs-target="#exampleModal26"
                                                data-bs-toggle="modal" href="#">MASTER PIECE</a></h6>
                                        <h6 class="mb-0 text-white font_14">People, Still Life</h6>
                                    </div>

                                </div>
                                <div class="modal fade" id="exampleModal26" tabindex="-1"
                                    aria-labelledby="exampleModal26Label" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-black" id="exampleModal26Label">Art Web
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="frontend/img/11.jpg" class="w-100" alt="abc">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn text-white bg_pink">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="folio_main mt-4 clearfix">
                                <div class="folio_1im position-relative clearfix">
                                    <div class="folio_1im1 clearfix">
                                        <a href="#"><img src="frontend/img/6.jpg" data-bs-target="#exampleModal27"
                                                data-bs-toggle="modal" class="w-100" height="240" alt="abc"></a>
                                    </div>
                                    <div
                                        class="folio_1im2 pt-5 position-absolute top-0 h-100 text-center w-100 clearfix">
                                        <ul class="mb-0">
                                            <li class="d-inline-block fs-5 me-1"><a data-bs-target="#exampleModal27"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a>
                                            </li>
                                            <li class="d-inline-block fs-5"><a data-bs-target="#exampleModal27"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div
                                        class="folio_1im3  p-3 position-absolute bottom-0  text-center w-100 clearfix">
                                        <h6><a class="text-light" data-bs-target="#exampleModal27"
                                                data-bs-toggle="modal" href="#">MASTER PIECE</a></h6>
                                        <h6 class="mb-0 text-white font_14">People, Still Life</h6>
                                    </div>

                                </div>
                                <div class="modal fade" id="exampleModal27" tabindex="-1"
                                    aria-labelledby="exampleModal27Label" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-black" id="exampleModal27Label">Art Web
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="frontend/img/6.jpg" class="w-100" alt="abc">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn text-white bg_pink">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="folio_main clearfix">
                                <div class="folio_1im position-relative clearfix">
                                    <div class="folio_1im1 clearfix">
                                        <a href="#"><img src="frontend/img/8.jpg" data-bs-target="#exampleModal28"
                                                data-bs-toggle="modal" class="w-100" height="410" alt="abc"></a>
                                    </div>
                                    <div
                                        class="folio_1im2 pt-5 position-absolute top-0 h-100 text-center w-100 clearfix">
                                        <ul class="mb-0">
                                            <li class="d-inline-block fs-5 me-1"><a data-bs-target="#exampleModal28"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a>
                                            </li>
                                            <li class="d-inline-block fs-5"><a data-bs-target="#exampleModal28"
                                                    data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div
                                        class="folio_1im3  p-3 position-absolute bottom-0  text-center w-100 clearfix">
                                        <h6><a class="text-light" data-bs-target="#exampleModal28"
                                                data-bs-toggle="modal" href="#">MASTER PIECE</a></h6>
                                        <h6 class="mb-0 text-white font_14">People, Still Life</h6>
                                    </div>

                                </div>
                                <div class="modal fade" id="exampleModal28" tabindex="-1"
                                    aria-labelledby="exampleModal28Label" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-black" id="exampleModal28Label">Art Web
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="frontend/img/8.jpg" class="w-100" alt="abc">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn text-white bg_pink">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section> --}}

@endsection
