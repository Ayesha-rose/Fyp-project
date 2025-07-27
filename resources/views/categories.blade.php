@extends('master')

@section('body-class', 'categories-background')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/categories.css') }}">
@endsection

@section('userpanel')
<div class="categories d-flex-lg  p-0 m-0" id="categories">
    <div class="container">
        <div class="row">
            <div class="front">
                <div class="row mt-5">
                    <div class="col-6 p-0 mt-3">
                        <div class="left text-primary fw-bold" id="heading">
                            <h1 class="heading-main mt-0"><b>CATEGORIES</b></h1>
                        </div>
                        <div class="row mt-4">
                            <div class="col-8">
                                <div class="input-group" id="input-main">
                                    <span class="input-group-text bg-white border-0"><i
                                            class="fas fa-search"></i></span>
                                    <input type="text" class="form-control border-0"
                                        placeholder="Search book name and author" src="">
                                </div>
                            </div>
                            <div class="col-2">
                                <button class="btn rounded text-white bg-primary fw-bold"
                                    id="search_button">Search</button>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-5 ms-3 me-2">
                                <ul class="category-list">
                                    <li class="category-item">
                                        <b>
                                            <a class="category-term" href="#Computer">Computer</a>
                                        </b>
                                    </li>
                                    <li class="category-item">
                                        <b>
                                            <a class="category-term" href="#Mathematics">Mathematics</a>
                                        </b>
                                    </li>
                                    <li class="category-item"><b>
                                            <a class="category-term" href="#Science">Science</a>
                                        </b>
                                    </li>
                                    <li class="category-item">
                                        <b>
                                            <a class="category-term" href="#Fiction">Fiction</a>
                                        </b>
                                    </li>
                                    <li class="category-item">
                                        <b>
                                            <a class="category-term" href="#Business">Business & Finance</a>
                                        </b>
                                    </li>
                                    <li class="category-item">
                                        <b>
                                            <a class="category-term" href="#Children">Children's Books</a>
                                        </b>
                                    </li>
                                    <li class="category-item">
                                        <b>
                                            <a class="category-term" href="#History">History</a>
                                        </b>
                                    </li>
                                    <li class="category-item">
                                        <b>
                                            <a class="category-term" href="#English">English Novels</a>
                                        </b>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 ">
                                <ul class="category-list ps-3">
                                    <li class="category-item">
                                        <b>
                                            <a class="category-term" href="#Biogeography">Biogeography</a>
                                        </b>
                                    </li>
                                    <li class="category-item">
                                        <b>
                                            <a class="category-term" href="#Social">Social Sciences</a>
                                        </b>
                                    </li>
                                    <li class="category-item">
                                        <b>
                                            <a class="category-term" href="#TextBooks">TextBooks</a>
                                        </b>
                                    </li>
                                    <li class="category-item">
                                        <b>
                                            <a class="category-term" href="#Animals">Animals</a>
                                        </b>
                                    </li>
                                    <li class="category-item">
                                        <b>
                                            <a class="category-term" href="#Crime">Crime & Thriller</a>
                                        </b>
                                    </li>
                                    <li class="category-item">
                                        <b>
                                            <a class="category-term" href="#Fantasy">Fantasy & Horror</a>
                                        </b>
                                    </li>
                                    <li class="category-item">
                                        <b>
                                            <a class="category-term" href="#Craft">Craft & Hobbies</a>
                                        </b>
                                    </li>
                                    <li class="category-item">
                                        <b>
                                            <a class="category-term" href="#Urdu">Urdu Novels</a>
                                        </b>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 ml-5 mt-3">
                        <img src="images/globe.png" class="globe ms-5">
                    </div>
                </div>
            </div>
            <div class="carousel carousel-dark slide mt-3" id="carouseldemo" data-bs-wrap="false">
                <div class="carousel-inner  mt-0">
                    <div class="col-12 mb-0 text-primary fw-bold" id="Computer">
                        <h4><b>Computer</b></h4>
                        <ol class="carousel-indicators mx-5 carousel-dark">
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="1"></li>
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="2"></li>
                        </ol>
                    </div>
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_computer/1.png" alt="Image 1" style="object-fit:cover;">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_computer/2.png" alt="Image 2" style="object-fit: contain;">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_computer/3.png" alt="Image 3" style="object-fit: contain;">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_computer/4.png" alt="Image 4" style="object-fit: contain;">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_computer/5.png" alt="Image 5" style="object-fit: contain;">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_computer/6.png" alt="Image 6" style="object-fit: contain;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_computer/7.png" alt="Image 7" style="object-fit: contain;">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_computer/8.png" alt="Image 8" style="object-fit: contain;">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_computer/9.png" alt="Image 9" style="object-fit: contain;">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_computer/10.png" alt="Image 10" style="object-fit: contain;">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_computer/11.png" alt="Image 11" style="object-fit: contain;">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_computer/12.png" alt="Image 12" style="object-fit: contain;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_computer/13.png" alt="Image 13" style="object-fit:cover;">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_computer/14.png" alt="Image 14" style="object-fit: contain;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouseldemo" type="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#carouseldemo" type="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
            <div class="carousel carousel-dark slide mt-4" id="carouseldemo2" data-bs-wrap="false">
                <div class="carousel-inner me-4">
                    <div class="col-12 mb-0 text-primary fw-bold" id="Mathematics">
                        <h4><b>Mathematics</b></h4>
                        <ol class="carousel-indicators mx-5 carousel-dark">
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="1"></li>
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="2"></li>
                        </ol>
                    </div>
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_mathematics\1.png" alt="Image 1">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_mathematics/2.png" alt="Image 2">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_mathematics/3.png" alt="Image 3">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_mathematics/4.png" alt="Image 4">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_mathematics/5.png" alt="Image 5">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_mathematics/6.png" alt="Image 6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_mathematics/7.png" alt="Image 7">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_mathematics/8.png" alt="Image 8">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_mathematics/9.png" alt="Image 9">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_mathematics/10.png" alt="Image 10">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_mathematics/11.png" alt="Image 11">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_mathematics/12.png" alt="Image 12">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_mathematics/13.png" alt="Image 13">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouseldemo2" type="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#carouseldemo2" type="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
            <div class="carousel carousel-dark slide mt-4" id="carouseldemo3" data-bs-wrap="false">
                <div class="carousel-inner mt-0">
                    <div class="col-12 mb-0 text-primary fw-bold" id="Science">
                        <h4><b>Science</b></h4>
                        <ol class="carousel-indicators mx-5 carousel-dark">
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="1"></li>
                        </ol>
                    </div>
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_science/1.png" alt="Image 1">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_science/2.png" alt="Image 2">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_science/3.png" alt="Image 3">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_science/4.png" alt="Image 4">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_science/5.png" alt="Image 5">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_science/6.png" alt="Image 6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_science/7.png" alt="Image 7">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_science/8.png" alt="Image 8">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_science/9.png" alt="Image 9">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_science/10.png" alt="Image 10">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouseldemo3" type="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#carouseldemo3" type="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
            <div class="carousel carousel-dark slide mt-4" id="carouseldemo4" data-bs-wrap="false">
                <div class="carousel-inner mt-0">
                    <div class="col-12 mb-0 text-primary fw-bold" id="Fiction">
                        <h4><b>Fiction</b></h4>
                        <ol class="carousel-indicators mx-5 carousel-dark">
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="1"></li>
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="2"></li>
                        </ol>
                    </div>
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_fiction/1.png" alt="Image 1">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_fiction/2.png" alt="Image 2">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_fiction/3.png" alt="Image 3">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_fiction/4.png" alt="Image 4">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_fiction/5.png" alt="Image 5">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_fiction/6.png" alt="Image 6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_fiction/7.png" alt="Image 7">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_fiction/8.png" alt="Image 8">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_fiction/9.png" alt="Image 9">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_fiction/10.png" alt="Image 10">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_fiction/11.png" alt="Image 11">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_fiction/12.png" alt="Image 12">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_fiction/13.png" alt="Image 13">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_fiction/14.png" alt="Image 14">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_fiction/15.png" alt="Image 15">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouseldemo4" type="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#carouseldemo4" type="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
            <div class="carousel carousel-dark slide mt-4" id="carouseldemo5" data-bs-wrap="false">
                <div class="carousel-inner mt-0">
                    <div class="col-12 mb-0 text-primary fw-bold" id="Business">
                        <h4><b>Business & Finance</b></h4>
                        <ol class="carousel-indicators mx-5 carousel-dark">
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="1"></li>
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="2"></li>
                        </ol>
                    </div>
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_business&finance/1.png" alt="Image 1">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_business&finance/2.png" alt="Image 2">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_business&finance/3.png" alt="Image 3">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_business&finance/4.png" alt="Image 4">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_business&finance/5.png" alt="Image 5">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_business&finance/6.png" alt="Image 6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_business&finance/7.png" alt="Image 7">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_business&finance/8.png" alt="Image 8">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_business&finance/9.png" alt="Image 9">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_business&finance/10.png" alt="Image 10">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_business&finance/11.png" alt="Image 11">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_business&finance/12.png" alt="Image 12">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_business&finance/13.png" alt="Image 13">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_business&finance/14.png" alt="Image 14">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_business&finance/15.png" alt="Image 15">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouseldemo5" type="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#carouseldemo5" type="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
            <div class="carousel carousel-dark slide mt-4" id="carouseldemo6" data-bs-wrap="false">
                <div class="carousel-inner mt-0">
                    <div class="col-12 mb-0 text-primary fw-bold" id="Children">
                        <h4><b>Children's Books</b></h4>
                        <ol class="carousel-indicators mx-5 carousel-dark">
                            <li data-bs-target="#carouseldemo6" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carouseldemo6" data-bs-slide-to="1"></li>
                            <li data-bs-target="#carouseldemo6" data-bs-slide-to="2"></li>
                            <li data-bs-target="#carouseldemo6" data-bs-slide-to="3"></li>
                        </ol>
                    </div>

                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_childrensbooks/1.png" alt="Image 1" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_childrensbooks/2.png" alt="Image 2" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_childrensbooks/3.png" alt="Image 3" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_childrensbooks/4.png" alt="Image 4" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_childrensbooks/5.png" alt="Image 5" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_childrensbooks/6.png" alt="Image 6" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_childrensbooks/7.png" alt="Image 7" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_childrensbooks/8.png" alt="Image 8" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_childrensbooks/9.png" alt="Image 9" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_childrensbooks/10.png" alt="Image 10" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_childrensbooks/11.png" alt="Image 11" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_childrensbooks/12.png" alt="Image 12" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_childrensbooks/13.png" alt="Image 13" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_childrensbooks/14.png" alt="Image 14" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_childrensbooks/15.png" alt="Image 15" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_childrensbooks/16.png" alt="Image 16" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_childrensbooks/17.png" alt="Image 17" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_childrensbooks/18.png" alt="Image 18" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_childrensbooks/19.png" alt="Image 19" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_childrensbooks/20.png" alt="Image 20" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add more slides as needed -->
                </div>

                <!-- Carousel Controls -->
                <a class="carousel-control-prev" href="#carouseldemo6" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next" href="#carouseldemo6" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
            <div class="carousel carousel-dark slide mt-4" id="carouseldemo7" data-bs-wrap="false">
                <div class="carousel-inner mt-0">
                    <div class="col-12 mb-0 text-primary fw-bold" id="History">
                        <h4><b>History</b></h4>
                        <ol class="carousel-indicators mx-5 carousel-dark">
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="1"></li>
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="2"></li>
                        </ol>
                    </div>
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_history/1.png" alt="Image 1">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_history/2.png" alt="Image 2">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_history/3.png" alt="Image 3">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_history/4.png" alt="Image 4">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_history/5.png" alt="Image 5">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_history/6.png" alt="Image 6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_history/7.png" alt="Image 7">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_history/8.png" alt="Image 8">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_history/9.png" alt="Image 9">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_history/10.png" alt="Image 10">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_history/11.png" alt="Image 11">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_history/12.png" alt="Image 12">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_history/13.png" alt="Image 13">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_history/14.png" alt="Image 13">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_history/15.png" alt="Image 13">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouseldemo7" type="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#carouseldemo7" type="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
            <div class="carousel carousel-dark slide mt-4" id="carouseldemo8" data-bs-wrap="false">
                <div class="carousel-inner mt-0">
                    <div class="col-12 mb-0 text-primary fw-bold" id="English">
                        <h4><b>English Novels</b></h4>
                        <ol class="carousel-indicators mx-5 carousel-dark">
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="1"></li>
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="2"></li>
                        </ol>
                    </div>
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_eng_novels/1.png" alt="Image 1">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_eng_novels/2.png" alt="Image 2">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_eng_novels/3.png" alt="Image 3">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_eng_novels/4.png" alt="Image 4">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_eng_novels/5.png" alt="Image 5">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_eng_novels/6.png" alt="Image 6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_eng_novels/7.png" alt="Image 7">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_eng_novels/8.png" alt="Image 8">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_eng_novels/9.png" alt="Image 9">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_eng_novels/10.png" alt="Image 10">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_eng_novels/11.png" alt="Image 11">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_eng_novels/12.png" alt="Image 12">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_eng_novels/13.png" alt="Image 13">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_eng_novels/14.png" alt="Image 14">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_eng_novels/15.png" alt="Image 14">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev " href="#carouseldemo8" type="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#carouseldemo8" type="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
            <div class="carousel carousel-dark slide mt-4" id="carouseldemo9" data-bs-wrap="false">
                <div class="carousel-inner mt-0">
                    <div class="col-12 mb-0 text-primary fw-bold" id="Biogeography">
                        <h4><b>Biogeography</b></h4>
                        <ol class="carousel-indicators mx-5 carousel-dark">
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="1"></li>
                        </ol>
                    </div>
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_biogeography/1.png" alt="Image 1">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_biogeography/2.png" alt="Image 2">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_biogeography/3.png" alt="Image 3">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_biogeography/4.png" alt="Image 4">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_biogeography/5.png" alt="Image 5">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_biogeography/6.png" alt="Image 6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_biogeography/7.png" alt="Image 7">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_biogeography/8.png" alt="Image 8">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev " href="#carouseldemo9" type="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#carouseldemo9" type="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
            <div class="carousel carousel-dark slide mt-4" id="carouseldemo10" data-bs-wrap="false">
                <div class="carousel-inner mt-0">
                    <div class="col-12 mb-0 text-primary fw-bold" id="Social">
                        <h4><b>Social Sciences</b></h4>
                        <ol class="carousel-indicators mx-5 carousel-dark">
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="1"></li>
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="2"></li>
                        </ol>
                    </div>
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_social_sciences/1.png" alt="Image 1">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_social_sciences/2.png" alt="Image 2">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_social_sciences/3.png" alt="Image 3">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_social_sciences/4.png" alt="Image 4">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_social_sciences/5.png" alt="Image 5">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_social_sciences/6.png" alt="Image 6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_social_sciences/7.png" alt="Image 7">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_social_sciences/8.png" alt="Image 8">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_social_sciences/9.png" alt="Image 9">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_social_sciences/10.png" alt="Image 10">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_social_sciences/11.png" alt="Image 11">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_social_sciences/12.png" alt="Image 12">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_social_sciences/13.png" alt="Image 13">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev " href="#carouseldemo10" type="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#carouseldemo10" type="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
            <div class="carousel carousel-dark slide mt-4" id="carouseldemo11" data-bs-wrap="false">
                <div class="carousel-inner mt-0">
                    <div class="col-12 mb-0 text-primary fw-bold" id="TextBooks">
                        <h4><b>Textbooks</b></h4>
                        <ol class="carousel-indicators mx-5 carousel-dark">
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="1"></li>
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="2"></li>
                        </ol>
                    </div>
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_textbooks/1.png" alt="Image 1">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_textbooks/2.png" alt="Image 2">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_textbooks/3.png" alt="Image 3">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_textbooks/4.png" alt="Image 4">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_textbooks/5.png" alt="Image 5">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_textbooks/6.png" alt="Image 6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_textbooks/7.png" alt="Image 7">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_textbooks/8.png" alt="Image 8">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_textbooks/9.png" alt="Image 9">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_textbooks/10.png" alt="Image 10">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_textbooks/11.png" alt="Image 11">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_textbooks/12.png" alt="Image 12">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_textbooks/13.png" alt="Image 13">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_textbooks/14.png" alt="Image 14">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouseldemo11" type="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#carouseldemo11" type="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
            <div class="carousel carousel-dark slide mt-4" id="carouseldemo12" data-bs-wrap="false">
                <div class="carousel-inner mt-0">
                    <div class="col-12 mb-0 text-primary fw-bold" id="Animals">
                        <h4><b>Animals</b></h4>
                        <ol class="carousel-indicators mx-5 carousel-dark">
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="1"></li>
                        </ol>
                    </div>
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_animal/1.png" alt="Image 1">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_animal/2.png" alt="Image 2">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_animal/3.png" alt="Image 3">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_animal/4.png" alt="Image 4">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_animal/5.png" alt="Image 5">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_animal/6.png" alt="Image 6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_animal/7.png" alt="Image 7">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_animal/8.png" alt="Image 8">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_animal/9.png" alt="Image 9">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_animal/10.png" alt="Image 10">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_animal/11.png" alt="Image 11">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_animal/12.png" alt="Image 12">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouseldemo12" type="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#carouseldemo12" type="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
            <div class="carousel carousel-dark slide mt-4" id="carouseldemo13" data-bs-wrap="false">
                <div class="carousel-inner mt-0">
                    <div class="col-12 mb-0 text-primary fw-bold" id="Crime">
                        <h4><b>Crime & Thriller</b></h4>
                        <ol class="carousel-indicators mx-5 carousel-dark">
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="1"></li>
                        </ol>
                    </div>
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_crime&thriller/1.png" alt="Image 1">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_crime&thriller/2.png" alt="Image 2">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_crime&thriller/3.png" alt="Image 3">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_crime&thriller/4.png" alt="Image 4">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_crime&thriller/5.png" alt="Image 5">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_crime&thriller/6.png" alt="Image 6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_crime&thriller/7.png" alt="Image 7">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_crime&thriller/8.png" alt="Image 8">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_crime&thriller/9.png" alt="Image 9">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_crime&thriller/10.png" alt="Image 10">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_crime&thriller/11.png" alt="Image 11">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_crime&thriller/12.png" alt="Image 12">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouseldemo13" type="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#carouseldemo13" type="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
            <div class="carousel carousel-dark slide mt-4" id="carouseldemo14" data-bs-wrap="false">
                <div class="carousel-inner mt-0">
                    <div class="col-12 mb-0 text-primary fw-bold" id="Fantasy">
                        <h4><b>Fantasy & Horror</b></h4>
                        <ol class="carousel-indicators mx-5 carousel-dark">
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="1"></li>
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="2"></li>
                        </ol>
                    </div>
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_fantacy&horror/1.png" alt="Image 1">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_fantacy&horror/2.png" alt="Image 2">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_fantacy&horror/3.png" alt="Image 3">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_fantacy&horror/4.png" alt="Image 4">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_fantacy&horror/5.png" alt="Image 5">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_fantacy&horror/6.png" alt="Image 6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_fantacy&horror/7.png" alt="Image 7">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_fantacy&horror/8.png" alt="Image 8">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_fantacy&horror/9.png" alt="Image 9">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_fantacy&horror/10.png" alt="Image 10">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_fantacy&horror/11.png" alt="Image 11">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_fantacy&horror/12.png" alt="Image 12">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_fantacy&horror/13.png" alt="Image 13">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_fantacy&horror/14.png" alt="Image 14">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouseldemo14" type="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#carouseldemo14" type="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
            <div class="carousel carousel-dark slide mt-4" id="carouseldemo15" data-bs-wrap="false">
                <div class="carousel-inner mt-0">
                    <div class="col-12 mb-0 text-primary fw-bold" id="Craft">
                        <h4><b>Craft & Hobbies</b></h4>
                        <ol class="carousel-indicators mx-5 carousel-dark">
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="1"></li>
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="2"></li>
                        </ol>
                    </div>
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_craft&hobbies/1.png" alt="Image 1">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_craft&hobbies/2.png" alt="Image 2">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_craft&hobbies/3.png" alt="Image 3">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_craft&hobbies/4.png" alt="Image 4">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_craft&hobbies/5.png" alt="Image 5">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_craft&hobbies/6.png" alt="Image 6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_craft&hobbies/7.png" alt="Image 7">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_craft&hobbies/8.png" alt="Image 8">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_craft&hobbies/9.png" alt="Image 9">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_craft&hobbies/10.png" alt="Image 10">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_craft&hobbies/11.png" alt="Image 11">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_craft&hobbies/12.png" alt="Image 12">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_craft&hobbies/13.png" alt="Image 13">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_craft&hobbies/14.png" alt="Image 14">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_craft&hobbies/15.png" alt="Image 15">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouseldemo15" type="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#carouseldemo15" type="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
            <div class="carousel carousel-dark slide mt-4" id="carouseldemo16" data-bs-wrap="false">
                <div class="carousel-inner mt-0">
                    <div class="col-12 mb-0 text-primary fw-bold" id="Urdu">
                        <h4><b>Urdu Novels</b></h4>
                        <ol class="carousel-indicators mx-5 carousel-dark">
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="1"></li>
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="2"></li>
                            <li data-bs-target="#carouseldemo" data-bs-slide-to="3"></li>
                        </ol>
                    </div>
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_urdu_novels/1.png" alt="Image 1">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_urdu_novels/2.png" alt="Image 2">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_urdu_novels/3.png" alt="Image 3">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_urdu_novels/4.png" alt="Image 4">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_urdu_novels/5.png" alt="Image 5">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_urdu_novels/6.png" alt="Image 6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_urdu_novels/7.png" alt="Image 7">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_urdu_novels/8.png" alt="Image 8">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_urdu_novels/9.png" alt="Image 9">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_urdu_novels/10.png" alt="Image 10">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_urdu_novels/11.png" alt="Image 11">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_urdu_novels/12.png" alt="Image 12">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_urdu_novels/13.png" alt="Image 13">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_urdu_novels/14.png" alt="Image 13">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_urdu_novels/15.png" alt="Image 13">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_urdu_novels/16.png" alt="Image 13">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_urdu_novels/17.png" alt="Image 13">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_urdu_novels/18.png" alt="Image 13">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 4-->
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_urdu_novels/19.png" alt="Image 13">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_urdu_novels/20.png" alt="Image 13">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="card">
                                    <img src="shelf_urdu_novels/21.png" alt="Image 13">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                
                <a class="carousel-control-prev" href="#carouseldemo16" type="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#carouseldemo16" type="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-5 mt-5 " id="footer">
                    <img src="images/Logo_ft.png" class="footer_logo">
                    <p class="text-muted">We make our onboarding new employees <br> ridiculously easy. On day one
                        ther're <br> ready to go.
                        And
                        retaining them is easier.</p>
                    <p class="text-muted">Follow us on:
                        <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-linkedin"></i></a>
                        <a href="#" class="icon"><i class="fa-brands fa-twitter"></i></a>

                    </p>
                </div>
                <div class="col-6 mt-4 ms-5 text-muted">
                    <div class="row  my-5">
                        <div class="col-4 ">
                            <b>Home</b><br>
                            <b>Features</b><br>
                            <b>Services</b>
                        </div>
                        <div class="col-4 ">
                            <b>Catagories</b><br>
                            <b>My Books</b>
                        </div>
                        <div class="col-4 ">
                            <b>Reviews</b><br>
                            <b>Get Updates</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>
</div>
@endsection

@section('scripts')
<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
