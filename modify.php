<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="css/styl.css">
</head>

<body>
    <?php
    ($connect = mysqli_connect(
      "localhost",
      "dstory",
      "Thd24512!!",
      "dstory"
    )) or die("connect failed");
    $number = $_GET["number"];
    $query = "select title, content, date, id from board where number = $number";
    $result = $connect->query($query);
    $rows = mysqli_fetch_assoc($result);

    $title = $rows["title"];
    $content = $rows["content"];
    $userid = $rows["id"];

    session_start();

    $URL = "./index.php";

    if (!isset($_SESSION["userid"])) { ?> <script>
            alert("권한이 없습니다.");
            location.replace("<?php echo $URL; ?>");
        </script>
    <?php } elseif ($_SESSION["userid"] == $userid) { ?>
        <form method="POST" action="./action/modify_action.php">
            <table>
                <tr>
                    <td>
                        <p><b>게시글 수정하기</b></p>
                    </td>
                </tr>
                <tr>
                    <td bgcolor=white>
                        <table class="table2">
                            <tr>
                                <td>작성자</td>
                                <td><input type="hidden" name="id" value="<?= $_SESSION[
                                  "userid"
                                ] ?>"><?= $_SESSION["userid"] ?></td>
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
                            <button id="btn" onclick="location.href='./index.php'">취소</button>
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