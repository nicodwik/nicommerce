@extends('layouts.admin')

@section('title')
    Product Gallery
@endsection

@section('content')
    <!-- Section Content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
          <div class="dashboard-heading">
            <h2 class="dashboard-title">Product</h2>
            <p class="dashboard-subtitle">List of Gallery</p>
          </div>
          <div class="dashboard-content">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                    <a href="{{route('product-galleries.create')}}" class="btn btn-primary mb-3">+ Tambah Gallery Baru</a>
                    <div class="table-responsive">
                      <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                        <thead>
                          <tr>
                            <td>ID</td>
                            <td>Produk</td>
                            <td>Foto</td>
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
        {data: 'product.name', name: 'product.name'},
        {data: 'photo', name: 'photo'},
        {data: 'action', name: 'action', orderable: false, searchable: false, width: '15%'},
      ]
    })
  </script>
@endpush