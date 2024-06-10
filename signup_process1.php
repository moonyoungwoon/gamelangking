<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <title>회원가입</title>
    <link rel="stylesheet" href="./02-signup.css" />
</head>
<body>
    <div class="container">
        <div class="member-container">
            <div class="header">
                <div>회원 가입을 위해</div>
                <div>정보를 입력해주세요</div>
            </div>
            <form action="http://localhost/signup_process.php" method="POST">
                <div class="user-info">
                    <div class="user-info-email">
                        <div>* 이메일</div>
                        <input type="email" name="email" required />
                    </div>
                    <div class="user-info-name">
                        <div>* 이름</div>
                        <input type="text" name="username" required />
                    </div>
                    <div class="user-info-pw">
                        <div>* 비밀번호</div>
                        <input type="password" name="password" required />
                    </div>
                    <div class="user-info-pw-check">
                        <div>* 비밀번호 확인</div>
                        <input type="password" name="password_check" required />
                    </div>
                </div>
                <div class="btn">
                    <button type="submit">가입하기</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>