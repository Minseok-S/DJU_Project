<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="css/styl.css">
</head>

<body>
    <?php
        session_start();
        $URL = "./login.php";
        if (!isset($_SESSION["userid"])) { ?>
            <script>
                alert("로그인이 필요합니다.");
                location.replace("<?php echo $URL; ?>");
            </script>
    <?php }
    ?>

    <?php 
        include './overlap/header.php'; 
    ?>

    <form method="post" action="./action/write_action.php">
        <!-- method를 get -> post로 바꿔야됨!! -->
        <table id="table" style="padding-top:50px" align=center width=auto border=0 cellpadding=2>
            <tr>
                <td style="height:40; float:center; background-color:#3C3C3C">
                    <p style="font-size:25px; text-align:center; color:white; margin-top:15px; margin-bottom:15px"><b>게시글 작성하기</b></p>
                </td>
            </tr>
            <tr>
                <td bgcolor=white>
                    <table class="table2">
                        <tr>
                            <td>작성자</td>
                            <td><input type="hidden" name="name" value="<?= $_SESSION[
                              "userid"
                            ] ?>"><?= $_SESSION["userid"] ?></td>
                        </tr>

                        <tr>
                            <td>제목</td>
                            <td><input type="text" name="title" size=91 required></td>
                        </tr>

                        <tr>
                            <td>내용</td>
                            <td><textarea name="content" cols=75 rows=15 required></textarea></td>
                        </tr>
                    </table>

                    <div>
                        <button id="btn" onclick="location.href='./index.php'">취소</button>
                        <button id="btn" type="submit">작성</button>
                    </div>
                </td>
            </tr>
        </table>
    </form>

    <?php include './overlap/footer.php' ?>

</body>

</html>

