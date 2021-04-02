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
                    @php
                        $totalPrice = 0
                    @endphp
                    @forelse ($carts as $cart)
                      <tr>
                        <td style="width: 20%;">
                          @if ($cart->product->galleries)
                            <img src="{{Storage::disk('s3')->url($cart->product->galleries->first()->photo)}}" alt="" class="cart-image">
                          @endif
                        </td>
                        <td style="width: 35%;">
                          <div class="product-title">{{$cart->product->name}}</div>
                          <div class="product-suntitle">{{$cart->product->user->store_name}}</div>
                        </td>
                        <td style="width: 25%;">
                          <div class="product-title">Rp {{number_format($cart->product->price)}}</div>
                          <div class="product-suntitle">Rupiah</div>
                        </td>
                        <td style="width: 15%;">
                          <form action="{{route('cart-delete', $cart->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-remove-cart">Remove</button>
                          </form>
                        </td>
                      </tr>
                      @php
                        $totalPrice += $cart->product->price  
                      @endphp
                    @empty
                      <tr>
                        <td colspan="4" class="text-center text-danger">Tidak ada data</td>
                      </tr>
                    @endforelse
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
            <form action="{{route('checkout')}}" method="POST" id="locations">
              @csrf
              <input type="hidden" name="total_price" value="{{$totalPrice}}">
              <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Address 1</label>
                    <input type="text" class="form-control" id="address_one" name="address_one" value="Setra Duta Cemara">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Address 2</label>
                    <input type="text" class="form-control" id="address_two" name="address_two" value="Blok B2, No. 4">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Province</label>
                    <select name="provinces_id" id="provinces_id" class="form-control" v-if="provinces" v-model="provinces_id">
                      <option v-for="province in provinces" :value="province.id">@{{province.name}}</option>
                    </select>
                    <select name="" v-else id=""></select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">City</label>
                    <select name="regencies_id" id="regencies_id" class="form-control" v-model="regencies_id">
                      <option v-for="regency in regencies" :value="regency.id">@{{regency.name}}</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Postal Code</label>
                    <input type="text" class="form-control" id="postalCode" name="zip_code" value="321413">
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
                    <input type="text" class="form-control" id="mobile" name="phone_number" value="62910293123">
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
                  <div class="product-title text-success">${{number_format($totalPrice ?? 0)}}</div>
                  <div class="product-subtitle">Total</div>
                </div>
                <div class="col-8 col-md-3">
                  <button type="submit" class="btn btn-success mt-4 px-4 btn-block">Checkout Now</button>
                </div>
              </div>
            </form>
          </div>
        </section>
    </div>
@endsection


@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>

  var locations = new Vue({
    el: '#locations',
    data: {
      provinces: null,
      regencies: null,
      provinces_id: null,
      regencies_id: null,
    },
    mounted() {
      AOS.init()
      this.getProvincesData()
    },
    methods: {
      getProvincesData : function() {
        axios.get('{{route('api-provinces')}}')
          .then(response => {
            this.provinces = response.data
          })
      },
      getRegenciesData : function() {
        axios.get('{{url('api/regencies')}}/' + this.provinces_id)
          .then(response => {
            this.regencies = response.data
            console.log(this.regencies)
          })
      }
    },
    watch: {
      provinces_id: function(val, oldVal) {
        this.regencies_id = null
        this.getRegenciesData()
      }
    }
  })
</script>
@endpush