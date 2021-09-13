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
                            <li class="breadcrumb-item active" aria-current="page">Users</li>
                        </ol>
                    </nav>
                </div>
                @can('user_create')
                    <div class="ms-auto">
                        <div class="btn-group">
                            <a href="{{ route('admin.users.create') }}" class="btn btn-primary"> {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}</a>
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
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>

                                <th>
                                    {{ trans('cruds.user.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.user.fields.name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.user.fields.email') }}
                                </th>
                                <th>
                                    {{ trans('cruds.user.fields.email_verified_at') }}
                                </th>
                                <th>
                                    {{ trans('cruds.user.fields.roles') }}
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key => $user)
                                <tr data-entry-id="{{ $user->id }}">
                                    <td width="10px">
                                        {{ $user->id ?? '' }}
                                    </td>
                                    <td>
                                        {{ $user->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $user->email ?? '' }}
                                    </td>
                                    <td>
                                        {{ $user->email_verified_at ?? '' }}
                                    </td>
                                    <td>
                                        @foreach($user->roles as $key => $item)
                                            <span class="badge bg-warning">{{ $item->title }}</span>
                                        @endforeach
                                    </td>
                                    <td width="20px">

                                        @can('user_show')
                                            <a class="btn btn-outline-primary" href="{{ route('admin.users.show', $user->id) }}">
                                                <i class="bx bx-folder-plus me-0"></i>
                                            </a>
                                        @endcan

                                        @can('user_edit')
                                            <a class="btn btn-outline-dark" href="{{ route('admin.users.edit', $user->id) }}">
                                                <i class="bx bxs-pen me-0"></i>
                                            </a>
                                        @endcan

                                        @can('user_delete')
                                            <form action="{{ route('admin.permissions.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
