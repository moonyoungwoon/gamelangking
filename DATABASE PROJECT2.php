<?php
session_start(); // 세션 시작

// 세션 변수 확인 및 이스케이프 처리
if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    $username = htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8');
} else {
    // 오류 처리 또는 기본값 할당
    $username = 'Guest'; // 예시 기본값
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>GAME LANGKING</title>
<style>
.head {
    background-color: #20232a; /* 수정된 배경색 코드 */
    color: #61dafb; /* 오타 수정: clolr -> color */
    text-align: center;
    padding: 20px 0;
    font-size: 24px;
    font-weight: bold;
    font-family: 'Roboto', sans-serif; /* Google Fonts에서 'Roboto' 사용 예시 */
    background-image: url('your-background-image.jpg'); /* 배경 이미지 적용 */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); /* 그림자 효과 추가 */
    text-shadow: 2px 2px 4px #000000; /* 텍스트에 그림자 효과 추가 */
    text-align: center;
}

/* Google Fonts 적용 예시 */
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
</style>

<link rel="stylesheet" href="style.css">
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
}

.sidebar {
    height: 100vh;
    width: 5px; /* 너비를 0이 아닌 최소값으로 설정 */
    opacity: 0; /* 사이드바를 투명하게 만들어 보이지 않도록 함 */
    position: fixed;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: width 0.5s, opacity 0.5s; /* 너비와 투명도 변경에 대한 애니메이션 적용 */
}

.sidebar a {
    padding: 10px 15px;
    text-decoration: none;
    font-size: 18px;
    color: white;
    display: block;
    transition: 0.3s;
}

.content {
    margin-left: 200px; /* 사이드바가 완전히 보일 때를 고려한 여백 */
    padding: 20px;
}
/* 기존 사이드바 스타일에 추가 */
.sidebar {
    /* 기존 스타일 유지 */
    position: fixed;
    top: 0;
    left: 0;
    /* 추가된 스타일 */
    display: flex;
    align-items: center; /* 화살표를 중앙 정렬 */
}

/* 사이드바가 축소된 상태에서도 화살표가 보이도록 CSS를 수정합니다. */
.toggle-arrow {
    width: 50px;
    height: 50px;
    color: skyblue;
    position: fixed;
    left: 5px; /* 화살표 위치 조정 */
    top: 50%;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    z-index: 2; /* 화살표가 다른 요소 위에 보이도록 z-index 설정 */
    display: flex; /* 기본 상태에서 화살표를 보이게 설정 */
}

.sidebar:hover .toggle-arrow {
    display: flex;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box; /* 패딩과 보더가 너비에 포함되도록 설정 */
}

.body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column; /* 요소들을 세로로 정렬 */
}

.head, .content {
    padding-left: 20px; /* header와 content의 시작점을 일치시키기 위한 패딩 */
}

.content h2, .content p {
    margin-left: 20px; /* h2와 p의 시작점을 header와 일치시키기 위한 마진 */
}

body, h1, h2, h3, p {
    margin: 0;
    padding: 0;
}

.site-header {
    background-image: url('header-background.jpg');
    background-size: cover;
    color: white;
    text-align: center;
    padding: 20px 0;
}

.header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 20px;
}

.logo {
    width: 100px; /* 로고 크기 조정 */
}

.navbar ul {
    list-style: none;
    display: flex;
    margin: 0;
    padding: 0;
}

.navbar ul li {
    margin-left: 20px;
}

.navbar ul li a {
    color: white;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s ease;
}

.navbar ul li a:hover {
    color: #61dafb; /* 롤 사이트와 유사한 색상으로 호버 효과 적용 */
}

/* 추가적인 스타일링과 애니메이션 효과를 적용할 수 있습니다. */

.game-ranking {
    width: 100%; /* 테이블 너비를 컨테이너에 맞춤 */
    border-collapse: collapse; /* 테이블 셀 사이의 간격 제거 */
    margin-top: 20px; /* 상단 컨텐츠와의 간격 */
}

.game-ranking th, .game-ranking td {
    text-align: left; /* 텍스트 왼쪽 정렬 */
    padding: 8px; /* 셀 내부 여백 */
    border-bottom: 1px solid #ddd; /* 하단 테두리 선 */
}

.game-ranking th {
    background-color: #0174DF; /* 헤더 배경색 */
}

.game-ranking tr:hover {
    background-color: #ddd; /* 행 호버 배경색 */
}

 body {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    padding: 20px;
    background-color: #f0f0f0;
}

.game-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px; /* 아이템 간격을 조정하고 싶으시면 이 값을 조정하세요. */
}

.game-item {
    width: 200px;
    background-color: #ffffff;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    border-radius: 10px;
    overflow: hidden;
    margin: 10px;
}

.game-item img {
    width: 100%;
    height: auto;
}

.game-info {
    padding: 10px;
    text-align: center;
}

.game-name {
    font-size: 16px;
    margin-bottom: 5px;
}

.review-button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
    width: 100%;
}

.review-button:hover {
    background-color: #0056b3;
}

/* CSS 파일에서 색상 변수 정의 */
:root {
    --primary-color: #007bff;
    --secondary-color: #6c757d;
    --background-color: #f8f9fa;
}

/* 일관된 디자인 요소 적용 */
.game-item {
    background-color: var(--background-color);
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0, 1);
}

.game-item img {
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
}

.game-name {
    font-size: 1.2rem;
    font-weight: bold;
    color: var(--primary-color);
}

.review-button {
    background-color: var(--primary-color);
    color: #fff;
    border: none;
    padding: 8px 16px;
    border-radius: 4px;
    cursor: pointer;
}

/* 미디어 쿼리를 사용한 반응형 디자인 */
@media (max-width: 767px) {
    .game-item {
        flex-direction: column;
        align-items: center;
    }

    .game-item img {
        width: 100%;
        max-height: 200px;
    }

    .game-info {
        padding: 16px;
    }
}

@media (min-width: 768px) {
    .game-item {
        flex-direction: row;
        align-items: center;
    }

    .game-item img {
        width: 200px;
        height: 150px;
    }

    .game-info {
        flex-grow: 1;
        padding: 16px 24px;
    }
}

.review-button {
    background-color: var(--primary-color);
    color: #fff;
    border: none;
    padding: 8px 16px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.review-button {
    background-color: #0056b3;
}

/* CSS 애니메이션을 사용한 부드러운 효과 */
@keyframes fadeln {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }

    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

.game-item {
    animation: fadeln 0.5s ease-in-out;
}

body {
    font-family: 'Noto Sans KR', sans-serif;
}

.game-name {
    font-size: 1.2rem;
    font-weight: bold;
    color: var(--primary-color);
}

.game-info {
    font-size: 0.9rem;
    color: var(--secondary-color);
}

/* 푸터 스타일 */
.footer {
  background-color: #6c757d;
  color: #fff;
  padding: 20px 0;
  text-align: center;
}

.footer-content {
  font-size: 0.9rem;
}

.logo {
  width: 200px; /* 원하는 이미지 너비 */
  height: auto; /* 높이는 자동으로 조절되어 비율 유지 */
  display: block; /* 이미지를 블록 요소로 만들어 수직 중앙 정렬 */
  margin: 0 auto; /* 이미지를 수평 중앙 정렬 */
}

.user-circle {
    width: 120px; /* 원의 크기 조정 */
    height: 120px;
    border-radius: 50%; /* 원형 모양 만들기 */
    background-color: #f0f0f0; /* 배경색 */
    color: #333; /* 텍스트 색상 */
    display: flex;
    flex-direction: column; /* 내용물을 세로로 정렬 */
    justify-content: center; /* 세로 방향 가운데 정렬 */
    align-items: center; /* 가로 방향 가운데 정렬 */
    text-align: center;
    margin: 10px; /* 주변 여백 */
}

.logout-button {
    background-color: #4CAF50; /* 버튼 배경색 */
    color: white; /* 버튼 텍스트 색상 */
    padding: 5px 10px; /* 버튼 내부 여백 */
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    cursor: pointer; /* 마우스 오버 시 커서 모양 변경 */
    border: none;
    border-radius: 5px; /* 버튼 모서리 둥글게 */
}

</style>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="body">

<div class="head">
  <img src="game langking.png" alt="game langking" class="logo">
</div>

<div class="user-info">
    <?php if (isset($_SESSION["username"])): ?>
        <div class="user-circle">
            <p><?php echo $_SESSION["username"]; ?>님</p>
            <a href="logout.php" class="logout-button">로그아웃</a>
        </div>
    <?php endif; ?>
</div>

<div id="toggle-arrow" class="toggle-arrow">&#9664;</div>
<div id="sidebar" class="sidebar">
    <a href="#home">홈</a>
    <?php if (!isset($_SESSION["username"])): ?>
        <!-- 로그인하지 않은 사용자에게 보여줄 링크 -->
        <a href="signup_process.html">회원가입</a>
        <a href="login.php">로그인</a>
    <?php else: ?>
        <!-- 로그인한 사용자에게 보여줄 링크 -->
        <a href="logout.php">로그아웃</a>
    <?php endif; ?>
</div>

<div class="content">
    <h2 class="content">환영합니다!</h2>
    <p class="content">game langking 사이트에 오신 것을 환영합니다. 여기서 다양한 정보를 공유하고, 흥미로운 대화를 나눌 수 있습니다.</p>
    <!-- 컨텐츠 추가 -->
     <!-- 게임 순위 테이블 추가 -->

    <h2>온라인 게임 순위</h2>

    <!-- 날짜를 표시할 공간 -->
<p id="updateDate" style="text-align:right;"></p>
    
    
     <div class="game-container">
    <!-- 첫 번째 game-container에는 상위 5개의 게임 아이템이 들어갑니다. -->
    <div class="game-item">
        <img src="https://cdn.gamemeca.com/gmdb/g000/26/18/221151(3).jpg" alt="리그 오브 레전드 로고">
        <div class="game-info">
            <div class="game-name">1. 리그 오브 레전드</div>
            <div>라이엇 게임즈 | AOS | 좋아요 수: 9</div>
            <button class="review-button" onclick="location.href='reviewPage.php?game=0&user=<?php echo $username; ?>'">리뷰</button>
        </div>
    </div>
    
    <div class="game-item">
        <img src="https://cdn.gamemeca.com/gmdb/g000/96/37/692068_221151.jpg" alt="FC 온라인 로고">
        <div class="game-info">
            <div class="game-name">2. FC 온라인</div>
            <div>EA코리아 스튜디오 | 스포츠 | 좋아요 수: 2</div>
            <button class="review-button" onclick="location.href='reviewPage.php?game=1&user=<?php echo $username; ?>'">리뷰</button>
        </div>
    </div>
    <div class="game-item">
        <img src="https://cdn.gamemeca.com/gmdb/g001/17/93/538821_200302-risell-uu5.jpg" alt="발로란트 로고">
        <div class="game-info">
            <div class="game-name">3. 발로란트</div>
            <div>라이엇 게임즈 | FPS | 좋아요 수: 5</div>
            <button class="review-button" onclick="location.href='reviewPage.php?game=2&user=<?php echo $username; ?>'">리뷰</button>
        </div>
    </div>
    <div class="game-item">
        <img src="https://cdn.gamemeca.com/gmdb/g000/72/97/221151.jpg" alt="로스트 아크 로고">
        <div class="game-info">
            <div class="game-name">4. 로스트 아크</div>
            <div>스마일게이트 RPG | MMORPG | 좋아요 수: 3</div>
            <button class="review-button" onclick="location.href='reviewPage.php?game=3&user=<?php echo $username; ?>'">리뷰</button>
        </div>
    </div>
    <div class="game-item">
        <img src="https://cdn.gamemeca.com/gmdb/g000/18/23/221151.jpg" alt="서든어택 로고">
        <div class="game-info">
            <div class="game-name">5. 서든어택</div>
            <div>넥슨지티 | FPS | 좋아요 수: 6</div>
            <button class="review-button" onclick="location.href='reviewPage.php?game=4&user=<?php echo $username; ?>'">리뷰</button>
        </div>
    </div>
</div>

<div class="game-container">
    <!-- 두 번째 game-container에는 하위 5개의 게임 아이템이 들어갑니다. -->
    <div class="game-item">
        <img src="https://cdn.gamemeca.com/gmdb/g000/10/53/221151(0).jpg" alt="메이플스토리 로고">
        <div class="game-info">
            <div class="game-name">6. 메이플스토리</div>
            <div>위젯스튜디오 | MMORPG | 좋아요 수: 3</div>
            <button class="review-button" onclick="location.href='reviewPage.php?game=5&user=<?php echo $username; ?>'">리뷰</button>
        </div>
    </div>
    <!-- 여기에 나머지 하위 4개의 게임 아이템을 추가합니다. -->
        
    <div class="game-item">
        <img src="https://cdn.gamemeca.com/gmdb/g000/88/08/221151.jpg" alt="플레이어언노운스 배틀그라운드 로고">
        <div class="game-info">
            <div class="game-name">7. 플레이어언노운스 배틀그라운드</div>
            <div>크래프톤 | FPS | 좋아요 수: 1</div>
            <button class="review-button" onclick="location.href='reviewPage.php?game=6&user=<?php echo $username; ?>'">리뷰</button>
        </div>
    </div>
    <div class="game-item">
        <img src="https://cdn.gamemeca.com/gmdb/g000/15/23/221151(1).jpg" alt="던전앤파이터 로고">
        <div class="game-info">
            <div class="game-name">8. 던전앤파이터</div>
            <div>네오플 | 액션 RPG | 좋아요 수: 5</div>
            <button class="review-button" onclick="location.href='reviewPage.php?game=7&user=<?php echo $username; ?>'">리뷰</button>
        </div>
    </div>
    <div class="game-item">
        <img src="https://cdn.gamemeca.com/gmdb/g000/04/35/221151(0).jpg" alt="스타크래프트 로고">
        <div class="game-info">
            <div class="game-name">9. 스타크래프트</div>
            <div>블리자드 | RTS | 좋아요 수: 6</div>
            <button class="review-button" onclick="location.href='reviewPage.php?game=8&user=<?php echo $username; ?>'">리뷰</button>
        </div>
    </div>
    <div class="game-item">
    <img src="https://cdn.gamemeca.com/gmdb/g001/15/96/592360_tsdfgjfg.jpg" alt="오버워치2 로고">
    <div class="game-info">
        <div class="game-name">오버워치2</div>
        <div>블리자드 | FPS | 좋아요 수: 7</div>
        <button class="review-button" onclick="location.href='reviewPage.php?game=9&user=<?php echo $username; ?>'">리뷰</button>
    </div>
</div>
</div>


    <!-- 컨텐츠 추가 -->
</div>

<footer class="footer">
  <div class="footer-content">
    <p>&copy; 2024 game langking. All rights reserved.</p>
  </div>
</footer>

<!-- Google Fonts 사용 -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wgh@400;700&display=swap" rel="stylesheet">

<script>
window.onload = function() {
    var today = new Date();
    var yyyy = today.getFullYear();
    var mm = String(today.getMonth() + 1).padStart(2, '0'); // 월은 0부터 시작하므로 1을 더함
    var dd = String(today.getDate()).padStart(2, '0');
    var formattedDate = yyyy + '-' + mm + '-' + dd; // 'yyyy-mm-dd' 포맷으로 날짜를 구성함
    
    document.getElementById("updateDate").innerHTML = "최근 업데이트 날짜: " + formattedDate;
}
</script>

<script type="text/javascript">
document.getElementById('toggle-arrow').addEventListener('mouseover', function() {
    var sidebar = document.getElementById('sidebar');
    sidebar.style.width = '200px';
    sidebar.style.opacity = '1';
    this.style.display = 'none'; // 화살표를 숨깁니다.
});

document.getElementById('sidebar').addEventListener('mouseover', function() {
    this.style.width = '200px';
    this.style.opacity = '1';
});

document.getElementById('sidebar').addEventListener('mouseout', function() {
    this.style.width = '5px';
    this.style.opacity = '0';
    var arrow = document.getElementById('toggle-arrow');
    setTimeout(function() { // 사이드바가 축소되고 나서 화살표를 다시 표시합니다.
        arrow.style.display = 'flex';
    }, 500); // 사이드바 너비 및 투명도 변경 애니메이션 시간과 일치합니다.
});
</script>
</body>
</html>