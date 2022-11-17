<?php
include '../overlap/db.php';

$number = $_POST["number"];
$cancle_num = $_POST["cancle"];
$title = $_POST["title"];
$content = $_POST["content"];
$date = date("y-m-d");
?> 

<?php 
    if(isset($number)){
        $query = "update board set title='$title', content='$content', date='$date' where number=$number";
        $result = $connect->query($query);
}?>

<?php
if (isset($result)) { ?>
    <script>
        alert("수정되었습니다.");
        location.replace("../read.php?number=<?= $number ?>");
    </script>
<?php } else { ?>
    <script>
        alert("<?php echo "취소되었습니다."; ?>");
        location.replace("../read.php?number=<?= $cancle_num?>");
    </script>
<?php } ?>
