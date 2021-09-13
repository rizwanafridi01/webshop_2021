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
                            <li class="breadcrumb-item" aria-current="page">Company</li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <h6 class="mb-0 text-uppercase">Create Company</h6>
                    <hr/>
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div>
                                </div>
                                <h5 class="mb-0 text-primary">New Company</h5>
                            </div>
                            <hr>

                            <form  class="row g-3" method="POST" action="{{ route("admin.companies.store") }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-6">
                                    <label class="required mb-2" for="name">Company Name</label>
                                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" placeholder="Enter Company Name" required>
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                                </div>

                                <div class="col-md-6">
                                    <label class="required mb-2" for="representative">Representative</label>
                                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="representative" id="representative" value="{{ old('representative', '') }}" placeholder="Representative " required>
                                    @if($errors->has('representative'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('representative') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                                </div>

                                <div class="col-md-6">
                                    <label class="required mb-2" for="phone">Phone Number</label>
                                    <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}" placeholder="Enter Phone Number" required>
                                    @if($errors->has('phone'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('phone') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                                </div>

                                <div class="col-md-6">
                                    <label class="required mb-2" for="mobile">Mobile</label>
                                    <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text" name="mobile" id="mobile" value="{{ old('mobile', '') }}" placeholder="Mobile " required>
                                    @if($errors->has('mobile'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('mobile') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                                </div>

                                <h3 class="box-title mt-5">Address</h3>

                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label class="mb-2">Street</label>
                                            <input type="text" name="Address" placeholder="Address" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-2">Region</label>
                                            <select class="form-control custom-select region_id" name="region_id" id="region_id">

                                                <option value="">-- Select Region --</option>
                                                @foreach($regions as $region)
                                                    @if(!empty($region->name))
                                                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-2">City</label>
                                            <input type="text" name="City" id="city" placeholder="City" class="form-control">
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-2">State</label>
                                            <input type="text" name="State" id="state" PLACEHOLDER="State" class="form-control">
                                        </div>
                                    </div>
                                    <!--/span-->
                                <!--/row-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-2">Post Code</label>
                                            <input type="text" name="postCode" placeholder="PostCode" class="form-control">
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-2">Country</label>
                                            <input type="text" name="Country" id="country" PLACEHOLDER="Country" class="form-control">
                                        </div>
                                    </div>
                                    <!--/span-->

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea name="description" id="description" cols="30" rows="5" class="form-control" style="width: 100%" placeholder="Note"></textarea>
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


    <script>
        /////////////////////////// location select /////////////////
        $(document).ready(function () {

            $('.region_id').change(function () {
                // alert();
                var Id = 0;
                Id = $(this).val();

                if (Id > 0)
                {
                    $.ajax({
                        url: "{{ URL('admin/locationDetails') }}/" + Id,
                        type: "get",
                        dataType: "json",
                        success: function (result) {
                            if (result !== "Failed") {
                                console.log(result);
                                $('#city').val(result.city.name);
                                $('#state').val(result.city.state.name);
                                $('#country').val(result.city.state.country.name);
                            } else {
                                alert(result);
                            }
                        },
                        error: function (errormessage) {
                            alert(errormessage);
                        }
                    });
                }
            });

        });
        ////////////// end of location select ////////////////
    </script>

@endsection

