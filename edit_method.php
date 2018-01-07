<!-- 上課參考資料 11_PHP_MySQL_01.pptx 第三、四頁 -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>文化大學 - 留言板 期末作業</title>
</head>
<body>
    <?php
        // 上課參考資料 11_PHP_MySQL_01.pptx 第十二頁
        $conn = mysqli_connect("localhost","root","","messageboard");
        // 開啟MySQL資料庫
        // 連接的四個參數: localhost, 使用者, 密碼, 資料庫名稱
        mysqli_query($conn, "set names 'utf8'");
        // 設定 unicode 格式,避免亂碼


        // 上課參考資料 12_PHP_MySQL_02.pptx 第四頁
        $edit_id = $_GET["edit_id"];
        $edit_name = $_GET["edit_name"];
        $edit_email = $_GET["edit_email"];
        $edit_message = $_GET["edit_message"];


        // 上課參考資料 11_PHP_MySQL_01.pptx 第八頁
        // if() 判斷式的用法
        if($_GET["alter"] == "修改"){

            // 上課參考資料 11_PHP_MySQL_01.pptx 第十一頁，mysqli_query
            $alter_member = "UPDATE `member` SET `name` = '$edit_name', `email` = '$edit_email', `message` = '$edit_message' WHERE `member`.`id` = '$edit_id'";
            mysqli_query($conn,$alter_member);

            // 回到 index.php 這個頁面
            header("Location:index.php");
        }
        if($_GET["delete"] == "刪除"){

            // 上課參考資料 11_PHP_MySQL_01.pptx 第十一頁，mysqli_query
            // 用 id 去做判斷刪除該資料列
            $delete_member = "DELETE FROM `member` WHERE `member`.`id` = '$edit_id'";
            mysqli_query($conn,$delete_member);

            // 回到 index.php 這個頁面
            header("Location:index.php");
        }
    ?>
</body>
</html>