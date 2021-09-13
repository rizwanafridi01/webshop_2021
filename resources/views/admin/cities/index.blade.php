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
                            <li class="breadcrumb-item active" aria-current="page">City</li>
                        </ol>
                    </nav>
                </div>
                @can('city_create')
                    <div class="ms-auto">
                        <div class="btn-group">
                            <a href="{{ route('admin.cities.create') }}" class="btn btn-primary"><i class="bx bxs-plus-square"></i> New City</a>
                        </div>
                    </div>
                @endcan
            </div>
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">City</h6>
            <hr/>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="cities_table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>

                                <th>
                                    State Name
                                </th>
                                <th>
                                    City
                                </th>
                                <th width="5px">
                                    Active
                                </th>
                                @can('city_show')
                                    <th style="border-right: none; width: 10px">
                                        &nbsp;Action
                                    </th>
                                @endcan
                                @can('city_edit')
                                    <th style="border-right: none; width: 10px"></th>
                                @endcan
                                @can('city_delete')
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
            $('#cities_table').dataTable({
                processing: true,
                ServerSide: true,
                order: [[ 1, 'desc' ]],
                // pageLength: 100,
                ajax:{
                    url: "{{ route('admin.cities.index') }}",
                },
                columns:[
                    {
                        data: 'state.name',
                        name: 'state.name'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'isActive',
                        name: 'isActive',
                        orderable: false
                    },
                        @can('city_show')
                    {
                        data: 'show',
                        name: 'show',
                        orderable: false

                    },
                        @endcan
                        @can('city_edit')
                    {
                        data: 'edit',
                        name: 'edit',
                        orderable: false

                    },
                        @endcan
                        @can('city_delete')
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

@endsection
