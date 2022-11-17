<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="css/styl.css">
    <script src="js/tel.js"></script>
</head>

<body>
    <?php include './overlap/header.php'; ?>

    <div class="content">
        <div class="login_wrap">
            <ul class="panel_wrap"> 
                <li class="panel_inner">
                    <form class="id_pw_wrap" method='post' action='./action/register_action.php'>
                        <div class="input_row" id="id_line">
                            <input type="text" id="id" name="id" placeholder="아이디" title="아이디" class="input_text" maxlength="41" value="" required>
                        </div>
                        <div class="input_row" id="pw_line">
                            <input type="password" id="pw" name="pw" placeholder="비밀번호" title="비밀번호" class="input_text" maxlength="16" required>
                        </div>
                        <div class="input_row" id="pw_confirm_line">
                            <input type="password" id="pw_confirm" name="pw_confirm" placeholder="비밀번호 재확인" title="비밀번호 재확인" class="input_text" maxlength="16" required>
                        </div>
                        <div class="input_row" id="name_line">
                            <input type="text" id="name" name="name" placeholder="이름" title="이름" class="input_text" maxlength="6" required>
                        </div>
                        <div class="input_row" id="age_line">
                            <input type="date" id="age" name="age" class="input_text" data-placeholder="생년월일" required aria-required="true" value={startDateValue} className={styles.selectDay} onChange={StartDateValueHandler}></input>                 
                        </div>
                        <div class="input_row" id="tel_line">
                            <input type="text" id="tel" name="tel" placeholder="휴대전화" title="휴대전화" class="input_text" oninput="oninputPhone(this)" maxlength="13" required>
                        </div>
                        <div class="btn_login_wrap">
                            <button type="submit" class="btn_login">
                                <span class="btn_text">회원가입</span>
                            </button>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <?php include './overlap/footer.php'; ?>
</body>

</html>

