$(document).ready(function () {
    $('#commandForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'public/index.php/ajax',
            data: $(this).serialize(),
            success: function (response) {
                var jsonData = JSON.parse(response);
                switch (jsonData.success) {
                    case 2:
                        $('#return').addClass("alert alert-danger");
                    default:
                        $('#return').text(jsonData.message);
                        $('#return').addClass("alert alert-success");
                }
            }
        });
    });
});