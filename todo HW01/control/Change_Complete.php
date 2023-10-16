<?php
    include "./Link_SQL_1.php";

    $Complete = "";
    if($_GET["Complete"] == "Complete") {
        $Complete = "UnComplete";
    }
    else {
        $Complete = "Complete";
    }
    mysqli_query($todo, "UPDATE `todo` SET `Complete`='". $Complete ."' WHERE `id`=". $_GET["id"] .";");
?>