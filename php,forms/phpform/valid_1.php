<html>
    <body>
    <h2>PHP Form Validation Example From Date</h2>
    <?php
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