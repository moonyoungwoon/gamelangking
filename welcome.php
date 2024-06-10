<?php
session_start();
if (!isset($_SESSION["name"])) {
    header("Location: login.php"); // 세션이 없으면 로그인 페이지로 리다이렉트
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome Page</title>
    <style>
        .user-name {
            position: absolute;
            right: 10px;
            top: 10px;
        }
    </style>
</head>
<body>
    <div class="user-name">
        <?php echo htmlspecialchars($_SESSION["name"]) . "님"; ?>
    </div>
    
    <!-- 페이지 내용 -->
</body>
</html>