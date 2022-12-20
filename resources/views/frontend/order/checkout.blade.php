@extends('layouts.checkout')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend/img/breadcrumb.png') }}">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="breadcrumb__text">
              <h2 style="color:red;">Checkout</h2>
              <div class="breadcrumb__option">
                <a style="color:white;" href="/">Home</a>
                <span style="color:red;">Checkout</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
      <div class="container" id="checkout">
      </div>
    </section>
    <!-- Checkout Section End -->
@endsection