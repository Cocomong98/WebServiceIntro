<html>
    <body>
    Welcome <?php echo $_POST["name"]; ?><br>
    Your email address is: <?php echo $_POST["email"]; ?> 
    <?php
    // 여기까지는 html에서 입력받고 php에 post 방식으로 넘긴 변수들
    echo "database insertion <br> ";
    // 미리 만들어 둔 DB를 찾아서 값을 입력한다
    $mysqli = mysqli_connect("localhost", "root", "", "testdb"); 
    // DB 연결여부에 따른 조건문
        if (mysqli_connect_errno()) {
            // 연결 오류시 오류문 출력 + 나가기
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        else {
            // 연결 성공시 해당 테이블에 변수 넣고 성공문 출력
            $sql = "INSERT INTO exercise_sql (name, email) VALUES ('".$_POST["name"]."','".$_POST["email"]."' )"; 
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
    </body>
</html>