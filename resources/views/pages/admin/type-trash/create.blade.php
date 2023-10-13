@extends('layouts.admin')

@section('title')
  Store Settings
@endsection

@section('content')
<!-- Section Content -->
<div
  class="section-content section-dashboard-home"
  data-aos="fade-up"
>
  <div class="container-fluid">
    <div class="dashboard-heading">
        <h2 class="dashboard-title">Type Trash</h2>
        <p class="dashboard-subtitle">
            Create New Type
        </p>
    </div>
    <div class="dashboard-content">
      <div class="row">
        <div class="col-12">
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <form action="{{ route('type-trash-store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
              <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama Tipe</label>
                            <input type="text" class="form-control" name="name" required />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" class="form-control" name="price" required />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" name="text" required />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        <label>Foto</label>
                        <input type="file" class="form-control" name="photos" placeholder="Photo" required />
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col text-right">
                    <button
                      type="submit"
                      class="btn btn-success px-5"
                    >
                      Save Now
                    </button>
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
