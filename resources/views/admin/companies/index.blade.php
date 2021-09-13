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
                            <li class="breadcrumb-item active" aria-current="page">Company</li>
                        </ol>
                    </nav>
                </div>
                @can('company_create')
                    <div class="ms-auto">
                        <div class="btn-group">
                            <a href="{{ route('admin.companies.create') }}" class="btn btn-primary"><i class="bx bxs-plus-square"></i> New Company</a>
                        </div>
                    </div>
                @endcan
            </div>
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">Company</h6>
            <hr/>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="companies_table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>

                                <th>
                                    Name
                                </th>
                                <th>
                                    Representative
                                </th>
                                <th>
                                    Mobile
                                </th>
                                <th width="5px">
                                    Active
                                </th>
                                @can('company_show')
                                    <th style="border-right: none; width: 10px">
                                        &nbsp;Action
                                    </th>
                                @endcan
                                @can('company_edit')
                                    <th style="border-right: none; width: 10px"></th>
                                @endcan
                                @can('company_delete')
                                    <th style="border-right: none; width: 10px"></th>
                                @endcan
                            </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>

        </div>

    <script>
        $(document).ready(function () {
            $('#companies_table').dataTable({
                processing: true,
                ServerSide: true,
                order: [[ 1, 'desc' ]],
                // pageLength: 100,
                ajax:{
                    url: "{{ route('admin.companies.index') }}",
                },
                columns:[
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'representative',
                        name: 'representative'
                    },
                    {
                        data: 'mobile',
                        name: 'mobile'
                    },
                    {
                        data: 'isActive',
                        name: 'isActive',
                        orderable: false
                    },
                        @can('company_show')
                    {
                        data: 'show',
                        name: 'show',
                        orderable: false

                    },
                        @endcan
                        @can('company_edit')
                    {
                        data: 'edit',
                        name: 'edit',
                        orderable: false

                    },
                        @endcan
                        @can('company_delete')
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
