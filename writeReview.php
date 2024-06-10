<?php
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
    $gameNum = 0;
    $stmt = $conn->prepare("INSERT INTO review (userID, review_date, review_content, review_title, gameNum) VALUES (?,now(),?,?,?)");
    $stmt->bind_param("sssd", $_GET['userID'], $_GET['content'], $_GET['title'], $gameNum);
    echo "asd". $_GET['userID'];

    // 쿼리 실행
    if ($stmt->execute()) {
    } else {
    }
    echo "<script>window.close()</script>";
?>