<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="./css/login.css">
</head>

<body class="login_body">
    <div class="header"> 
        <div class="header_inner">
            <a href="/index.php" class="logo">
                <h1 class="blind">HOME</h1>
            </a>
        </div> 
    </div>
    <div class="content">
        <div class="login_wrap">
            <ul class="panel_wrap"> 
                <li class="panel_inner">
                    <form class="id_pw_wrap" method='post' action='./action/login_action.php'>
                        <div class="input_row" id="id_line">
                            <input type="text" id="id" name="id" placeholder="아이디" title="아이디" class="input_text" maxlength="14" value="" required>
                        </div>
                        <div class="input_row" id="pw_line">
                            <input type="password" id="pw" name="pw" placeholder="비밀번호" title="비밀번호" class="input_text" maxlength="16" required>
                        </div>
                        <div class="btn_login_wrap">
                            <button type="submit" class="btn_login">
                                <span class="btn_text">로그인</span>
                            </button>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
        <ul class="find_wrap">
                <li><a href="./register.php" class="find_text">비밀번호 찾기</a></li>
                <li><a href="./register.php" class="find_text">아이디 찾기</a></li>
                <li><a href='./register.php' class="find_text">회원가입</a></li>
        </ul>
    </div>
    <div class="footer"></div>
</body>

</html>
    