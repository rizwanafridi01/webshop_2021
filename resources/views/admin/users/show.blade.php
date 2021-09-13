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

                @can('user_create')
                    <div class="ms-auto">
                        <div class="btn-group">
                            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">{{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}</a>
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
                            <table class="table mb-0 table-hover">

                                <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $user->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.email_verified_at') }}
                                    </th>
                                    <td>
                                        {{ $user->email_verified_at }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.roles') }}
                                    </th>
                                    <td>
                                        @foreach($user->roles as $key => $roles)
                                            <span class="label label-info">{{ $roles->title }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <div class="form-group mt-4">
                                <a class="btn btn-inverse-dark" href="{{ route('admin.users.index') }}">
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
