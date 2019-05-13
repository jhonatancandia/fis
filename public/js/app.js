        
    for (let index = 0; index < 8; index++) {
        $('#datepicker'+index+'').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'dd-mm-yyyy'
        });
    }

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
