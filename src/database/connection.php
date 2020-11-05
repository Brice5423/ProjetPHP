<?php
function connect (){
    try {
        return new PDO ('mysql:host=devbdd.iutmetz.univ-lorraine.fr;port=3306;dbname=collign97u_PHP', 'collign97u_appli', 'Jfido47992' );

    }
    catch( Exception $exception ) {
        die($exception->getMessage());
    }
}
?>