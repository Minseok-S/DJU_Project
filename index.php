<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="css/styl.css">
</head>

<body>
    <?php include './overlap/header.php'; ?>

    <div class="content" id="main">
        <div class="board_menu">
            <div class="login_info">
                <?php
                include './overlap/db.php';
                $query = "select * from board order by number desc"; //역순 출력
                $result = mysqli_query($connect, $query);
                // $result = $connect->query($query);
                $total = mysqli_num_rows($result); //result set의 총 레코드(행) 수 반환

                session_start();
                include './overlap/login_check.php';
                ?>
            </div>  
            <div>
                <button class="write_bt" id="btn" onclick="location.href='./write.php'">글쓰기</button>
            </div>
        </div>
        <table class="board" id="products">
            <tr>
                <td width="50">번호</td>
                <td width="500">제목</td>
                <td width="100">작성자</td>
                <td width="200">날짜</td>
                <td width="50">조회수</td>
            </tr>
            <tbody id="main_tbody">
                <?php while ($rows = mysqli_fetch_assoc($result)) {//result set에서 레코드(행)를 1개씩 리턴
                if ($total % 2 == 0) { ?>
                                        <tr class="even">   <!--배경색 진하게-->
                                    <?php } else { ?>
                                    <?php } ?> <!--배경색 그냥-->
                                        <td width="50"><?php echo $total; ?></td>
                                        <td width="500">
                                            <a href="read.php?number=<?php echo $rows[
                                            "number"
                                            ]; ?>">
                                            <?php echo $rows["title"]; ?>
                                        </td>
                                        <td width="100"><?php echo $rows["id"]; ?></td>
                                        <td width="200"><?php echo $rows["date"]; ?></td>
                                        <td width="50"><?php echo $rows["hit"]; ?></td>
                                    </tr>
                                    <?php $total--;
                } ?>
            </tbody>
        </table>
    </div>
    <?php include './overlap/footer.php' ?>

</body>
</html>

