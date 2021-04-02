@extends('layouts.admin')

@section('title')
    Category
@endsection

@section('content')
    <!-- Section Content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
          <div class="dashboard-heading">
            <h2 class="dashboard-title">Category</h2>
            <p class="dashboard-subtitle">Edit Category</p>
          </div>
          <div class="dashboard-content">
            <div class="row">
              <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                      </ul>
                    </div>
                @endif
                <div class="card">
                  <div class="card-body">
                    <form action="{{route('categories.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                      @method('put')
                      @csrf
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text" name="name" class="form-control" value="{{$item->name}}" required>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="photo" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col text-right">
                          <button type="submit" class="btn btn-success px-5">Save Now</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            {{-- <div class="row mt-3">
              <div class="col-12 mt-2">
                <h5 class="mb-3">Recent Transaction</h5>
                <a href="/dashboard-transaction-details.html" class="card card-list d-block">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-1">
                        <img src="/images/dashboard-icon-product-1.png" class="" alt="">
                      </div>
                      <div class="col-md-4">Shirup Marzzan</div>
                      <div class="col-md-3">Angga Risky</div>
                      <div class="col-md-3">12 Januari, 2020</div>
                      <div class="col-md-1 d-none d-md-block">
                        <img src="/images/dashboard-arrow-right.svg" alt="">
                      </div>
                    </div>
                  </div>
                </a>
                <a href="/dashboard-transaction-details.html" class="card card-list d-block">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-1">
                        <img src="/images/dashboard-icon-product-2.png" class="" alt="">
                      </div>
                      <div class="col-md-4">LeBrone X</div>
                      <div class="col-md-3">Masayoshi</div>
                      <div class="col-md-3">11 Januari, 2020</div>
                      <div class="col-md-1 d-none d-md-block">
                        <img src="/images/dashboard-arrow-right.svg" alt="">
                      </div>
                    </div>
                  </div>
                </a>
                <a href="/dashboard-transaction-details.html" class="card card-list d-block">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-1">
                        <img src="/images/dashboard-icon-product-3.png" class="" alt="">
                      </div>
                      <div class="col-md-4">Soffa Lembutte</div>
                      <div class="col-md-3">Shayna</div>
                      <div class="col-md-3">11 Januari, 2020</div>
                      <div class="col-md-1 d-none d-md-block">
                        <img src="/images/dashboard-arrow-right.svg" alt="">
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div> --}}
          </div>
        </div>
    </div>
@endsection