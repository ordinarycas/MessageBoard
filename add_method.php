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
        $add_name = $_GET["add_name"];
        $add_email = $_GET["add_email"];
        $add_message = $_GET["add_message"];

        // 上課參考資料 11_PHP_MySQL_01.pptx 第十一頁，mysqli_query
        $add_member = "insert into member(name,email,message) values('$add_name','$add_email','$add_message')";
        mysqli_query($conn,$add_member);
        
        // 回到 index.php 這個頁面
        header("Location:index.php");
    ?>
</body>
</html>