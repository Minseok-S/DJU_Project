<?php
($connect = mysqli_connect("localhost", "dstory", "Thd24512!!", "dstory")) or
  die("connect failed");

$number = $_POST["number"];
$title = $_POST["title"];
$content = $_POST["content"];

$date = date("Y-m-d");

$query = "update board set title='$title', content='$content', date='$date' where number=$number";
$result = $connect->query($query);
if ($result) { ?>
    <script>
        alert("수정되었습니다.");
        location.replace("../read.php?number=<?= $number ?>");
    </script>
<?php } else { ?>
    <script>
        alert("취소되었습니다.");
        location.replace("/index.php");
    </script> 
    <?php } ?>
