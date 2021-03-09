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
            <p class="dashboard-subtitle">List of categories</p>
          </div>
          <div class="dashboard-content">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                    <a href="{{route('categories.create')}}" class="btn btn-primary mb-3">+ Tambah Kategori Baru</a>
                    <div class="table-responsive">
                      <table class="table-hover scroll-horizontal-vertical w-100" id="crudTable">
                        <thead>
                          <tr>
                            <td>ID</td>
                            <td>Nama</td>
                            <td>Foto</td>
                            <td>Slug</td>
                            <td>Aksi</td>
                          </tr>
                        </thead>
                        <tbody></tbody>
                      </table>
                    </div>
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

@push('addon-script')
  <script>
    var datatable = $('#crudTable').DataTable({
      processing: true,
      ordering: true,
      serverSide: true,
      ajax: {
        url: '{!! url()->current() !!}'
      },
      columns: [
        {data: 'id', name: 'id'},
        {data: 'name', name: 'name'},
        {data: 'photo', name: 'photo'},
        {data: 'slug', name: 'slug'},
        {data: 'action', name: 'action', orderable: false, searchable: false, width: '15%'},
      ]
    })
  </script>
@endpush