<?php
($connect = mysqli_connect("localhost", "dstory", "Thd24512!!", "dstory")) or
  die("fail");

$id = $_POST["name"]; //Writer
$title = $_POST["title"]; //Title
$content = $_POST["content"]; //Content
$date = date("Y-m-d"); //Date

$URL = "../index.php"; //return URL

$query = "INSERT INTO board (number, title, content, date, hit, id) 
        values(null,'$title', '$content', '$date', 0, '$id')";

$result = $connect->query($query);
if ($result) { ?> <script>
        alert("<?php echo "게시글이 등록되었습니다."; ?>");
        location.replace("<?php echo $URL; ?>");
    </script>
<?php } else { ?> <script>
        alert("<?php echo "게시글 등록에 실패하였습니다."; ?>");
        location.replace("<?php echo $URL; ?>");
    </script>
<?php }

mysqli_close($connect);
?>
