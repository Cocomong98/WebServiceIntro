<!DOCTYPE HTML>  
<html>
  <head>
  </head>

  <body>  

  <?php
    // 변수를 선언하고 ""로 초기화
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

  ?>

  <!-- 사실상 웹페이지 출력은 여기서부터 -->
  <h2>PHP Form Validation Example</h2>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    <!-- PHP_SELF를 출력함으로써 php 부분의 전송방식에 따른 함수를 사용할 수 있음 (그럼 GET 방식이면 작동을 안 하나..?) -->
    <!-- action의 결과로 위의 php를 불러오는 듯 함 (한 페이지 안에 입출력을 다 함) -->
      Name: <input type="text" name="name"> <br><br>
      E-mail: <input type="text" name="email"> <br><br>
      Website: <input type="text" name="website"> <br><br>
      Comment: <textarea name="comment" rows="5" cols="40"></textarea> <br><br>
      Gender:
      <input type="radio" name="gender" value="female">Female
      <input type="radio" name="gender" value="male">Male
      <input type="radio" name="gender" value="other">Other <br><br>
      <input type="submit" name="submit" value="Submit">  
  </form>

  <?php
    echo "<h2>Your Input:</h2>";
    echo $name;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $website;
    echo "<br>";
    echo $comment;
    echo "<br>";
    echo $gender;
?>

</body>
</html>