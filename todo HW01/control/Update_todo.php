<?php
    include "./Link_SQL_1.php";

    mysqli_query($todo, "UPDATE `todo` SET `jobName`='". $_POST["name"] ."',`jobUrgent`='". $_POST["urgent"] ."',`jobContent`='". $_POST["content"] ."' WHERE `id`=". $_GET["id"] .";");

    header("Location: ../page/Main.html");
?>