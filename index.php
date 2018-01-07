<!-- 上課參考資料 11_PHP_MySQL_01.pptx 第三、四頁 -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>文化大學 - 留言板 期末作業</title>
</head>
<body>
    <!-- table 這個是表格，tr 代表表格的列，td 代表表格的欄 -->
    <!-- 上課參考資料 11_PHP_MySQL_01.pptx 第十四頁 -->
    <table border="1" bgcolor="#0099FF" align="center">
        <tr>
            <td align="center"><strong>Name</strong></td>
            <td align="center"><strong>Email</strong></td>
            <td align="center"><strong>Message</strong></td>
        </tr>
        <tr>
            <!-- 新增留言資料的表單 開始 -->
            <!-- 上課參考資料 12_PHP_MySQL_02.pptx 第二頁 -->
            <form action="add_method.php" method="get">
                <td align="center"><input type="text" name="add_name"></td>
                <td align="center"><input type="email" name="add_email"></td>
                <td align="center"><input type="text" name="add_message"><input type="submit" value="留言"></td>
            </form>
            <!-- 新增留言資料的表單 結束 -->
        </tr>
    </table>



<hr><!-- 水平線 -->



<table align="center">
    <tr>
        <!-- 搜尋留言資料的表單 開始 -->
        <!-- 上課參考資料 12_PHP_MySQL_02.pptx 第二頁 -->
        <form action="index.php" method="get">
            <td align="center"><input type="search" value="" name="search"></td>
            <td align="center"><input type="submit" value="搜尋"></td>
            <td align="center"><input type="submit" value="全部顯示"></td>
        </form>
        <!-- 搜尋留言資料的表單 開始 結束 -->
    </tr>
</table>



<?php
    //參考資料 http://bryanen.blogspot.tw/2015/09/php.html
    //參考資料 http://alfredwebdesign.blogspot.tw/2013/05/php-notice-undefined-index.html
    // 隱藏警告訊息
    error_reporting(0);

    // 上課參考資料 11_PHP_MySQL_01.pptx 第十二頁
    $conn = mysqli_connect("localhost","root","","messageboard");
    // 開啟MySQL資料庫
    // 連接的四個參數: localhost, 使用者, 密碼, 資料庫名稱
    mysqli_query($conn, "set names 'utf8'");
    // 設定 unicode 格式,避免亂碼


    // 上課參考資料 12_PHP_MySQL_02.pptx 第四頁
    $search_message = $_GET["search"];
    // 接收表單的方式


    // 上課參考資料 11_PHP_MySQL_01.pptx 第八頁
    // if() 判斷式的用法
    if($search_message == "全部顯示"){
        //  SQL 上課參考資料 06_MySQL.pptx 第二十三頁
        $queryinfo = mysqli_query($conn,"SELECT * FROM member");
    }else{
        // SQL 上課參考資料 09_條件提取01.pptx 第十頁
        $queryinfo = mysqli_query($conn,"SELECT * FROM member WHERE message LIKE '%$search_message%'");
    }
?>



<table border="1" bgcolor="#66FFFF" align="center">
    <tr>
        <td align="center"><strong>Name</strong></td>
        <td align="center"><strong>Email</strong></td>
        <td align="center"><strong>Message</strong></td>
    </tr>



<?php
    // 使用一筆資料做測試 - 我的測試資料
    // $row_test = mysqli_fetch_array($queryinfo);
    // echo '<tr>
    //         <form action="edit_method.php" method="get">
    //             <input type="hidden" name="edit_id" value="'.$row_test['id'].'">
    //             <td align="center"><input type="text" name="edit_name" value="'.$row_test['name'].'"></td>
    //             <td align="center"><input type="text" name="edit_email" value="'.$row_test['email'].'"></td>
    //             <td align="center"><input type="text" name="edit_message" value="'.$row_test['message'].'">
    //                 <input type="submit" name="alter" value="修改">
    //                 <input type="submit" name="delete" value="刪除">
    //             </td>
    //         </form>
    //     </tr>';
?>




    <?php
        // 上課參考資料 11_PHP_MySQL_01.pptx 第十三頁
        // 取得回傳結果，利用 while 迴圈
        while($row = mysqli_fetch_array($queryinfo))
        {
        // 上課參考資料 11_PHP_MySQL_01.pptx 第七頁
        // 輸出指令: echo
        echo '<tr>
                <form action="edit_method.php" method="get">
                    <input type="hidden" name="edit_id" value="'.$row['id'].'">
                    <td align="center"><input type="text" name="edit_name" value="'. $row['name'].'"></td>
                    <td align="center"><input type="email" name="edit_email" value="'. $row['email'].'"></td>
                    <td align="center"><input type="text" name="edit_message" value="'. $row['message'].'">
                    <input type="submit" name="alter" value="修改">
                    <input type="submit" name="delete" value="刪除"></td>
                </form>
            </tr>';
        }

        // 上課參考資料 11_PHP_MySQL_01.pptx 第十一頁，mysqli_close
        mysqli_close($conn);
        // 關閉資料庫連線
    ?>
</table>
</body>
</html>