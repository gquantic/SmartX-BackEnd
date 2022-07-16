$(function () {
    $('.js-basic-example').DataTable();

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'Копировать', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});