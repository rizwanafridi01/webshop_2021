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
                        <li class="breadcrumb-item" aria-current="page">Product</li>
                        <li class="breadcrumb-item active" aria-current="page">Show</li>
                    </ol>
                </nav>
            </div>

            @can('product_create')
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary"><i class="bx bxs-plus-square"></i>New Product</a>
                    </div>
                </div>
            @endcan
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-12 mx-auto">

                <h6 class="mb-0 text-uppercase">Product</h6>
                <hr/>
                <div class="card">
                    <div class="card-body">
                        <table class="table mb-0 table-hover">

                            <tbody>
                            <tr>
                                <th>
                                    Product Id
                                </th>
                                <td>
                                    {{ $product->id }}
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Product Name
                                </th>
                                <td>
                                    {{ $product->name }}
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Product Thumbnail
                                </th>
                                <td>
                                    <img width="50" src="{{ asset('files/'. $product->thumbnail ) }}" alt="">
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Product Gallery
                                </th>
                                <td>
                                    @if(!empty($product->product_galleries))
                                        @foreach($product->product_galleries as $gallery)
                                        <img width="50" style="border: dashed 1px #0a53be " src="{{ asset('files/'. $gallery->galleryImages ) }}" alt="">
                                        @endforeach
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Price
                                </th>
                                <td>
                                    {{ $product->amount }}
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Discount
                                </th>
                                <td>
                                    {{ $product->discount }}
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Current Price
                                </th>
                                <td>
                                    {{ $product->currentAmount }}
                                </td>
                            </tr>

                            <tr>
                                <th colspan="2" style="background: #0a53be; color: whitesmoke">
                                    Classifications
                                </th>
                                <td>
                                    @if(!empty($product->product_classifications))
                                        @foreach($product->product_classifications as $classification)
                                            <tr style="background: #8a8a8a; color: white">
                                                <th>{{ $classification->name }}</th>
                                                <td>{{ $classification->description }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th>
                                     Product Excerpt
                                </th>
                                <td>
                                     {!! $product->excerpt ?? "No Ecxerpt" !!}
                                </td>
                            </tr>
                            <tr>
                                  <th>
                                      Shipping address
                                  </th>
                                  <td>
                                     {!! $product->shippingInstruction ?? "No Shipping Address" !!}
                                  </td>
                            </tr>
                            <tr>
                                <th>
                                    Product Description
                                </th>
                                <td>
                                    {!! $product->description ?? "No Description" !!}
                                </td>
                            </tr>

                            <tr>
                                 <th>
                                                    Product Uses
                                 </th>
                                 <td>
                                     {!! $product->uses ?? "No Uses" !!}
                                 </td>
                            </tr>



                            </tbody>
                        </table>

                        <div class="form-group mt-4">
                            <a class="btn btn-inverse-dark" href="{{ route('admin.products.index') }}">
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
