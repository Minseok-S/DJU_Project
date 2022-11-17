<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="css/styl.css">
</head>

<body>
    <?php
        include './overlap/db.php';
        $number = $_GET["number"];
        $query = "select title, content, date, id from board where number = $number";
        $result = $connect->query($query);
        $rows = mysqli_fetch_assoc($result);

        $title = $rows["title"];
        $content = $rows["content"];
        $userid = $rows["id"];

        session_start();

        include './overlap/header.php';

    if (!isset($_SESSION["userid"])) { ?> <script>
            alert("권한이 없습니다.");
            location.replace("<?php echo $URL; ?>");
        </script>
    <?php } elseif ($_SESSION["userid"] == $userid) { ?>
        <form method="POST" action="./action/modify_action.php">
        <table style="padding-top:50px" align=center width=auto border=0 cellpadding=2>
                <tr>
                    <td style="height:40; float:center; background-color:#3C3C3C">
                        <p style="font-size:25px; text-align:center; color:white; margin-top:15px; margin-bottom:15px"><b>게시글 수정하기</b></p>
                    </td>
                </tr>
                <tr>
                    <td bgcolor=white>
                        <table class="table2">
                            <tr>
                                <td>작성자</td>
                                <td><input type="hidden" name="id" value="<?= $_SESSION['userid'] ?>"><?= $_SESSION['userid'] ?></td>
                            </tr>

                            <tr>
                                <td>제목</td>
                                <td><input type=text name=title size=87 value="<?= $title ?>"></td>
                            </tr>

                            <tr>
                                <td>내용</td>
                                <td><textarea name=content cols=75 rows=15><?= $content ?></textarea></td>
                            </tr>

                        </table>

                        <div>
                            <button id="btn" type="submit" name="cancle" value="<?= $number ?>"z>취소</button>
                            <button id="btn" type="submit" name="number" value="<?= $number ?>"z>수정</button>
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    <?php } else { ?> <script>
            alert("권한이 없습니다.");
            location.replace("<?php echo $URL; ?>");
        </script>
    <?php }
    ?>
</body>

</html>