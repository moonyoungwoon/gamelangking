<?php
// 데이터베이스 연결 정보
$servername = "localhost";
$username = "root";
$password = "0000";
$dbname = "game_langking";

// 데이터베이스 연결
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 확인
if ($conn->connect_error) {
    die("데이터베이스 연결 실패: " . $conn->connect_error);
}

// 폼 데이터 받기
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

// 비밀번호 해시화
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// SQL 쿼리 준비
$stmt = $conn->prepare("INSERT INTO users (email, username, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $email, $username, $hashed_password);

// 쿼리 실행
if ($stmt->execute()) {
    echo "회원가입이 완료되었습니다.";
} else {
    echo "회원가입 실패: " . $stmt->error;
}

// 데이터베이스 연결 종료
$stmt->close();
$conn->close();
?>