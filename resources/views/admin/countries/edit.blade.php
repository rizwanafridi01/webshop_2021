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
                            <li class="breadcrumb-item" aria-current="page">{{ trans('cruds.Country.title_singular') }}</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <h6 class="mb-0 text-uppercase">Edit Country</h6>
                    <hr/>
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div>
                                </div>
                                <h5 class="mb-0 text-primary">Edit Country</h5>
                            </div>
                            <hr>

                            <form method="POST" action="{{ route("admin.countries.update", [$country->id]) }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="col-md-12">
                                    <label class="required" for="name">{{ trans('cruds.country.fields.name') }}</label>
                                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $country->name) }}" required>
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.country.fields.name_helper') }}</span>
                                </div>

                                <div class="col-md-12">
                                    <label class="required" for="short_code">Short Code</label>
                                    <input class="form-control {{ $errors->has('short_code') ? 'is-invalid' : '' }}" type="text" name="short_code" id="short_code" value="{{ old('short_code', $country->short_code) }}" required>
                                    @if($errors->has('short_code'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('short_code') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.country.fields.short_code_helper') }}</span>
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
