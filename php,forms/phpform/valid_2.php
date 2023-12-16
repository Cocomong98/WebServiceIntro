<html>
    <body>
    <h2>PHP Form Validation Example From Date</h2>
    <?php
        // 변수 선언하고 초기화
        $name = $email = $gender = $comment = $website = "";

        // 입력값들을 POST 방식으로 불러옴
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          // 서버의 호출방식이 POST일 때 작동
          $name = test_input($_POST["name"]);
          $email = test_input($_POST["email"]);
          $website = test_input($_POST["website"]);
          $comment = test_input($_POST["comment"]);
          $gender = test_input($_POST["gender"]);
          // 변수들에 POST로 불러온 변수들을 test_input 함수에 넣은 결과물을 넣는다
        }
    
        function test_input($data) {
          $data = trim($data);
          // 문자의 좌우공백 제거
          $data = stripslashes($data);
          // 백슬래쉬 제거
          $data = htmlspecialchars($data);
          // 있는 그대로 출력
          return $data;
          // 결과물 반환
        }
        // test_input은 결국 파라미터를 받아 정제해 다시 출력해주는 도구
        // 시작부터 여기까지의 과정은 없어도 무방하지만, 정제해주는 과정이 있어서 나쁠 건 없음


        $mysqli = mysqli_connect("localhost", "root", "", "test"); 
        // db연결 (있어야 함 없으면 만들고)
        if (mysqli_connect_errno()) {
            // 연결 오류시 오류문 출력 + 나가기
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        else {
            // 연결 성공시 해당 테이블에 변수 넣고 성공문 출력
            $sql = "INSERT INTO test (name, email, website, comment, gender) VALUES ('".$_POST["name"]."','".$_POST["email"]."'
            ,'".$_POST["website"]."','".$_POST["comment"]."','".$_POST["gender"]."' )"; 
            $res = mysqli_query($mysqli, $sql);
            if ($res === TRUE) {
                echo "A record for name and email has been inserted."; 
            } 
            else {
                printf("Could not insert record: %s\n", mysqli_error($mysqli)); 
            }
            // 다 끝나면 mysqli 종료
            mysqli_close($mysqli);
        }
    ?>
        <br>
        <h2>Your Input : </h2>
        <?php echo $_POST["name"]; ?> <br>
        <?php echo $_POST["email"]; ?> <br>
        <?php echo $_POST["website"]; ?> <br>
        <?php echo $_POST["comment"]; ?> <br>
        <?php echo $_POST["gender"]; ?> <br>
    </body>
</html>