<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게임 리뷰 페이지</title>
    <style type="text/css">
        #review-write{
            text-align: center;
            position: absolute;
            top: 50%;
            left : 50%;
            transform:translate(-50%, -50%);
            display: none;
            background-color: gray;
        }

        .reviewsC{
            font-family: 'Noto Sans KR', sans-serif;
            width: 100%;
        }

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
</head>
<body onload="loaded()">
    <header>
        <h1>게임 리뷰</h1>
    </header>
    <section class="review-section">
        <article class="game-review">
            <h2 id="game-title">게임 이름</h2>
            <p id="developer">개발사: 라이엇 게임즈</p>
            <p id="genre">장르: AOS</p>
            <div class="likes">좋아요 수: <span id="likes-count">9</span></div>
            <div id="game-desc" style="margin-top: 5px;">
                <p>리그 오브 레전드는 전 세계적으로 인기 있는 멀티플레이어 온라인 배틀 아레나 게임입니다. 다양한 챔피언들과 전략적인 팀플레이가 특징입니다.</p>
            </div>
            <div class="review-content">
                <h3>리뷰</h3>
                <button onclick="newReviewCome()">리뷰 작성</button>
                <div id="reviews">
                </div>
            </div>
        </article>
    </section>

    <section id="review-write">
    리뷰 작성하기
    <div style="padding-top: 5px">
        <div style="padding-bottom: 10px" class="form-group">
            <div style="display:inline">제목:</div>
            <input type="text" id="reviewer-name" name="review_title" required>
        </div>
        <div class="form-group">
            <div style="display:inline">리뷰 내용:</div>
            <textarea id="review-content" name="review_content" rows="4" required></textarea>
        </div>
        <button onclick="reviewAction()">리뷰 제출</button>
    </div>
    <button onclick="cancelReview()">취소</button>
    </section>
    <footer>
        <p>&copy; 2024 게임 리뷰. 모든 권리 보유.</p>
    </footer>
    <script>
        function loaded(){
            const Param = new URLSearchParams(window.location.search);
            const gameNum = Param.getAll("game");
            var listOfName = [];
            var listOfDesc = [];
            var listOfDevelop = [];
            var listOfGenre = [];
            listOfName.push("리그 오브 레전드", "FC온라인", "발로란트", "서든어택", "메이플스토리", "플레이어언노운스 배틀그라운드", 
                "던전앤파이터", "스타크래프트", "오버워치2"
            );
            listOfDesc.push("리그 오브 레전드는 전 세계적으로 인기 있는 멀티플레이어 온라인 배틀 아레나 게임입니다. 다양한 챔피언들과 전략적인 팀플레이가 특징입니다.", "이건 발로란트", "이건 발로란트", "3");
            listOfDevelop.push("라이엇 게임즈", "EA코리아 스튜디오", "2", "3", "4");
            listOfGenre.push("AOS", "스포츠","FPS","MMORPG");

            document.getElementById("game-title").innerHTML=listOfName[parseInt(gameNum)];
            document.getElementById("game-desc").innerHTML=listOfDesc[parseInt(gameNum)];
            document.getElementById("developer").innerHTML=listOfDevelop[parseInt(gameNum)];
            document.getElementById("genre").innerHTML = listOfGenre[parseInt(gameNum)];
            var listOfReview = [];
            <?php
                // 데이터베이스 연결 정보
                $servername = "localhost";
                $username = "root";
                $password = "0000";
                $dbname = "game_langking";

                // 데이터베이스 연결
                $conn = new mysqli($servername, $username, $password, $dbname);
                $sql = "SELECT * FROM review";

                // 연결 확인
                if ($conn->connect_error) {
                    die("연결 실패: " . $conn->connect_error);
                }

                // 특정 게임 번호 가져오기
                $gameNum = isset($_GET['game']) ? intval($_GET['game']) : 0;

                // 리뷰 데이터 가져오기
                $sql = "SELECT * FROM review WHERE gameNum = $gameNum";
                $result = $conn->query($sql); 
                $resultString = "";
                while($row = $result->fetch_assoc()) {
                    $resultString = $row["review_content"];
                    echo "listOfReview.push('" . $resultString . "');";
                }
            ?>
            for(var i = 0; i<listOfReview.length; i++){
                console.log(listOfReview[i]);
            }
            var toReview = document.getElementById("reviews");
            for(var i = 0; i<listOfReview.length; i++){
                var temp = document.createElement("div");
                temp.setAttribute("style", "reviewsC");
                temp.innerHTML=listOfReview[i];
                toReview.appendChild(temp);
            }

        }
        function reviewAction(){
            const Param = new URLSearchParams(window.location.search);
            const who = Param.getAll("user");
            var finalLoc = "writeReview.php?userID=";
            finalLoc += who; finalLoc +="&title=";
            finalLoc += document.getElementById('reviewer-name').value; finalLoc +="&content=";
            finalLoc += document.getElementById('review-content').value;
            window.open(finalLoc, '_blank');
            location.reload(true);
        }

        function cancelReview(){
            document.getElementById("review-write").style.display="none";
        }

        function newReviewCome(){
            document.getElementById("review-write").style.display="block";
        }
</script>
</body>
</html>