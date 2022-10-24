$(document).ready(function() {

    $('#sample_form').on('submit', function(event) {
        alert('hello');
        console.log('hi');

        event.preventDefault();
        if($('#mytitle-error').val() == '')
        {
            $('#mytitle-error').text('نام کاربری را وارد کنید');
            count_error++;
        }
        else
        {
            $('#mytitle-error').text('');
        }
        // ===================================
        if($('#myimage-error').val() == '')
        {
            $('#myimage-error').text('انتخاب تصویر پروژه الزامی می باشد');
            count_error++;
        }
        else
        {
            $('#myimage-error').text('');
        }
        // ===================================
        if($('#myfile-error').val() == '')
        {
            $('#myfile-error').text('انتخاب فایل پروژه الزامی می باشد');
            count_error++;
        }
        else
        {
            $('#myfile-error').text('');
        }

        // ===================================
        if($('#mygroup-error').val() == '')
        {
            $('#mygroup-error').text('گروه پروژه را انتخاب کنید');
            count_error++;
        }
        else
        {
            $('#mygroup-error').text('');
        }


        var formData = new FormData();


        console.log(formData);
        $.ajax({
            xhr : function() {
                var xhr = new window.XMLHttpRequest();
                console.log(xhr);

                xhr.upload.addEventListener('progress', function(e) {


                    if (e.lengthComputable) {

                        console.log('Bytes Loaded: ' + e.loaded);
                        console.log('Total Size: ' + e.total);
                        console.log('Percentage Uploaded: ' + (e.loaded / e.total))

                        var percent = Math.round((e.loaded / e.total) * 100);


                        $('#progressBar').attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '%');

                    }

                });

                return xhr;
            },
            type : 'POST',
            url:'manager/addproject.php',
            data : formData,
            processData : false,
            contentType : false,
            success : function() {

            }
        });

    });

});