<html lang="en">
<head>
    <title>Laravel Multiple Image Upload with Add More Button - W3Adda</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>

<div class="container">
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
    <h3 class="jumbotron">Laravel Multiple Image Upload with Add More Button - W3Adda</h3>
    <form method="post" action="{{url('store-file')}}" enctype="multipart/form-data">
        @csrf

        <div>
            <input name="name" value="Rizwan" type="text">
        </div>

        <div class="input-group control-group img_div form-group col-md-4" >
            <input type="file" name="profileImage[]" class="form-control">
            <!-- Add More Button -->
            <div class="input-group-btn">
                <button class="btn btn-success btn-add-more" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
            </div>
            <!-- End -->
        </div>


        <!-- Add More Image upload field  -->
        <div class="clone hide ">
            <div class="control-group input-group form-group col-md-4" style="margin-top:10px">
                <input type="file" name="profileImage[]" class="form-control">
                <div class="input-group-btn">
                    <button class="btn btn-danger btn-remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                </div>
            </div>
        </div>
        <!-- End -->


        <div class="input-group control-group img_div form-group col-md-4" >
            <input type="file" name="class[]" class="form-control">
            <!-- Add More Button -->
            <div class="input-group-btn">
                <button class="btn btn-success btn-add-more" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
            </div>
            <!-- End -->
        </div>


        <!-- Add More Image upload field  -->
        <div class="clone hide ">
            <div class="control-group input-group form-group col-md-4" style="margin-top:10px">
                <input type="file" name="profileImage[]" class="form-control">
                <div class="input-group-btn">
                    <button class="btn btn-danger btn-remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                </div>
            </div>
        </div>
        <!-- End -->


        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-success" style="margin-top:10px">Upload Image</button>
            </div>
        </div>

    </form>
</div>
</body>
</html>
<script type="text/javascript">

    $(document).ready(function() {

        $(".btn-add-more").click(function(){
            var html = $(".clone").html();
            $(".img_div").after(html);
        });

        $("body").on("click",".btn-remove",function(){
            $(this).parents(".control-group").remove();
        });

    });

</script>
