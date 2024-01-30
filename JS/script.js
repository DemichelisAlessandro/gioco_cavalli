$(document).ready(function () {
    var _frmRegistrazione = $("#frmRegistrazione");
    var _vin = $("#vin");

    $("#btnConferma").on("click", function () {
        if (_vin.val() == "") {
            _frmRegistrazione.prop("method", "GET");
            _frmRegistrazione.prop("action", "script.php");
            _frmRegistrazione.submit();
        }

    });
});


