<?php
session_start();

// 데이터베이스 연결 정보
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "0000";
$dbname = "game_langking";

// 데이터베이스 연결
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// 연결 확인
if ($conn->connect_error) {
    die("데이터베이스 연결 실패: " . $conn->connect_error);
}

// 로그인 페이지 접속 시 이미 로그인 되어있는지 확인
if (basename($_SERVER['PHP_SELF']) == 'login.html' && isset($_SESSION["username"])) {
    echo "<script>alert('이미 로그인중입니다.'); window.location.href='DATABASE PROJECT2.php';</script>";
    exit;
}

// 폼 데이터 받기 전에 요청 타입 확인
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // PHP 7.0+의 Null 병합 연산자 사용하여 Undefined array key 오류 방지
    $formEmail = $_POST["email"] ?? ''; 
    $formPassword = $_POST["password"] ?? '';

    // 입력값 검증
    if (empty($formEmail) || empty($formPassword)) {
        $error_message = "이메일과 비밀번호를 모두 입력해 주세요.";
    } else {
        // SQL 쿼리 실행
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $formEmail);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // 비밀번호 확인
            if (password_verify($formPassword, $row["password"])) {
                // 로그인 성공 시 세션 저장
                $_SESSION["username"] = $row["username"];
                if (isset($row["name"])) {
                    $_SESSION["name"] = $row["name"];
                }
                header("Location: DATABASE PROJECT2.php");
                exit;
            } else {
                $error_message = "이메일 또는 비밀번호가 잘못되었습니다.";
            }
        } else {
            $error_message = "이메일 또는 비밀번호가 잘못되었습니다.";
        }
    }

    if (isset($error_message)) {
        echo "<p style='color:red;'>" . $error_message . "</p>";
    }

    // 데이터베이스 연결 종료
    if (isset($stmt)) {
        $stmt->close();
    }
}
$conn->close();
?>