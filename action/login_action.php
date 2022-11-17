<?php
session_start();

include '../overlap/db.php';

//입력 받은 id와 password
$id = $_POST['id'];
$origin_pw = $_POST['pw'];

$hash_pw = password_hash($origin_pw, PASSWORD_BCRYPT);
$match = password_verify($origin_pw, $hash_pw); //비밀번호 확인



//아이디가 있는지 검사
$query = "select * from member where id='$id'";
$result = $connect->query($query);


//아이디가 있다면 비밀번호 검사
if (mysqli_num_rows($result) == 1) {

    $row = mysqli_fetch_assoc($result);

    //비밀번호가 맞다면 세션 생성
    if ($match == true) {    //password 평문비교 취약!
        $_SESSION['userid'] = $id;
        if (isset($_SESSION['userid'])) {
?> <script>
                alert("로그인 성공!");
                location.replace("../index.php");
            </script>
        <?php
        } else {
            echo "session failed";
        }
    } else {
        ?> <script>
            alert("아이디 또는 비밀번호를 확인해주세요.");
            history.back(); //js 이 전페이지(login.php)로 돌아가기
        </script>
    <?php
    }
} else {
    ?> <script>
        alert("아이디 또는 비밀번호를 확인해주세요.");
        history.back();
    </script>
<?php
}
?>