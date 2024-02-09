<form action="" id="changePasswordForm" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="user_id" value="{{ $id }}">

    <div class="input-group mb-3" id="show_hide_password">
        <input type="password" name="new_password" id="password" class="form-control" placeholder="Enter new password">
        <div class="input-group-append">
            <span class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
        </div>
    </div>
    <span class="error text-danger" id="new_password_error"></span>

    <div class="text-right">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="submit" id="btnSubmit">
            Change Password
        </button>
    </div>
</form>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>


    $(document).ready(function() {

        // Password Icon
        $("#show_hide_password span").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("fa-eye-slash");
                $('#show_hide_password i').removeClass("fa-eye");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("fa-eye-slash");
                $('#show_hide_password i').addClass("fa-eye");
            }
        });


        // Change Password form
        // $('#loading').hide();

        $("#changePasswordForm").submit(function(e) {
            e.preventDefault();

            const fd = new FormData(this);

            $.ajax({
                url: "{{route('user.profile.changePasswordSubmit')}}",
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                beforeSend: function() {
                    $("#btnSubmit").html("Please Wait");
                    $('#btnSubmit').attr('disabled', true);
                },
                error: function(xhr) {
                    console.log(xhr);
                    $("[id$='_error']").html('');
                    $("#btnSubmit").html("Change Password");
                    $('#btnSubmit').attr('disabled', false);
                    $.each(xhr.responseJSON.errors, function(key, value) {
                        $('#' + key + '_error').html('<span style="color:red">' +
                            value +
                            '</span');
                    });
                    $("#btnSubmit").html("Change Password");
                    $('#btnSubmit').attr('disabled', false);
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == 200) {
                        // $('#bookappointment').addClass('removeZindex');
                        swal(data.message, "Thank You :)", "success");
                        setTimeout(() => {
                            location.reload();
                        }, 2000);
                    } else {
                        alert('Something went wrong');
                    }
                }

            });
        });


    });
</script>
