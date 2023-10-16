<?php
    include "./Link_SQL_1.php";

    $todo_list = mysqli_query($todo, "SELECT * FROM `todo` WHERE `id`=". $_GET["id"] .";");
    $datas_todo_list = [];
    $datas_todo_list[] = mysqli_fetch_assoc($todo_list);
    mysqli_close($todo);  // 結束鏈接

    $num = 0;
    if($datas_todo_list[0]["jobUrgent"] == "普通") {
        $num = 0;
    }
    else if($datas_todo_list[0]["jobUrgent"] == "急") {
        $num = 1;
    }
    else {
        $num = 2;
    }

    $result = '<form method="post" action="../control/Update_todo.php?id='. $_GET["id"] .'">

    工作名稱: <input name="name" type="text" value="'. $datas_todo_list[0]["jobName"] .'" /> <br>
    
    緊急程度: <select name="urgent" id="Urgent_select">
    <option value="普通">普通</option>
    <option value="急">急</option>
    <option value="急死了">急死了</option>
    </select> <br>
    
    工作說明: <textarea name="content">'. $datas_todo_list[0]["jobContent"] .'</textarea><br>
    
    <input type="submit" name="Submit" value="送出" />
    
    </form>
    
    <script>
        var num = '. $num .';
        document.getElementById("Urgent_select")[num].selected=true;
    </script>';

    echo $result;
?>