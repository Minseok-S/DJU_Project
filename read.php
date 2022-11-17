<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="css/styl.css">
</head>

<body>
    <?php
        include './overlap/db.php';
        $number = $_GET["number"]; // GET 방식 사용
        session_start();
        $query = "select title, content, date, hit, id from board where number = $number";
        $result = $connect->query($query);
        $rows = mysqli_fetch_assoc($result);

        $hit = "update board set hit = hit + 1 where number = $number";
        $connect->query($hit);
    ?>
    <?php include './overlap/header.php'; ?>

    <table class="read_table" align=center>
        <tr>
            <td colspan="4" class="read_title"><?php echo $rows['title'] ?></td>
        </tr>
        <tr>
            <td class="read_id">작성자</td>
            <td class="read_id2"><?php echo $rows['id'] ?></td>
            <td class="read_hit">조회수</td>
            <td class="read_hit2"><?php echo $rows['hit'] ?></td>
        </tr>


        <tr>
            <td colspan="4" class="read_content" valign="top">
                <?php echo $rows['content'] ?></td>
        </tr>
    </table>

    <div class="read_btn">
        <button id="btn" onclick="location.href='./index.php'">목록</button>
        <?php if (
          isset($_SESSION["userid"]) and
          $_SESSION["userid"] == $rows["id"]
        ) { ?>
            <button id="btn" onclick="location.href='./modify.php?number=<?= $number ?>'">수정</button>
            <button id="btn" a onclick="ask();">삭제</button>

            <script>
                function ask() {
                    if (confirm("게시글을 삭제하시겠습니까?")) {
                        window.location = "./delete.php?number=<?= $number ?>"
                    }
                }
            </script>
        <?php } ?>
    </div>

    <?php include './overlap/footer.php' ?>

</body>

</html>