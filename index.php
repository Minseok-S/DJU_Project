<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="css/styl.css">
</head>

<body>
    <div class="header"> 
        <div class="header_inner">
            <a href="/index.php" class="logo">
                <h1 class="blind">HOME</h1>
            </a>
        </div> 
    </div>

    <div class="content" id="main">
        <div class="board_menu">
            <div class="login_info">
                <?php
                ($connect = mysqli_connect("localhost", "dstory", "Thd24512!!", "dstory")) or
                die("connect failed");
                $query = "select * from board order by number desc"; //역순 출력
                $result = mysqli_query($connect, $query);
                // $result = $connect->query($query);
                $total = mysqli_num_rows($result); //result set의 총 레코드(행) 수 반환

                session_start();
                ?>
                <?php if (isset($_SESSION["userid"])) { ?>
                    <button class="logout_bt" id="btn" onclick="location.href='./action/logout_action.php'">로그아웃</button>
                <?php } else { ?>
                    <button class="login_bt" id="btn" onclick="location.href='./login.php'">로그인</button> 
                <?php } ?>
            </div>  
            <div>
                <button class="write_bt" id="btn" onclick="location.href='./write.php'">글쓰기</button>
            </div>
        </div>
        <table class="board">
            <tr>
                <td width="50">번호</td>
                <td width="500">제목</td>
                <td width="100">작성자</td>
                <td width="200">날짜</td>
                <td width="50">조회수</td>
            </tr>
            <tbody>
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

    <div class=footer>
        <span>대전대학교</span>
    </div>
</body>

</html>