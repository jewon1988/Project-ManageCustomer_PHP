<?php
session_start();
$userLogin = "";
$userNotLogin = "";

if($_SESSION['loggedin']){
    $nameErr = "";
    $phoneNumber1Err = "";
    $phoneNumber2Err = "";
    $reservationDateErr = "";
    $reservationTimeErr = "";
    $valid = true;
    $userLogin = $_SESSION['username']." 님";

    if(isset($_POST['phoneNumber2Update'])){
        if(empty($_POST['name'])){
            $nameErr = "고객명을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['phoneNumber1'])){
            $phoneNumber1Err = "연락처1을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['phoneNumber2'])){
            $phoneNumber2Err = "연락처2를 입력하세요..";
            $valid = false;
        }

        if($valid){
            $dbserver = 'db-mysql.zenit';
            $uid = 'int322_163a12';
            $pw = '!aA26076833';
            $dbname = 'int322_163a12';
            require 'myClasses.php';

            $connection = new DBLink();
            $connection->construct($dbserver, $uid, $pw, $dbname);

            $custName = $_POST['name'];
            $phoneNumber1 = $_POST['phoneNumber1'];
            $phoneNumber2 = $_POST['phoneNumber2'];

            $connection->selectReserveDB3($custName, $phoneNumber1);

            if ($connection->valid2 == true && $connection->empty2 == true){
                $message = $custName." 님의 정보가 없습니다..";
            }
            else if ($connection->valid2 == true && $connection->empty2 == false) {
                $connection->reservePhoneNumber2UpdateDB($custName, $phoneNumber1, $phoneNumber2);
                $message = $custName." 님의 연락처2 정보가 성공적으로 수정되었습니다..";
                $connection->selectReserveDB3($custName, $phoneNumber1);
            }
        }
    }
    if(isset($_POST['reservationDateUpdate'])){
        if(empty($_POST['name'])){
            $nameErr = "고객명을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['phoneNumber1'])){
            $phoneNumber1Err = "연락처1을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['reservationDate'])){
            $reservationDateErr = "예약일을 입력하세요..";
            $valid = false;
        }

        if($valid){
            $dbserver = 'db-mysql.zenit';
            $uid = 'int322_163a12';
            $pw = '!aA26076833';
            $dbname = 'int322_163a12';
            require 'myClasses.php';

            $connection = new DBLink();
            $connection->construct($dbserver, $uid, $pw, $dbname);

            $custName = $_POST['name'];
            $phoneNumber1 = $_POST['phoneNumber1'];
            $reservationDate = $_POST['reservationDate'];

            $connection->selectReserveDB3($custName, $phoneNumber1);

            if ($connection->valid2 == true && $connection->empty2 == true){
                $message = $custName." 님의 정보가 없습니다..";
            }
            else if ($connection->valid2 == true && $connection->empty2 == false) {
                $connection->reservationDateUpdateDB($custName, $phoneNumber1, $reservationDate);
                $message = $custName." 님의 예약일 정보가 성공적으로 수정되었습니다..";
                $connection->selectReserveDB3($custName, $phoneNumber1);
            }
        }
    }
    if(isset($_POST['reservationTimeUpdate'])){
        if(empty($_POST['name'])){
            $nameErr = "고객명을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['phoneNumber1'])){
            $phoneNumber1Err = "연락처1을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['reservationTime'])){
            $reservationTimeErr = "예약시간을 입력하세요..";
            $valid = false;
        }

        if($valid){
            $dbserver = 'db-mysql.zenit';
            $uid = 'int322_163a12';
            $pw = '!aA26076833';
            $dbname = 'int322_163a12';
            require 'myClasses.php';

            $connection = new DBLink();
            $connection->construct($dbserver, $uid, $pw, $dbname);

            $custName = $_POST['name'];
            $phoneNumber1 = $_POST['phoneNumber1'];
            $reservationTime = $_POST['reservationTime'];

            $connection->selectReserveDB3($custName, $phoneNumber1);

            if ($connection->valid2 == true && $connection->empty2 == true){
                $message = $custName." 님의 정보가 없습니다..";
            }
            else if ($connection->valid2 == true && $connection->empty2 == false) {
                $connection->reservationTimeUpdateDB($custName, $phoneNumber1, $reservationTime);
                $message = $custName." 님의 예약시간 정보가 성공적으로 수정되었습니다..";
                $connection->selectReserveDB3($custName, $phoneNumber1);
            }
        }
    }

    if($_POST['back']){
        header("Location: main.php");
    }


    ?>
    <html>
    <head>
        <title>Update Customer Information</title>
    </head>
    <style>
        table td:first-child{
            text-align:right;
        }
        .result tr td{
            border:1px solid black;
        }
        .result tr td{
            padding:5px;
        }
    </style>
    <body>
    <div>
        <h1>예약 수정</h1>
        <?php
        echo $userLogin;
        ?>
    </div>
    <div>
        <form method="post" action="">
            <table>
                <tr>
                    <td>고객명 : </td>
                    <td><input type="text" name="name" value="<?php if(!empty($_POST['name'])) echo $_POST['name'];  ?>"></td>
                    <td><?php echo $nameErr; ?></td>
                </tr>
                <tr>
                    <td>연락처1 : </td>
                    <td><input type="text" name="phoneNumber1" value="<?php if(!empty($_POST['phoneNumber1'])) echo $_POST['phoneNumber1'];  ?>"> (예 : 010-1111-2222)</td>
                    <td><?php echo $phoneNumber1Err; ?></td>
                </tr>
                <tr>
                    <td>연락처2 : </td>
                    <td><input type="text" name="phoneNumber2"> (예 : 010-1111-2222)</td>
                    <td><input type="submit" name="phoneNumber2Update" value="연락처2 수정"></td>
                    <td><?php echo $phoneNumber2Err ; ?></td>
                </tr>
                <tr>
                    <td>예약일 : </td>
                    <td><input type="text" name="reservationDate" value="<?php if(!empty($_POST['reservationDate'])) echo $_POST['reservationDate']; ?>"> (예 : 2017-01-03)</td>
                    <td><input type="submit" name="reservationDateUpdate" value="예약일 수정"></td>
                    <td><?php echo $reservationDateErr; ?></td>
                </tr>
                <tr>
                    <td>예약시간 : </td>
                    <td><input type="text" name="reservationTime" value="<?php if(!empty($_POST['reservationTime'])) echo $_POST['reservationTime']; ?>"> (예 : 12:30 ~ 1:30)</td>
                    <td><input type="submit" name="reservationTimeUpdate" value="예약시간 수정"></td>
                    <td><?php echo $reservationTimeErr; ?></td>
                </tr>
                <tr>
                    <td><input type="submit" name="back" value="뒤로가기"></td>
                </tr>
            </table>
        </form>
    </div>
    <div>
        <p>
            <?php
            echo $message;
            ?>
        </p>
    </div>

    <?php
    if($_POST['reservationDateUpdate'] || $_POST['reservationTimeUpdate'] || $_POST['phoneNumber2Update']){
        ?>
        <div>
            <?php
            if ($connection->valid2 == true && $connection->empty2 == false) {
                ?>
                <h3>Data Result</h3>
                <table class="result">
                    <tr>
                        <th>예약번호 </th>
                        <th>예약일 </th>
                        <th>예약시간 </th>
                        <th>고객명</th>
                        <th>연락처1</th>
                        <th>연락처2</th>
                        <th>상담자 </th>
                    </tr>
                    <?php
                    // print all data
                    while ($row = mysqli_fetch_assoc($connection->result2)) {
                        ?>
                        <tr>
                            <td><?php echo $row['reserve_num']; ?></td>
                            <td><?php echo $row['reserve_date']; ?></td>
                            <td><?php echo $row['reserve_time']; ?></td>
                            <td><?php echo $row['cust_name']; ?></td>
                            <td><?php echo $row['main_phone_number']; ?></td>
                            <td><?php echo $row['sub_phone_number']; ?></td>
                            <?php
                            if($row['seller'] == 'Moon'){
                                $row['seller'] = '문상환';
                                ?>
                                <td><?php echo $row['seller']; ?></td>
                                <?php
                            }else if($row['seller'] == 'Yun'){
                                $row['seller'] = '윤연현';
                                ?>
                                <td><?php echo $row['seller']; ?></td>
                                <?php
                            }else{
                                ?>
                                <td><?php echo $row['seller']; ?></td>
                                <?php
                            }
                            ?>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <?php
            }else{
                ?>
                <p>검색 결과가 없습니다.</p>
                <?php
            }
            ?>
        </div>
        <?php
    }
    ?>
    </body>
    </html>
    <?php
}
else {
    $userNotLogin = "로그인 해주세요..";
    ?>
    <html>
    <head>
        <title>Insert Customer Information</title>
    </head>
    <body>
    <?php
    echo $userNotLogin;
    ?>
    </body>
    </html>
    <?php
}
?>