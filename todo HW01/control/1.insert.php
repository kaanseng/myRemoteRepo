<?php
    include "./Link_SQL_1.php";

    mysqli_query($todo, "INSERT INTO `todo`(`jobName`, `jobUrgent`, `jobContent`) VALUES ('". $_POST["name"] ."','". $_POST["urgent"] ."','". $_POST["content"] ."')");

    header("Location: ../page/Main.html");
?>