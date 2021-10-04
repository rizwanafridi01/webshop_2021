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
                        <li class="breadcrumb-item" aria-current="page">Category</li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <h6 class="mb-0 text-uppercase">Create Category</h6>
                <hr/>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div>
                            </div>
                            <h5 class="mb-0 text-primary">Category</h5>
                        </div>
                        <hr>

                        <form  class="row g-3" method="POST" action="{{ route("admin.categories.update", $category->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <label class="required mb-2" for="name">Category Name</label>
                                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $category->name) }}" placeholder="Enter Category Name" required>
                                @if($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="description" id="description" cols="30" rows="5" class="form-control" style="width: 100%" placeholder="Note">{{ $category->description }}</textarea>
                                </div>
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

