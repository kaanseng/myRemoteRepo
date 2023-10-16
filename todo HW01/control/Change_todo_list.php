<?php 
    include "./Link_SQL_1.php";  // 鏈接資料庫

    // echo $_GET["list"];

    if($_GET["list"] == "All") {
        $todo_list = mysqli_query($todo, "SELECT * FROM `todo` WHERE 1;");
    }
    else {
        $todo_list = mysqli_query($todo, "SELECT * FROM `todo` WHERE `Complete`='".$_GET["list"]."';");
    }

    $Datas_todo_list = [];
    if ($todo_list) {
        // mysqli_num_rows方法可以回傳我們結果總共有幾筆資料
        if (mysqli_num_rows($todo_list)>0) {
            // 取得大於0代表有資料
            // while迴圈會根據資料數量，決定跑的次數
            // mysqli_fetch_assoc方法可取得一筆值
            while ($row = mysqli_fetch_assoc($todo_list)) {
                // 每跑一次迴圈就抓一筆值，最後放進data陣列中
                $Datas_todo_list[] = $row;
            }
        }
        // 釋放資料庫查到的記憶體
        mysqli_free_result($todo_list);
    }
    mysqli_close($todo);  // 結束鏈接

    $result = "<table>";
    $result .= "<tr>";
    $result .= "<td></td>";
    $result .= "<td>工作編號</td>";
    $result .= "<td>工作名稱</td>";
    $result .= "<td>緊急程度</td>";
    $result .= "<td>工作說明</td>";
    $result .= "<td>編輯內容</td>";
    $result .= "<td>工作狀態</td>";
    $result .= "</tr>";
    for($x=0; $x<count($Datas_todo_list); $x++) {
        $result .= "<tr id='todo_". strval($Datas_todo_list[$x]["id"]) ."'>";
        $result .= "<td onclick='Delete_todo(". $Datas_todo_list[$x]["id"] .")'>刪除</td>";
        $result .= "<td>". $Datas_todo_list[$x]["id"] ."</td>";
        $result .= "<td>". $Datas_todo_list[$x]["jobName"] ."</td>";
        $result .= "<td>". $Datas_todo_list[$x]["jobUrgent"] ."</td>";
        $result .= "<td>". $Datas_todo_list[$x]["jobContent"] ."</td>";
        $result .= "<td onclick='Edit_todo(". $Datas_todo_list[$x]["id"] .")'>編輯</td>";
        if($Datas_todo_list[$x]["Complete"] == "UnComplete") {
            $result .= "<td class='todo_complete UnComplete' onclick='Change_Complete(". strval($Datas_todo_list[$x]["id"]) .")'>". $Datas_todo_list[$x]["Complete"] ."</td>";
        }
        else {
            $result .= "<td class='todo_complete Complete' onclick='Change_Complete(". strval($Datas_todo_list[$x]["id"]) .")'>". $Datas_todo_list[$x]["Complete"] ."</td>";
        }
        $result .= "</tr>";
    }
    $result .= "</table>";

    echo $result;
?>