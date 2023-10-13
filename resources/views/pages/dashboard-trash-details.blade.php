@extends('layouts.dashboard')

@section('title')
    Store Dashboard Product Detail
@endsection

@section('content')
<!-- Section Content -->
<div
  class="section-content section-dashboard-home"
  data-aos="fade-up"
>
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">Shirup Marzan</h2>
      <p class="dashboard-subtitle">
        Product Details
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
          <form action="{{ route('dashboard-trash-update', $typeTrash->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Pilih Tipe Sampah</label>
                      <select name="type_trash_id" class="form-control" required>
                        <option value="">Pilih Tipe</option>
                        @foreach ($types as $type)
                          <option value=" {{ $type->id }} " @if($type->id == $typeTrash->id) selected @endif data-price="{{ $type->price }}">{{ $type->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Price</label>
                      <input type="number" class="form-control" name="price" value="{{ $typeTrash->price }}" readonly/>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Qty (Kg)</label>
                      <input type="number" class="form-control" name="qty" value="{{ $typeTrash->qty }}" />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Description</label>
                      <textarea name="text" id="editor">{!! $typeTrash->text !!}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col text-right">
                    <button
                      type="submit"
                      class="btn btn-success px-5 btn-block"
                    >
                      Save Now
                    </button>
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
  <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

  <script>
    CKEDITOR.replace("editor");
  </script>
  <script>
        $(document).ready(function() {
            $("select[name='type_trash_id']").change(function() {
                $selectedPrice = $(this).find(':selected').data('price');
                $("input[name='price']").val($selectedPrice);
            });

            $('form').submit(function(event) {
                var qty = parseFloat($("input[name='qty']").val());

                if (qty < 0) {
                    event.preventDefault(); // Menghentikan pengiriman formulir jika qty negatif.
                    alert('Qty tidak boleh negatif.');
                }
            });
        });
    </script>
@endpush
