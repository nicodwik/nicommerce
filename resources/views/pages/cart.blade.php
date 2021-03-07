@extends('layouts.app')

@section('title')
    Store Cart Page
@endsection

@section('content')
    <!-- Page Content -->
    <div class="page-content page-cart" style="margin-top: 100px;">
        <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <nav>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="/index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                      Cart
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <section class="store-cart">
          <div class="container">
            <div class="row" data-aos="fade-up" data-aos-delay="100">
              <div class="col-12 table-responsive">
                <table class="table table-borderless table-cart">
                  <thead>
                    <tr>
                      <td>Image</td>
                      <td>Name &amp; Seller</td>
                      <td>Price</td>
                      <td>Menu</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="width: 20%;"><img src="/images/product-cart-1.jpg" alt="" class="cart-image"></td>
                      <td style="width: 35%;">
                        <div class="product-title">Sofa ternyaman</div>
                        <div class="product-suntitle">By Andi Sukma</div>
                      </td>
                      <td style="width: 25%;">
                        <div class="product-title">Rp 5.000.000</div>
                        <div class="product-suntitle">Rupiah</div>
                      </td>
                      <td style="width: 15%;">
                        <a href="#" class="btn btn-remove-cart">Remove</a>
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 20%;"><img src="/images/product-cart-2.jpg" alt="" class="cart-image"></td>
                      <td style="width: 35%;">
                        <div class="product-title">Sneaker</div>
                        <div class="product-suntitle">by BuildWith Angga</div>
                      </td>
                      <td style="width: 25%;">
                        <div class="product-title">Rp 5.000.000</div>
                        <div class="product-suntitle">Rupiah</div>
                      </td>
                      <td style="width: 15%;">
                        <a href="#" class="btn btn-remove-cart">Remove</a>
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 20%;"><img src="/images/product-cart-3.jpg" alt="" class="cart-image"></td>
                      <td style="width: 35%;">
                        <div class="product-title">Coffee Holder</div>
                        <div class="product-suntitle">by Addictex</div>
                      </td>
                      <td style="width: 25%;">
                        <div class="product-title">Rp 5.000.000</div>
                        <div class="product-suntitle">Rupiah</div>
                      </td>
                      <td style="width: 15%;">
                        <a href="#" class="btn btn-remove-cart">Remove</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="150">
              <div class="col-12">
                <hr>
              </div>
              <div class="col-12">
                <div class="ch2 mb-4">Shipping Details</div>
              </div>
            </div>
            <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Address 1</label>
                  <input type="text" class="form-control" id="addressOne" name="addressOne" value="Setra Duta Cemara">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Address 2</label>
                  <input type="text" class="form-control" id="addressTwo" name="addressTwo" value="Blok B2, No. 4">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Address 2</label>
                  <select name="province" id="province" class="form-control">
                    <option value="West Jawa">West Jawa</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Address 2</label>
                  <select name="city" id="city" class="form-control">
                    <option value="Bandung">Bandung</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Postal Code</label>
                  <input type="text" class="form-control" id="postalCode" name="postalCode" value="321413">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Country</label>
                  <input type="text" class="form-control" id="country" name="country" value="Indonesia">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Mobile</label>
                  <input type="text" class="form-control" id="mobile" name="mobile" value="62910293123">
                </div>
              </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="150">
              <div class="col-12">
                <hr>
              </div>
              <div class="col-12">
                <div class="mb-1">Payment Information</div>
              </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="200">
              <div class="col-4 col-md-2">
                <div class="product-title">$10</div>
                <div class="product-subtitle">Country Tax</div>
              </div>
              <div class="col-4 col-md-2">
                <div class="product-title">$28 0</div>
                <div class="product-subtitle">Product Insurance</div>
              </div>
              <div class="col-4 col-md-3">
                <div class="product-title">$580</div>
                <div class="product-subtitle">Ship to Jakarta</div>
              </div>
              <div class="col-4 col-md-3">
                <div class="product-title text-success">$580,434</div>
                <div class="product-subtitle">Total</div>
              </div>
              <div class="col-8 col-md-3">
                <a href="/success.html" class="btn btn-success mt-4 px-4 btn-block">Checkout Now</a>
              </div>
            </div>
          </div>
        </section>
    </div>
@endsection