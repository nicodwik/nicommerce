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
      <div class="dashboard-content">
        <div class="row">
          <div class="col-12">
            <form action="">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Your Name</label>
                        <input type="text" class="form-control" id="addressOne" name="addressOne" value="Setra Duta Cemara">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Your Email</label>
                        <input type="email" class="form-control" id="addressTwo" name="addressTwo" value="nicodwika@gmail.com">
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
