<h1 style="text-align:center;">Học lập trình Laravel tại Unicode</h1>
<?php
    echo date('Y-m-d H:i:s');
?>
<?php
    if(env('APP_ENV')=='production'){
        echo 'Call api live';
    }else{
        echo 'Call api sanbox';
    }
?>