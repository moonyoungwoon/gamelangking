<?php
session_start();
if (isset($_SESSION["username"])) {
    // 세션 변수 제거
    unset($_SESSION["username"]);
    // 세션 파괴
    session_destroy();
}
// 로그아웃 후 홈페이지나 로그인 페이지로 리다이렉트
header("Location: DATABASE PROJECT2.php");
exit;
?>