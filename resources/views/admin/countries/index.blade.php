@extends('layouts.layout-admin')
@section('content')



        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3 d-none d-sm-flex">Home</div>
                <div class="ps-3 d-sm-flex d-none">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">Master</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Country</li>
                        </ol>
                    </nav>
                </div>
                @can('country_create')
                    <div class="ms-auto">
                        <div class="btn-group">
                            <a href="{{ route('admin.countries.create') }}" class="btn btn-primary"><i class="bx bxs-plus-square"></i> {{ trans('global.add') }} {{ trans('cruds.country.title_singular') }}</a>
                        </div>
                    </div>
                @endcan
            </div>
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">Country</h6>
            <hr/>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="countries_table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>

                                <th>
                                   Name
                                </th>
                                <th>
                                    Short Code
                                </th>
                                <th width="5px">
                                    Active
                                </th>
                                @can('country_show')
                                <th style="border-right: none; width: 10px">
                                    &nbsp;Action
                                </th>
                                @endcan
                                @can('country_edit')
                                    <th style="border-right: none; width: 10px"></th>
                                @endcan
                                @can('country_delete')
                                      <th style="border-right: none; width: 10px"></th>
                                @endcan
                            </tr>
                            </thead>
{{--                            <tbody>--}}
{{--                            @foreach($countries as $key => $country)--}}
{{--                                <tr data-entry-id="{{ $country->id }}">--}}
{{--                                    <td>--}}
{{--                                        {{ $country->name ?? '' }}--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        {{ $country->short_code ?? '' }}--}}
{{--                                    </td>--}}
{{--                                    <td width="20px">--}}

{{--                                        @can('country_show')--}}
{{--                                            <a class="btn btn-outline-primary" href="{{ route('admin.countries.show', $country->id) }}">--}}
{{--                                                <i class="bx bx-folder-plus me-0"></i>--}}
{{--                                            </a>--}}
{{--                                        @endcan--}}

{{--                                        @can('country_edit')--}}
{{--                                            <a class="btn btn-outline-dark" href="{{ route('admin.countries.edit', $country->id) }}">--}}
{{--                                                <i class="bx bxs-pen me-0"></i>--}}
{{--                                            </a>--}}
{{--                                        @endcan--}}

{{--                                        @can('country_delete')--}}
{{--                                            <form action="{{ route('admin.countries.destroy', $country->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">--}}
{{--                                                <input type="hidden" name="_method" value="DELETE">--}}
{{--                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
{{--                                                <input type="submit" class="btn btn-outline-danger" value="{{ trans('global.delete') }}">--}}
{{--                                            </form>--}}
{{--                                        @endcan--}}

{{--                                    </td>--}}

{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}

                        </table>
                    </div>
                </div>
            </div>

        </div>

    <script>
        $(document).ready(function () {
            $('#countries_table').dataTable({
                processing: true,
                ServerSide: true,
                order: [[ 1, 'desc' ]],
                // pageLength: 100,
                ajax:{
                    url: "{{ route('admin.countries.index') }}",
                },
                columns:[
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'short_code',
                        name: 'short_code'
                    },
                    {
                        data: 'isActive',
                        name: 'isActive',
                        orderable: false
                    },
                    @can('country_show')
                    {
                        data: 'show',
                        name: 'show',
                        orderable: false

                    },
                    @endcan
                    @can('country_edit')
                    {
                        data: 'edit',
                        name: 'edit',
                        orderable: false

                    },
                    @endcan
                    @can('country_delete')
                    {
                        data: 'delete',
                        name: 'delete',
                        orderable: false
                    }
                    @endcan
                ]
            });
        });
    </script>
{{--    <script>--}}
{{--        function ConfirmDelete()--}}
{{--        {--}}
{{--            alert()--}}
{{--            var result = confirm("Are you sure you want to delete?");--}}
{{--            if (result) {--}}
{{--                document.getElementById("deleteData").submit();--}}
{{--            }--}}
{{--        }--}}
{{--    </script>--}}

@endsection
