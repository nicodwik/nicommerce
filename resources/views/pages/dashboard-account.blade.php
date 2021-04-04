@extends('layouts.dashboard')

@section('title')
    Account Settings
@endsection

@section('content')
  <!-- Section Content -->
  <div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title">My Account</h2>
        <p class="dashboard-subtitle">Update your current profile</p>
      </div>
      <div class="dashboard-content" >
        <div class="row">
          <div class="col-12">
            <form action="{{route('dashboard-settings-redirect', 'dashboard-settings-account')}}" method="POST" id="locations">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Your Name</label>
                        <input type="text" class="form-control" id="addressOne" name="name" value="{{$user->name}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Your Email</label>
                        <input type="email" class="form-control" id="addressTwo" name="email" value="{{$user->email}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Address 2</label>
                        <input type="text" class="form-control" id="address_one" name="address_one" value="{{$user->address_one}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Address 2</label>
                        <input type="text" class="form-control" id="address_two" name="address_two" value="{{$user->address_two}}">
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
                        <input type="text" class="form-control" id="zip_code" name="zip_code" value="{{$user->zip_code}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Country</label>
                        <input type="text" class="form-control" id="country" name="country" value="{{$user->country}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Mobile</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}">
                      </div>
                    </div>
                  </div>
                  <div class="row mt-5">
                    <div class="col text-right">
                      <button type="submit" class="btn btn-success px-5">Save Now</button>
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
@endsection

@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
  window.onload = function() {
    new Vue({
      el: "#locations",
      data: {
        provinces: null,
        regencies: null,
        provinces_id: null,
        regencies_id: null,
      },
      mounted() {
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
  }
</script>
