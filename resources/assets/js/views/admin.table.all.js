require('axios');

$(function () {

    let mainTarget = null;

    var DBtable = $('#TablesLists').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true
    });


    $('#confirm-delete').on('show.bs.modal', function (e) {
        mainTarget = $(e.relatedTarget);
    });

    $('#confirm-delete').on('click', '.btn-ok', function (event) {
        $('#confirm-delete').modal('hide');
        $(mainTarget).children('i').removeClass().addClass('fa fa-circle-o-notch fa-spin');
        axios({
            method: 'post',
            url: mainTarget.data('href'),
        })
        .then(function (response) {
            mainTarget.closest('tr').hide("slow", function () {
                DBtable.row(mainTarget.closest('tr')).remove().draw();
            });
        })
        .catch(function (error) {
            mainTarget.children('i').removeClass().addClass('fa fa-trash');

            alert(error);
        });
    });

});