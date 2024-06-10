<!DOCTYPE html>
<html>
<head>
    <title>로그인</title>
    <meta charset="UTF-8">
</head>
<body>
    <form method="post" action="http://localhost/login.php">
        <h1>로그인</h1>
        <div class="form_group">
            <label for="id">아이디
                <input type="text" id="id" name="email">
            </label>
        </div>
        <div class="form_group">
            <label for="pw">비밀번호
                <input type="password" id="pw" name="password">
            </label>
        </div>
        <div class="form_group">
            <button type="submit" name="submit">로그인</button>
        </div>
        <div class="menu">
            <a href="register.html">가입하기</a>
            <a href="#">비밀번호를 잊어버리셨나요?</a>
        </div>
    </form>

    <style type="text/css">
        form {
            margin: 60px auto;
            width: 24rem;
        }
        
        .form_group{
            margin-bottom: 0.5rem;
        }

        label{
            display: block;
        }

        input {
            box-sizing: border-box;
            padding: 0.5rem;
            width: 100%;
            border: 1px solid #ddd;
        }

        button {
            width: 100%;
            padding: 0.5rem;
            background: #000;
            color: #fff;
            font-size: 1rem;
            border: none;
        }

        .menu{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</body>
</html>