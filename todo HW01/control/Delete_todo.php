<?php
    include "./Link_SQL_1.php";

    mysqli_query($todo, "DELETE FROM `todo` WHERE `id`=". $_GET["id"] .";");
?>