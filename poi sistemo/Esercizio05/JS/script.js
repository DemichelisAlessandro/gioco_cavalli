/*$(document).ready(function() {

    var _frmRegistrazione = $("#frmRegistrazione");
    var _txtNominativo = $("#txtNominativo");
    var _msgErrore = $("#msgErrore");

    $("#btnConferma").on("click", function() {

        _msgErrore.html("");
        if (_txtNominativo.val() == "")
            _msgErrore.html("ATTENZIONE !!! Non è stato inserito il Nominativo.");
        else {
            _frmRegistrazione.prop("method", "GET");
            _frmRegistrazione.prop("action", "PHP/registrazione.php");
            _frmRegistrazione.submit();
        }

    });

});*/

$(document).ready(function () {
    var _frmRegistrazione = $("#frmRegistrazione");
    var _txtNominativo = $("#txtNominativo");
    var _msgErrore = $("#msgErrore");

    $("#btnConferma").on("click", function () {

            _frmRegistrazione.prop("method", "GET");
            _frmRegistrazione.prop("action", "registrazione.php");
            _frmRegistrazione.submit();

    });
});
