@extends('layouts.mainAdminSite')

@section('content')
<div class="page-content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-xl-2">
                            <a href="{{ route('product.add') }}" class="btn btn-primary mb-3 mb-lg-0"><i class='bx bxs-plus-square'></i>Agregar</a>
                        </div>
                        <div class="col-lg-9 col-xl-10">
                            <form class="float-lg-end">
                                <div class="row row-cols-lg-2 row-cols-xl-auto g-2">
                                    <div class="col">
                                        <div class="position-relative">
                                            <input type="text" class="form-control ps-5" placeholder="Search Product..."> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                            <button type="button" class="btn btn-white">Sort By</button>
                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop1" type="button" class="btn btn-white dropdown-toggle dropdown-toggle-nocaret px-1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class='bx bx-chevron-down'></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                    <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                    <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                            <button type="button" class="btn btn-white">Collection Type</button>
                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop1" type="button" class="btn btn-white dropdown-toggle dropdown-toggle-nocaret px-1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class='bx bxs-category'></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                    <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                    <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-white">Price Range</button>
                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop1" type="button" class="btn btn-white dropdown-toggle dropdown-toggle-nocaret px-1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class='bx bx-slider'></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="btnGroupDrop1">
                                                    <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                    <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
        @foreach($products as $product)
        <div class="col">
            <div class="card">
                <img src="assets/images/products/01.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title cursor-pointer">{{ $product->name }}</h6>
                    <div class="clearfix">
                        <p class="mb-0 float-start">Stock <strong> {{ $product->quantity }}</strong></p>
                        <br>
                        <p class="mb-0 float-start">Precio <strong> ${{ $product->sellPrice }}</strong></p>
                        <br>
                        <p class="mb-0 float-start">Publicado <strong> {{ $product->post }}</strong></p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection