<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Ajax Multiple File Upload - Tutsmake.com</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Multiple File Upload Using Ajax In Laravel 8</h2>
    <div class="text-center">
        <form  method="POST"  action="javascript:void(0)" accept-charset="utf-8" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="file" name="files[]" id="files" placeholder="Choose files" multiple >
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="button" id="multi-file-upload-ajax" class="btn btn-primary" >Submit</button>
                </div>

                <div class="form-group">
                    <input type="text" name="names" id="names" placeholder="Choose names"  >
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#multi-file-upload-ajax').click(function(e) {
            e.preventDefault();
            var formData = new FormData();
            let TotalFiles = $('#files')[0].files.length; //Total files
            let files = $('#files')[0];
            // for (let i = 0; i < TotalFiles; i++) {
                formData.append('files', files.files[0]);
                formData.append('names', $('#names').val());
            // }
            formData.append('TotalFiles', TotalFiles);
            console.log(formData);
            $.ajax({
                type:'POST',
                url: "{{ url('store-multi-file-ajax')}}",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: (data) => {
                    console.log(data)
                    // this.reset();
                    alert('Files has been uploaded using jQuery ajax');
                },
                error: function(data){
                    alert(data.responseJSON.errors.files[0]);
                    console.log(data.responseJSON.errors);
                }
            });
        });
    });
</script>
</body>
</html>
