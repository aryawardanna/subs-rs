@extends('layouts.dashboard')

@section('title')
    Store Dashboard Product
@endsection

@section('content')
    <!-- Section Content -->
          <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">My Trash</h2>
                <p class="dashboard-subtitle">
                  Manage it well and get money
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <a
                      href="{{ route('dashboard-trash-create') }}"
                      class="btn btn-success"
                      >Add New Trash</a
                    >
                  </div>
                </div>
                <div class="row mt-4">

                  @foreach ($typeTrash as $val)
                      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <a
                          href="{{ route('dashboard-trash-details', $val->id) }}"
                          class="card card-dashboard-product d-block"
                        >
                          <div class="card-body">
                            <img
                              src="{{ Storage::url($val->photos ?? '') }}"
                              alt=""
                              class="w-100 mb-2"
                            />
                            <div class="product-title">{{ $val->name }}</div>
                            <div class="product-title">Rp. {{ $val->price }} | {{ $val->qty }} Kg</div>
                          </div>
                        </a>
                      </div>
                  @endforeach

                </div>
              </div>
            </div>
          </div>
@endsection
