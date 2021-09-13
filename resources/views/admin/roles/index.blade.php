@extends('layouts.layout-admin')
@section('content')


        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3 d-none d-sm-flex">Home</div>
                <div class="ps-3 d-sm-flex d-none">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">User Management</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Roles</li>
                        </ol>
                    </nav>
                </div>
                @can('role_create')
                    <div class="ms-auto">
                        <div class="btn-group">
                            <a href="{{ route('admin.roles.create') }}" class="btn btn-primary"> {{ trans('global.add') }} {{ trans('cruds.role.title_singular') }}</a>
                        </div>
                    </div>
                @endcan
            </div>
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">Users</h6>
            <hr/>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered datatable-Role" style="width:100%">
                            <thead>
                            <tr>

{{--                                <th>--}}
{{--                                    {{ trans('cruds.role.fields.id') }}--}}
{{--                                </th>--}}
                                <th>
                                    {{ trans('cruds.role.fields.title') }}
                                </th>
                                <th>
                                    {{ trans('cruds.role.fields.permissions') }}
                                </th>
                                <th>
                                    &nbsp;Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $key => $role)
                                <tr data-entry-id="{{ $role->id }}">
{{--                                    <td>--}}
{{--                                        {{ $role->id ?? '' }}--}}
{{--                                    </td>--}}
                                    <td>
                                        {{ $role->title ?? '' }}
                                    </td>
                                    <td>

                                        <div class="row">
                                        @foreach($role->permissions as $key => $item)
                                            <div class="col-2">
                                            <span class="badge bg-warning" style="font-size: 9px">{{ $item->title }}</span>
                                            </div>

                                        @endforeach
                                        </div>
                                    </td>

                                    <td width="20px">

                                        @can('role_show')
                                            <a class="btn btn-outline-primary" href="{{ route('admin.roles.show', $role->id) }}">
                                                <i class="bx bx-folder-plus me-0"></i>
                                            </a>
                                        @endcan

                                        @can('role_edit')
                                            <a class="btn btn-outline-dark" href="{{ route('admin.roles.edit', $role->id) }}">
                                                <i class="bx bxs-pen me-0"></i>
                                            </a>
                                        @endcan

                                        @can('role_delete')
                                            <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="btn btn-outline-danger" value="{{ trans('global.delete') }}">
                                            </form>
                                        @endcan

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>


@endsection
