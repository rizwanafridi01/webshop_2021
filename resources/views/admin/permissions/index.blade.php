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
                            <li class="breadcrumb-item active" aria-current="page">Permissions</li>
                        </ol>
                    </nav>
                </div>
                @can('permission_create')
                    <div class="ms-auto">
                        <div class="btn-group">
                            <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary">{{ trans('global.add') }} {{ trans('cruds.permission.title_singular') }}</a>
                        </div>
                    </div>
                @endcan
            </div>
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">User Permissions</h6>
            <hr/>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permissions as $key => $permission)
                                <tr data-entry-id="{{ $permission->id }}">
                                    <td width="10px">
                                        {{ $permission->id ?? '' }}
                                    </td>
                                    <td>
                                        {{ $permission->title ?? '' }}
                                    </td>
                                    <td width="20px">

                                        @can('permission_show')
                                            <a class="btn btn-outline-primary" href="{{ route('admin.permissions.show', $permission->id) }}">
                                                <i class="bx bx-folder-plus me-0"></i>
                                            </a>
                                        @endcan

                                        @can('permission_edit')
                                            <a class="btn btn-outline-dark" href="{{ route('admin.permissions.edit', $permission->id) }}">
                                                <i class="bx bxs-pen me-0"></i>
                                            </a>
                                        @endcan

                                        @can('permission_delete')
                                            <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@section('scripts')
@parent
@endsection
