@extends('layouts.layout-admin')
@section('content')



    <!--start page wrapper -->

        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Home</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;">Master</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Unit</li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <h6 class="mb-0 text-uppercase">Create Unit</h6>
                    <hr/>
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div>
                                </div>
                                <h5 class="mb-0 text-primary">Unit</h5>
                            </div>
                            <hr>

                            <form  class="row g-3" method="POST" action="{{ route("admin.units.store") }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-6">
                                    <label class="required mb-2" for="name">City Name</label>
                                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" placeholder="Enter Unit Name" >
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label class="mb-2" for="productList">Product</label>
                                    <select name="product_id" class="form-select mb-3" aria-label="Default select example">
                                        <option selected="" readonly="" disabled>Select Product</option>
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach

                                    </select>
                                </div>


                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary px-5"> {{ trans('global.save') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->

        </div>




@endsection
