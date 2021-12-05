/*$(document).ready(function() {
	
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {

                var formData = new FormData(reader);

                $.ajax({
                type: "POST",
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "http://localhost:8080/catalogue/public/user/updateAvatar",

                data: formData,
                success: function (msg) {
                alert(msg)
                },
                cache: false,
                contentType: false,
                processData: false
                });
                
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "http://localhost:8080/catalogue/public/user/updateAvatar", true);
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.setRequestHeader(header, value);

                xhr.send(JSON.stringify({
                    photo: e.target.result.toString()
                }));
                
                $('.profile-pic').attr('src', e.currentTarget.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
   
    $(".fileupload").on('change', function(){
        readURL(this);
    });
    
    $(".upload-button").on('click', function() {
       $(".fileupload").click();
    });
});
*/

$(document).ready(function (e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#laravel-ajax-file-upload').submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "http://localhost:8080/catalogue/public/user/updateAvatar",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                this.reset();
                alert('File has been uploaded successfully');
                console.log(data);
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

});
/*
//display avater save button
$(document).ready(function () {
    $(".custom-file-upload").click(function () {
        document.getElementById('avatarUpload').style.display = "block";
        alert('okok');
    });

    $(".custom-file-upload").change(function () {
        document.getElementById('avatarUpload').style.display = "block";
        alert('okok');
    });
});
*/

