        
    for (let index = 0; index < 8; index++) {
        $('#datepicker'+index+'').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
    }

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
