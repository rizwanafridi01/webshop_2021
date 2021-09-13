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
                            <li class="breadcrumb-item" aria-current="page">Region</li>
                            <li class="breadcrumb-item active" aria-current="page">Show</li>
                        </ol>
                    </nav>
                </div>

                @can('region_create')
                    <div class="ms-auto">
                        <div class="btn-group">
                            <a href="{{ route('admin.regions.create') }}" class="btn btn-primary"><i class="bx bxs-plus-square"></i>New Region</a>
                        </div>
                    </div>
                @endcan
            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-xl-12 mx-auto">

                    <h6 class="mb-0 text-uppercase">Region</h6>
                    <hr/>
                    <div class="card">
                        <div class="card-body">
                            <table class="table mb-0 table-hover">

                                <tbody>
                                <tr>
                                    <th>
                                        Region Id
                                    </th>
                                    <td>
                                        {{ $region->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Region Name
                                    </th>
                                    <td>
                                        {{ $region->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        City Name
                                    </th>
                                    <td>
                                        {{ $region->city->name ?? "No State" }}
                                    </td>
                                </tr>

                                </tbody>
                            </table>

                            <div class="form-group mt-4">
                                <a class="btn btn-inverse-dark" href="{{ route('admin.regions.index') }}">
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
