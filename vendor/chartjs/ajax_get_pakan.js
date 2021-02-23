
$(document).ready(function() {
    $.ajax({
        url: "http://localhost/dashboard/get_jumlah_pakan",
        method: GET,
        success: function(data) {
            console.log(data);
        },
        error: function(data) {
            console.log(data);
        }
    })
});