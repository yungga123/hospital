<script>
    $('#form-addpatient').submit(function(e) {
        e.preventDefault();
        var me = $(this);
        $.ajax({
            url: me.attr('action'),
            type: 'post',
            data: me.serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success == true) {
                    toastr.success("Successfully Added!");

                    $('#firstname').removeClass("is-invalid").addClass('is-valid');
                    $('#lastname').removeClass("is-invalid").addClass('is-valid');
                    $('#middlename').removeClass("is-invalid").addClass('is-valid');
                    $('#contact_no').removeClass("is-invalid").addClass('is-valid');
                    $('#address').removeClass("is-invalid").addClass('is-valid');
                    $('#date_of_admission').removeClass("is-invalid").addClass('is-valid');
                    $('#sickness').removeClass("is-invalid").addClass('is-valid');

                    $('#small_firstname').html('');
                    $('#small_lastname').html('');
                    $('#small_middlename').html('');
                    $('#small_contact_no').html('');
                    $('#small_address').html('');
                    $('#small_date_of_admission').html('');
                    $('#small_sickness').html('');

                    me[0].reset();


                } else {
                    $('#firstname').removeClass("is-invalid").addClass('is-valid');
                    $('#lastname').removeClass("is-invalid").addClass('is-valid');
                    $('#middlename').removeClass("is-invalid").addClass('is-valid');
                    $('#contact_no').removeClass("is-invalid").addClass('is-valid');
                    $('#address').removeClass("is-invalid").addClass('is-valid');
                    $('#date_of_admission').removeClass("is-invalid").addClass('is-valid');
                    $('#sickness').removeClass("is-invalid").addClass('is-valid');

                    $('#small_firstname').html('');
                    $('#small_lastname').html('');
                    $('#small_middlename').html('');
                    $('#small_contact_no').html('');
                    $('#small_address').html('');
                    $('#small_date_of_admission').html('');
                    $('#small_sickness').html('');

                    $.each(response.messages, function(key, value) {
                        if (value != '') {
                            $('#' + key).addClass("is-invalid");
                            $('#small_' + key).html(value);
                        }
                    });
                }

            }
        });
    });
</script>

</body>

</html>