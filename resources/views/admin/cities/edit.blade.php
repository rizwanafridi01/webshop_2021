@extends('layouts.layout-admin')
@section('content')


        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Home</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;">Master</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">City</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <h6 class="mb-0 text-uppercase">Edit City</h6>
                    <hr/>
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div>
                                </div>
                                <h5 class="mb-0 text-primary">Edit City</h5>
                            </div>
                            <hr>

                            <form method="POST" action="{{ route("admin.cities.update", [$city->id]) }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="col-md-12 mb-3">
                                    <label class="required mb-2" for="name">City Name</label>
                                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $city->name) }}" required>
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.country.fields.name_helper') }}</span>
                                </div>

                                <div class="col-md-12">
                                    <label class="mb-2" for="stateList">State</label>
                                    <select name="state_id" class="form-select mb-3" aria-label="Default select example">
                                        <option selected="" readonly="" disabled>Select State</option>
                                        @foreach($states as $state)
                                            <option value="{{ $state->id }}" {{ ($state->id == $city->state_id) ? 'selected':'' }}>{{ $state->name }}</option>
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
