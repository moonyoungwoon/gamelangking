<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게임 리뷰 페이지</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>게임 리뷰</h1>
    </header>
    <section class="review-section">
        <article class="game-review">
            <h2 id="game-title">리그 오브 레전드</h2>
            <p class="developer">개발사: 라이엇 게임즈</p>
            <p class="genre">장르: AOS</p>
            <div class="likes">좋아요 수: <span id="likes-count">9</span></div>
            <div class="review-content">
                <h3>리뷰</h3>
                <p>리그 오브 레전드는 전 세계적으로 인기 있는 멀티플레이어 온라인 배틀 아레나 게임입니다. 다양한 챔피언들과 전략적인 팀플레이가 특징입니다.</p>
            </div>
        </article>
    </section>
    <footer>
        <p>&copy; 2024 게임 리뷰. 모든 권리 보유.</p>
    </footer>
</body>

<style type="text/css">
body {
    font-family: 'Noto Sans KR', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
}

header, footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 1rem 0;
}

.review-section {
    margin: 20px auto;
    width: 80%;
    max-width: 800px;
    background-color: white;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.game-review {
    margin-bottom: 20px;
}

#game-title {
    margin: 0;
    color: #007bff;
}

.developer, .genre, .likes {
    color: #666;
    font-size: 0.9rem;
}

.review-content h3 {
    margin-top: 20px;
    margin-bottom: 10px;
    color: #333;
}

.review-content p {
    line-height: 1.6;
}

footer p {
    margin: 0;
}
</style>
</html>