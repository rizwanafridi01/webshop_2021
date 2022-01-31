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
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-xl-12 mx-auto">
{{--                <h6 class="mb-0 text-uppercase">Edit Product</h6>--}}
                <hr/>
                <div class="card border-top border-0 border-4 border-primary">
                    <form  class="row g-3" method="POST" action="{{ route("admin.products.update", [$product->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
                                <div>
                                </div>
                                <h5 class="mb-0 text-primary">Edit Product</h5>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-md-6 py-2">
                                    <label class="required mb-2" for="name">Product Name</label>
                                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $product->name) }}" placeholder="Enter Product Name" required>
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6 py-2">
                                    <label class="required mb-2" for="name">Thumbnail</label>
                                    <input class="form-control {{ $errors->has('thumbnail') ? 'is-invalid' : '' }}" type="file" name="thumbnail" id="thumbnail" value="{{ old('thumbnail', '') }}" >
                                    <input type="hidden" name="previousName" value="{{ $product->thumbnail }}">
                                    @if($errors->has('thumbnail'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('thumbnail') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 py-2">
                                    <label class="mb-2"   for="category_id">Category</label>
                                    <select name="category_id" id="category_id" class="form-select category_id mb-3" aria-label="Category">
                                        <option selected="" readonly="" disabled>Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ ($category->id == $product->sub_category->category_id) ? 'selected':'' }}>{{ $category->name }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="col-md-3 py-2">
                                    {{--                                    <label class=" mb-2" for="subCategory_id">Sub Category</label>--}}
                                    {{--                                    <input name="subCategory_id" id="subCategory_id" class="form-control subCategory_id slct" list="datalistOptions" placeholder="Sub Category">--}}
                                    <label class="mb-2" for="subCategory_id">Sub Category</label>
                                    <select name="subCategory_id" id="subCategory_id" class="form-select subCategory_id mb-3" aria-label="Sub Category">
                                        <option selected="" readonly="" disabled>Select Sub Category</option>
                                        <option value="{{ $product->sub_category_id }}" {{ ($product->sub_category_id == $product->sub_category->id) ? 'selected':'' }}>{{ $product->sub_category->name }}</option>

                                    </select>
                                </div>

                                <div class="col-md-3 py-2">
                                    <label class="required mb-2" for="name">Price</label>
                                    <input class="form-control amount {{ $errors->has('amount') ? 'is-invalid' : '' }}" onClick="this.setSelectionRange(0, this.value.length)" type="text" name="amount" id="amount" value="{{ old('name', $product->amount) }}" placeholder="0.00" required>
                                    @if($errors->has('amount'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('amount') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-3 py-2">
                                    <label class="required mb-2" for="name">Discount</label>
                                    <input class="form-control discount {{ $errors->has('discount') ? 'is-invalid' : '' }}" onClick="this.setSelectionRange(0, this.value.length)" type="text" name="discount" id="discount" value="{{ old('discount', $product->discount) }}" placeholder="0.00">
                                    @if($errors->has('discount'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('discount') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="card-body ">
                            <div class="card-title d-flex align-items-center">
                                <div>
                                </div>
                                <h5 class="mb-0 text-primary">Classifications</h5>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 py-2">
                                    <div class="table-responsive">
                                        <table class="table color-bordered-table success-bordered-table ">
                                            <thead class="table-dark">
                                            <tr>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th style="width: 10px"> <span class="actionText1">Action</span> <input class=" btn btn-success addRow1 AddrowHead1" id="addRow1" type="button" value="+" /></th>
                                            </tr>
                                            </thead>
                                            <tbody id="newRow1">
                                            @foreach($product->product_classifications as $classification)
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <input name="classificationName[]" id="classificationName" type="text" class="form-control classificationName slct" value="{{ old('classificationName', $classification->name) }}" placeholder="Classification Name"  required>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input name="classificationDesc[]" id="classificationDesc" type="text" class="form-control classificationDesc slct" value="{{ old('classificationDesc', $classification->description) }}" placeholder="classification Description" required>
                                                            </div>
                                                        </td>
                                                        <td><input class=" btn btn-danger remove1" id="remove1" type="button" value="X" /></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card-body ">
                            <div class="card-title d-flex align-items-center">
                                <div>
                                </div>
                                <h5 class="mb-0 text-primary">Gallery</h5>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 py-2">
                                    <div class="table-responsive">
                                        <table class="table color-bordered-table success-bordered-table ">
                                            <thead class="table-dark">
                                            <tr>

                                                <th>Files</th>
                                                <th></th>
                                                <th style="width: 10px"> <span class="actionText">Action</span> <input class=" btn btn-success addRow AddrowHead" id="addRow" type="button" value="+" /></th>
                                            </tr>
                                            </thead>
                                            <tbody id="">
                                            @foreach($product->product_galleries as $gallery)
                                                <tr>

                                                    <td>

                                                        <div  class="form-group">
                                                            <input name="galleryImages[]" id="galleryImages" type="file" value="{{ $gallery->galleryImages }}" class="form-control galleryImages slct" placeholder="galleryImages" >
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <img style="width: 40px" src="{{ asset('files/'. $gallery->galleryImages) }}" alt="">
                                                        <input type="hidden" name="previousImageName[]" value="{{ $gallery->galleryImages }}">
                                                    </td>
                                                    <td><input class=" btn btn-danger remove" id="remove" type="button" value="X" /></td>
                                                </tr>
                                                </tbody>
                                            @endforeach
                                            <tbody id="newRow">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-12 my-4">
                                    <h6 class="mb-0 text-primary">Excerpt</h6>
                                    <hr>
                                    <textarea name="excerpt" id="excerpt" style="width: 100%; height: 100px" placeholder="Excerpt" class="">{{ $product->excerpt }}</textarea>
                                </div>
                                <div class="col-md-12 my-4">
                                    <h6 class="mb-0 text-primary">Shipping Instruction</h6>
                                    <hr>
                                    <textarea name="shippingInstruction" id="shippingInstruction" style="width: 100%; height: 100px" placeholder="shipping Instruction" class="" >{{ $product->shippingInstruction }}</textarea>
                                </div>

                                <div class="col-md-12">
                                    <h6 class="mb-0 text-primary">Description</h6>
                                    <hr>
                                    <textarea name="description" id="description" style="width: 100%; height: 100px" placeholder="Description" class="ckeditor">{!! $product->description !!}</textarea>
                                </div>

                                <div class="col-md-12 my-4">
                                    <h6 class="mb-0 text-primary">Uses</h6>
                                    <hr>
                                    <textarea name="uses" id="uses" style="width: 100%; height: 100px" placeholder="Uses" class="ckeditor">{!! $product->uses !!}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="col-12">
                                <button type="submit" id="submit" class="btn btn-primary px-5"> {{ trans('global.save') }}</button>
                            </div>
                        </div>


                    </form>

                </div>
            </div>
        </div>
        <!--end row-->

    </div>

    <script>
        $(document).ready(function (){

            ///////////////////// Add new Row images //////////////////////
            $('.actionText').hide();
            $(document).on("click",'.addRow', function () {
                var currentRow = $(this).closest("tr");
                if (validateRow(currentRow)) {
                    $('.addRow').removeAttr("value", "");
                    $('.addRow').attr("value", "X");
                    $('.addRow').removeClass('btn-success').addClass('btn-danger');
                    $('.addRow').removeClass('addRow').addClass('remove');
                    $('.AddrowHead').hide();
                    $('.actionText').show();
                    var html = '';
                    html += '<tr>';
                    html += '<td><input name="galleryImages[]" onchange="previewFile(this);" id="galleryImages" class="form-control galleryImages slct" type="file" placeholder="galleryImages" required></td>';
                    html += '<td></td>';
                    html += '<td><input class="btn btn-success addRow" id="addRow" type="button" value="+" /></td>';
                    html += '</tr>';
                    $('#newRow').append(html);
                }
            });
            ///////// end of add new image row //////////////
            ////////////// Remove images row ///////////////
            $(document).on("click",'.remove', function () {
                var Current = $(this).closest('tr');
                Current.remove();
            });
            /////////////end remove images row //////////////



            ///////////////////// Add new Row images //////////////////////

            $('.actionText1').hide();
            $(document).on("click",'.addRow1', function () {
                var currentRow = $(this).closest("tr");
                if (validateRow(currentRow)) {
                    $('.addRow1').removeAttr("value", "");
                    $('.addRow1').attr("value", "X");
                    $('.addRow1').removeClass('btn-success').addClass('btn-danger');
                    $('.addRow1').removeClass('addRow1').addClass('remove1');
                    $('.AddrowHead1').hide();
                    $('.actionText1').show();
                    var html = '';
                    html += '<tr>';
                    html += '<td><input name="classificationName[]" id="classificationName" class="form-control classificationName slct" type="text" placeholder="Classification Name"></td>';
                    html += '<td><input name="classificationDesc[]" id="classificationDesc" class="form-control classificationDesc slct" type="text" placeholder="Classification Description"></td>';
                    html += '<td><input class="btn btn-success addRow1" id="addRow1" type="button" value="+" /></td>';
                    html += '</tr>';
                    $('#newRow1').append(html);
                }
            });
            ///////// end of add new image row //////////////
            ////////////// Remove images row ///////////////
            $(document).on("click",'.remove1', function () {
                var Current = $(this).closest('tr');
                Current.remove();
            });
            /////////////end remove images row //////////////





            {{--//////////////////////////////// Add Record //////////////////////--}}
            {{--$('#submit1').click(function () {--}}

            {{--    $('#submit').text('please wait...');--}}
            {{--    $('#submit').attr('disabled',true);--}}

            {{--    var subCategory = $('.subCategory_id').val();--}}
            {{--    if (subCategory != null)--}}
            {{--    {--}}
            {{--        var insert = [], orderItem = [], nonArrayData = "";--}}
            {{--        var formData = new FormData();--}}

            {{--        // jQuery.each($("input[name^='galleryImages']")[0].files, function(i, file) {--}}
            {{--        //     formData.append('galleryImages['+i+']', file);--}}
            {{--        // });--}}

            {{--        var filesAmount = $("input[type=file]").files.length;--}}

            {{--        alert(filesAmount);--}}

            {{--        // $.each($("input[type=file]"), function(i, obj) {--}}
            {{--        //     $.each(obj.files,function(j, file){--}}
            {{--        //         formData.append('photo['+j+']', file);--}}
            {{--        //     })--}}
            {{--        // });--}}

            {{--        // let TotalImagesNumber = $('.galleryImages')[0].files.length; //Total files--}}
            {{--        // let TotalImages = $('.galleryImages')[0];--}}
            {{--        // for (let i = 0; i < TotalImagesNumber; i++) {--}}
            {{--        //     formData.append('tImages' + i, TotalImages.files[i]);--}}
            {{--        // }--}}
            {{--        // formData.append('TotalImagesNumber', TotalImagesNumber);--}}


            {{--        // $('#newRow tr').each(function () {--}}
            {{--        //      var currentRow = $(this).closest("tr");--}}
            {{--            // formData.append(currentRow.find('.galleryImages')[i].files);--}}
            {{--            // let TotalImagesNumber = currentRow.find('.galleryImages').files.length; //Total files--}}
            {{--            // let TotalImages = currentRow.find('.galleryImages')[0];--}}
            {{--            // // if (validateRow(currentRow)) {--}}
            {{--            // formData.append('TotalImages', TotalImages.files[0]);--}}
            {{--            // formData.append('TotalImagesNumber', TotalImagesNumber);--}}
            {{--            // insert.push(orderItem);--}}

            {{--            // if (validateRow(currentRow)) {--}}
            {{--            //     orderItem =--}}
            {{--            //         {--}}
            {{--            //             galleryImages: currentRow.find('.galleryImages').val(),--}}
            {{--            //         };--}}
            {{--            // insert.push(orderItem)--}}

            {{--            // }--}}
            {{--            // else--}}
            {{--            // {--}}
            {{--            //     return false;--}}
            {{--            // }--}}
            {{--        // });--}}
            {{--        // formData.append('insert', $(".galleryImages").serialize());--}}
            {{--        // let TotalImages = $('#thumbnail')[0].files[0].type;  //Total Images--}}
            {{--        //  let images = $('#thumbnail')[0].files[0];--}}
            {{--        // for (let i = 0; i < TotalImages; i++) {--}}
            {{--        //   var im=  $('images' + i, images.files[i]);--}}
            {{--        // }--}}

            {{--        let TotalFiles = $('#thumbnail')[0].files.length; //Total files--}}
            {{--        let files = $('#thumbnail')[0];--}}
            {{--        // for (let i = 0; i < TotalFiles; i++) {--}}
            {{--        formData.append('files', files.files[0]);--}}
            {{--        // }--}}
            {{--        formData.append('TotalFiles', TotalFiles);--}}
            {{--        formData.append('name', $('#name').val());--}}
            {{--        formData.append('subCategory_id', $('#subCategory_id').val());--}}
            {{--        formData.append('amount', $('#amount').val());--}}
            {{--        formData.append('discount', $('#discount').val());--}}
            {{--        formData.append('description', $('#description').val());--}}
            {{--        // let details = {--}}
            {{--        //     // name: $('#name').val(),--}}
            {{--        //     // thumbnail: $('#thumbnail')[0].files[0],--}}
            {{--        //     // category_id: $('#category_id').val(),--}}
            {{--        //     // subCategory_id: $('#subCategory_id').val(),--}}
            {{--        //     // amount: $('.amount').val(),--}}
            {{--        //     // discount: $('.discount').val(),--}}
            {{--        //     // description: $('.description').val(),--}}
            {{--        //     orders: insert,--}}
            {{--        // }--}}
            {{--        // var Datas = {Data: details}--}}
            {{--        // console.log(Datas);--}}
            {{--        if (TotalFiles > 0) {--}}
            {{--            $.ajaxSetup({--}}
            {{--                headers: {--}}
            {{--                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
            {{--                }--}}
            {{--            });--}}
            {{--            // var Datas = {Data: details};--}}
            {{--            //console.log(Datas);--}}
            {{--            $.ajax({--}}
            {{--                url: "{{ route('admin.products.store') }}",--}}
            {{--                type: "post",--}}
            {{--                dataType: 'json',--}}
            {{--                processData: false,--}}
            {{--                contentType: false,--}}
            {{--                data: formData,--}}
            {{--                success: (data) => {--}}
            {{--                    console.log(data)--}}
            {{--                    // this.reset();--}}
            {{--                    alert('Files has been uploaded using jQuery ajax');--}}
            {{--                },--}}
            {{--                error: function(data){--}}
            {{--                    alert(data.responseJSON.errors.files[0]);--}}
            {{--                    console.log(data.responseJSON.errors);--}}
            {{--                }--}}

            {{--                --}}{{--success: function (result) {--}}
            {{--                --}}{{--    if (result !== "Failed") {--}}
            {{--                --}}{{--        details = [];--}}
            {{--                --}}{{--        console.log(result);--}}
            {{--                --}}{{--        //alert("Data Inserted Successfully");--}}
            {{--                --}}{{--        --}}{{----}}{{--//window.location.href = "{{ route('admin.products.create') }}";--}}

            {{--                --}}{{--    } else {--}}
            {{--                --}}{{--        alert(result);--}}
            {{--                --}}{{--    }--}}
            {{--                --}}{{--},--}}
            {{--                --}}{{--error: function (errormessage) {--}}
            {{--                --}}{{--    alert(errormessage);--}}
            {{--                --}}{{--}--}}
            {{--            });--}}
            {{--        } else--}}
            {{--        {--}}
            {{--            alert('Please Add item to list');--}}
            {{--            $('#submit').text('Save');--}}
            {{--            $('#submit').attr('disabled',false);--}}
            {{--        }--}}
            {{--    }--}}
            {{--    else--}}
            {{--    {--}}
            {{--        alert('Select Category first')--}}
            {{--        $('#submit').text('Save');--}}
            {{--        $('#submit').attr('disabled',false);--}}
            {{--    }--}}

            {{--});--}}
            {{--//////// end of submit Records /////////////////--}}



            /////////////////////////// Fetch Seb Category ////////////////////////////////
            $('.category_id').change(function (){
                var Id = 0;
                Id = $(this).val();
                if(Id>0){
                    $.ajax({
                        url: "{{ URL('admin/categoryDetails') }}/" + Id,
                        type: "get",
                        dataType: "json",
                        success: function (result) {
                            if (result !== "Failed") {
                                console.log(result);
                                //console.log(result.customer_prices[0].Rate);
                                // $('#VAT').val(result.customer_prices[0].VAT);
                                $("#subCategory_id").html('');
                                var subCategoryDetails = '';
                                if (result.sub_categories.length > 0)
                                {
                                    for (var i = 0; i < result.sub_categories.length; i++) {
                                        // vehicleDetails += '<option value="' + result.customer_vehicles[i].registrationNumber + '">' + result.customer_vehicles[i].registrationNumber + '</option>';
                                        subCategoryDetails += '<option value="' + result.sub_categories[i].id + '">'+ result.sub_categories[i].name +'</option>';
                                    }
                                }
                                else {
                                    subCategoryDetails += '<option value="0">No Data</option>';
                                }
                                $("#subCategory_id").append(subCategoryDetails);
                            } else {
                                alert(result);
                            }
                        },
                        error: function (errormessage) {
                            alert(errormessage);
                        }
                    });
                }
            });
            ///////////////////////////// End Of Fetch Sub Category ///////////////
        });
    </script>

{{--    <script>--}}

{{--        function previewFile(input){--}}

{{--            // const Currentrow = $(this).closest("tr")--}}
{{--            // const preview = Currentrow.find('.preview').val()--}}
{{--            alert()--}}
{{--            const [file] = input.files--}}
{{--            // const preview = document.getElementById('preview')--}}
{{--            const preview = document.getElementById('preview')--}}
{{--            const reader = new FileReader()--}}
{{--            reader.onload = e => {--}}
{{--                const img = document.createElement('img')--}}
{{--                img.src = e.target.result--}}
{{--                img.width = 20--}}
{{--                img.height = 20--}}
{{--                img.alt =- file--}}

{{--                preview.appendChild(img)--}}

{{--            }--}}
{{--            reader.readAsDataURL(file)--}}
{{--        }--}}
{{--    </script>--}}



    <script src="{{ asset('assets/invoice/invoice.js') }}"></script>
@endsection
