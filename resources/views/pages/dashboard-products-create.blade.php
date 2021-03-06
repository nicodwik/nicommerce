@extends('layouts.dashboard')

@section('title')
    Store Dashboard Product Create
@endsection

@section('content')
  <!-- Section Content -->
  <div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title">Create New Product</h2>
        <p class="dashboard-subtitle">Create your own product</p>
      </div>
      <div class="dashboard-content">
        <div class="row">
          <div class="col-12">
            @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      <li>{{$errors->first()}}</li>
                  </ul>
              </div>
            @endif
            <form action="{{route('dashboard-products-store')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="users_id" value="{{Auth::user()->id}}">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Product Name</label>
                        <input type="text" name="name" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" name="price" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Category</label>
                        <select name="categories_id" class="form-control">
                          <option value="" disabled>Select Category</option>
                          @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" id="editor"></textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Thumbnails</label>
                        <input type="file" name="photo" class="form-control">
                      </div>
                      <p class="text-muted mt-0">Kamu dapat memilih file lebih dari satu</p>
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
  <script>
    $('#menu-toggle').click(function(e) {
      e.preventDefault()
      $('#wrapper').toggleClass('toggled')
    })
  </script>
  <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('editor')
  </script>
@endpush
