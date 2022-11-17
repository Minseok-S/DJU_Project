<?php if (isset($_SESSION["userid"])) { ?>
                    <button class="logout_bt" id="btn" onclick="location.href='./action/logout_action.php'">로그아웃</button>
                <?php } else { ?>
                    <button class="login_bt" id="btn" onclick="location.href='./login.php'">로그인</button> 
                <?php } ?>