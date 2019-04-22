<?php
        if (!empty($_REQUEST)){
            if ($_REQUEST[base64_decode('res')] == base64_decode('error_query')) {     
    ?>
                        <style>
                            #error-reg{
                                display:block;
                            }
                        </style>    
    <?php   
            }
            if ($_REQUEST[base64_decode('res')] == base64_decode('falta_datos')) {
    ?>
                   <style>
                       #falt-camp{
                           display:block;
                       }
                   </style>      
    <?php
            }
        }
    ?>