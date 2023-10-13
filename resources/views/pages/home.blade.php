@extends('layouts.app')

@section('title')
    Homepage
@endsection

@section('content')
    <div class="page-content page-home">
        <section class="store-carousel">
        <div class="container">
            <div class="row">
            <div class="col-lg-12" data-aos="zoom-in">
                <div
                id="storeCarousel"
                class="carousel slide"
                data-ride="carousel"
                >
                <ol class="carousel-indicators">
                    <li
                    class="active"
                    data-target="#storeCarousel"
                    data-slide-to="0"
                    ></li>
                    <li data-target="#storeCarousel" data-slide-to="1"></li>
                    <li data-target="#storeCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img
                        src="/images/banner.jpg"
                        alt="Carousel Image"
                        class="d-block w-100"
                    />
                    </div>
                    <div class="carousel-item">
                    <img
                        src="/images/banner.jpg"
                        alt="Carousel Image"
                        class="d-block w-100"
                    />
                    </div>
                    <div class="carousel-item">
                    <img
                        src="/images/banner.jpg"
                        alt="Carousel Image"
                        class="d-block w-100"
                    />
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>
        <section class="store-trend-categories">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>Type Sampah</h5>
                    </div>
                </div>
            </div>
        </section>

        <section class="store-new-products">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>New Sampah</h5>
                    </div>
                </div>
                <div class="row">

                </div>
            </div>
        </section>
    </div>
@endsection
