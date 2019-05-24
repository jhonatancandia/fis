        
        
    $(document).ready(function () {
        for (let index = 0; index < 8; index++) {
            $('#datepicker'+index+'').datepicker({
                uiLibrary: 'bootstrap4',
                format: 'dd-mm-yyyy'
            });
        }

        $('[data-toggle="tooltip"]').tooltip();        
    });
