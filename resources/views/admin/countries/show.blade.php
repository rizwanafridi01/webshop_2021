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
                            <li class="breadcrumb-item" aria-current="page">{{ trans('cruds.country.title_singular') }}</li>
                            <li class="breadcrumb-item active" aria-current="page">Show</li>
                        </ol>
                    </nav>
                </div>

                @can('country_create')
                    <div class="ms-auto">
                        <div class="btn-group">
                            <a href="{{ route('admin.users.create') }}" class="btn btn-primary"><i class="bx bxs-plus-square"></i>{{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}</a>
                        </div>
                    </div>
                @endcan
            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-xl-12 mx-auto">

                    <h6 class="mb-0 text-uppercase">Country</h6>
                    <hr/>
                    <div class="card">
                        <div class="card-body">
                            <table class="table mb-0 table-hover">

                                <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.country.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $country->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.country.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $country->name }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Short Code
                                    </th>
                                    <td>
                                        {{ $country->short_code }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <div class="form-group mt-4">
                                <a class="btn btn-inverse-dark" href="{{ route('admin.countries.index') }}">
                                    {{ trans('global.back_to_list') }}
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--end row-->
        </div>

@endsection
