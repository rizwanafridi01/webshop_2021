@extends('layouts.layout-admin')
@section('content')



        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Home</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;">{{ trans('cruds.userManagement.title') }}</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">{{ trans('cruds.user.title_singular') }}</li>
                            <li class="breadcrumb-item active" aria-current="page">Show</li>
                        </ol>
                    </nav>
                </div>

                @can('role_create')
                    <div class="ms-auto">
                        <div class="btn-group">
                            <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">{{ trans('global.add') }} {{ trans('cruds.role.title_singular') }}</a>
                        </div>
                    </div>
                @endcan
            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-xl-12 mx-auto">

                    <h6 class="mb-0 text-uppercase">User</h6>
                    <hr/>
                    <div class="card">

                        <div class="card-body">
                            <div class="form-group">
                                <a class="btn btn-default" href="{{ route('admin.roles.index') }}">
                                    {{ trans('global.back_to_list') }}
                                </a>
                            </div>
                            <table class="table mb-0 table-hover">

                                <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.role.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $role->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.role.fields.title') }}
                                    </th>
                                    <td>
                                        {{ $role->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.role.fields.permissions') }}
                                    </th>
                                    <td>
                                        @foreach($role->permissions as $key => $permissions)
                                            <span class="badge bg-warning">{{ $permissions->title }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <div class="form-group">
                                <a class="btn btn-default" href="{{ route('admin.roles.index') }}">
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
