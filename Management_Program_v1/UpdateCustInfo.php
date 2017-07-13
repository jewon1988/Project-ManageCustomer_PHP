<?php
    session_start();
    $userLogin = "";
    $userNotLogin = "";

    if($_SESSION['loggedin']){
        $nameErr = "";
        $phoneNumber1Err = "";
        $phoneNumber2Err = "";
        $addressErr = "";
        $typeErr = "";
        $productErr = "";
        $suitsErr = "";
        $suitsFactoryErr = "";
        $shirtsErr = "";
        $shirtsFactoryErr = "";
        $shoesErr = "";
        $shoesFactoryErr = "";
        $fixDateErr = "";
        $priceErr = "";
        $paidErr = "";
        $balanceErr = "";
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

                $connection->selectDB3($custName, $phoneNumber1);

                if ($connection->valid == true && $connection->empty == true){
                    $message = $custName." 님의 정보가 없습니다..";
                }
                else if ($connection->valid == true && $connection->empty == false) {
                    $connection->phoneNumber2UpdateDB($custName, $phoneNumber1, $phoneNumber2);
                    $message = $custName." 님의 연락처2 정보가 성공적으로 수정되었습니다..";
                    $connection->selectDB3($custName, $phoneNumber1);
                }
            }
        }
        if(isset($_POST['addressUpdate'])){
            if(empty($_POST['name'])){
                $nameErr = "고객명을 입력하세요..";
                $valid = false;
            }
            if(empty($_POST['phoneNumber1'])){
                $phoneNumber1Err = "전화번호를 입력하세요..";
                $valid = false;
            }
            if(empty($_POST['address'])){
                $addressErr = "주소를 입력하세요..";
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
                $address = $_POST['address'];

                $connection->selectDB3($custName, $phoneNumber1);

                if ($connection->valid == true && $connection->empty == true){
                    $message = $custName." 님의 정보가 없습니다..";
                }
                else if ($connection->valid == true && $connection->empty == false) {
                    $connection->addressUpdateDB($custName, $phoneNumber1, $address);
                    $message = $custName." 님의 주소 정보가 성공적으로 수정되었습니다..";
                    $connection->selectDB3($custName, $phoneNumber1);
                }
            }
        }
        if(isset($_POST['typeUpdate'])){
            if(empty($_POST['name'])){
                $nameErr = "고객명을 입력하세요..";
                $valid = false;
            }
            if(empty($_POST['phoneNumber1'])){
                $phoneNumber1Err = "전화번호를 입력하세요..";
                $valid = false;
            }
            if(empty($_POST['type'])){
                $typeErr = "구분을 선택하세요..";
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
                if($_POST['type'] == 'buy'){
                    $_POST['type'] = 1;
                    $type = $_POST['type'];
                }
                else if($_POST['type'] == 'handmade'){
                    $_POST['type'] = 2;
                    $type = $_POST['type'];
                }
                else if($_POST['type'] == 'rent'){
                    $_POST['type'] = 3;
                    $type = $_POST['type'];
                }

                $connection->selectDB3($custName, $phoneNumber1);

                if ($connection->valid == true && $connection->empty == true){
                    $message = $custName." 님의 정보가 없습니다..";
                }
                else if ($connection->valid == true && $connection->empty == false) {
                    $connection->typeUpdateDB($custName, $phoneNumber1, $type);
                    $message = $custName." 님의 구분 정보가 성공적으로 수정되었습니다..";
                    $connection->selectDB3($custName, $phoneNumber1);
                }
            }
        }
        if(isset($_POST['productUpdate'])){
            if(empty($_POST['name'])){
                $nameErr = "고객명을 입력하세요..";
                $valid = false;
            }
            if(empty($_POST['phoneNumber1'])){
                $phoneNumber1Err = "전화번호를 입력하세요..";
                $valid = false;
            }
            if(empty($_POST['product'])){
                $productErr = "구매내역을 입력하세요..";
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
                $product = $_POST['product'];

                $connection->selectDB3($custName, $phoneNumber1);

                if ($connection->valid == true && $connection->empty == true){
                    $message = $custName." 님의 정보가 없습니다..";
                }
                else if ($connection->valid == true && $connection->empty == false) {
                    $connection->productUpdateDB($custName, $phoneNumber1, $product);
                    $message = $custName." 님의 구매내역 정보가 성공적으로 수정되었습니다..";
                    $connection->selectDB3($custName, $phoneNumber1);
                }
            }
        }
        if(isset($_POST['suitsUpdate'])){
            if(empty($_POST['name'])){
                $nameErr = "고객명을 입력하세요..";
                $valid = false;
            }
            if(empty($_POST['phoneNumber1'])){
                $phoneNumber1Err = "전화번호를 입력하세요..";
                $valid = false;
            }
            if(empty($_POST['suits'])){
                $suitsErr = "수트 정보를 입력하세요..";
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
                $suits = $_POST['suits'];

                $connection->selectDB3($custName, $phoneNumber1);

                if ($connection->valid == true && $connection->empty == true){
                    $message = $custName." 님의 정보가 없습니다..";
                }
                else if ($connection->valid == true && $connection->empty == false) {
                    $connection->suitsUpdateDB($custName, $phoneNumber1, $suits);
                    $message = $custName." 님의 수트 정보가 성공적으로 수정되었습니다..";
                    $connection->selectDB3($custName, $phoneNumber1);
                }
            }
        }
        if(isset($_POST['suitsFactoryUpdate'])){
            if(empty($_POST['name'])){
                $nameErr = "고객명을 입력하세요..";
                $valid = false;
            }
            if(empty($_POST['phoneNumber1'])){
                $phoneNumber1Err = "전화번호를 입력하세요..";
                $valid = false;
            }
            if(empty($_POST['suitsFactory'])){
                $suitsFactoryErr = "수트공장 정보를 입력하세요..";
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
                $suitsFactory = $_POST['suitsFactory'];

                $connection->selectDB3($custName, $phoneNumber1);

                if ($connection->valid == true && $connection->empty == true){
                    $message = $custName." 님의 정보가 없습니다..";
                }
                else if ($connection->valid == true && $connection->empty == false) {
                    $connection->suitsFactoryUpdateDB($custName, $phoneNumber1, $suitsFactory);
                    $message = $custName." 님의 수트공장 정보가 성공적으로 수정되었습니다..";
                    $connection->selectDB3($custName, $phoneNumber1);
                }
            }
        }
        if(isset($_POST['shirtsUpdate'])){
            if(empty($_POST['name'])){
                $nameErr = "고객명을 입력하세요..";
                $valid = false;
            }
            if(empty($_POST['phoneNumber1'])){
                $phoneNumber1Err = "전화번호를 입력하세요..";
                $valid = false;
            }
            if(empty($_POST['shirts'])){
                $shirtsErr = "셔츠 정보를 입력하세요..";
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
                $shirts = $_POST['shirts'];

                $connection->selectDB3($custName, $phoneNumber1);

                if ($connection->valid == true && $connection->empty == true){
                    $message = $custName." 님의 정보가 없습니다..";
                }
                else if ($connection->valid == true && $connection->empty == false) {
                    $connection->shirtsUpdateDB($custName, $phoneNumber1, $shirts);
                    $message = $custName." 님의 셔츠 정보가 성공적으로 수정되었습니다..";
                    $connection->selectDB3($custName, $phoneNumber1);
                }
            }
        }
        if(isset($_POST['shirtsFactoryUpdate'])){
            if(empty($_POST['name'])){
                $nameErr = "고객명을 입력하세요..";
                $valid = false;
            }
            if(empty($_POST['phoneNumber1'])){
                $phoneNumber1Err = "전화번호를 입력하세요..";
                $valid = false;
            }
            if(empty($_POST['shirtsFactory'])){
                $shirtsFactoryErr = "셔츠공장 정보를 입력하세요..";
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
                $shirtsFactory = $_POST['shirtsFactory'];

                $connection->selectDB3($custName, $phoneNumber1);

                if ($connection->valid == true && $connection->empty == true){
                    $message = $custName." 님의 정보가 없습니다..";
                }
                else if ($connection->valid == true && $connection->empty == false) {
                    $connection->shirtsFactoryUpdateDB($custName, $phoneNumber1, $shirtsFactory);
                    $message = $custName." 님의 셔츠공장 정보가 성공적으로 수정되었습니다..";
                    $connection->selectDB3($custName, $phoneNumber1);
                }
            }
        }
        if(isset($_POST['shoesUpdate'])){
            if(empty($_POST['name'])){
                $nameErr = "고객명을 입력하세요..";
                $valid = false;
            }
            if(empty($_POST['phoneNumber1'])){
                $phoneNumber1Err = "전화번호를 입력하세요..";
                $valid = false;
            }
            if(empty($_POST['shoes'])){
                $shoesErr = "구두정보를 입력하세요..";
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
                $shoes = $_POST['shoes'];

                $connection->selectDB3($custName, $phoneNumber1);

                if ($connection->valid == true && $connection->empty == true){
                    $message = $custName." 님의 정보가 없습니다..";
                }
                else if ($connection->valid == true && $connection->empty == false) {
                    $connection->shoesUpdateDB($custName, $phoneNumber1, $shoes);
                    $message = $custName." 님의 구두 정보가 성공적으로 수정되었습니다..";
                    $connection->selectDB3($custName, $phoneNumber1);
                }
            }
        }
        if(isset($_POST['shoesFactoryUpdate'])){
            if(empty($_POST['name'])){
                $nameErr = "고객명을 입력하세요..";
                $valid = false;
            }
            if(empty($_POST['phoneNumber1'])){
                $phoneNumber1Err = "전화번호를 입력하세요..";
                $valid = false;
            }
            if(empty($_POST['shoesFactory'])){
                $shoesFactoryErr = "구두공장 정보를 입력하세요..";
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
                $shoesFactory = $_POST['shoesFactory'];

                $connection->selectDB3($custName, $phoneNumber1);

                if ($connection->valid == true && $connection->empty == true){
                    $message = $custName." 님의 정보가 없습니다..";
                }
                else if ($connection->valid == true && $connection->empty == false) {
                    $connection->shoesFactoryUpdateDB($custName, $phoneNumber1, $shoesFactory);
                    $message = $custName." 님의 구두공장 정보가 성공적으로 수정되었습니다..";
                    $connection->selectDB3($custName, $phoneNumber1);
                }
            }
        }
        if(isset($_POST['fixDateUpdate'])){
            if(empty($_POST['name'])){
                $nameErr = "고객명을 입력하세요..";
                $valid = false;
            }
            if(empty($_POST['phoneNumber1'])){
                $phoneNumber1Err = "전화번호를 입력하세요..";
                $valid = false;
            }
            if(empty($_POST['fixDate'])){
                $fixDateErr = "가봉,셋팅일 정보를 입력하세요..";
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
                $fixDate = $_POST['fixDate'];

                $connection->selectDB3($custName, $phoneNumber1);

                if ($connection->valid == true && $connection->empty == true){
                    $message = $custName." 님의 정보가 없습니다..";
                }
                else if ($connection->valid == true && $connection->empty == false) {
                    $connection->fixDateUpdateDB($custName, $phoneNumber1, $fixDate);
                    $message = $custName." 님의 가봉,셋팅일 정보가 성공적으로 수정되었습니다..";
                    $connection->selectDB3($custName, $phoneNumber1);
                }
            }
        }
        if(isset($_POST['priceUpdate'])){
            if(empty($_POST['name'])){
                $nameErr = "고객명을 입력하세요..";
                $valid = false;
            }
            if(empty($_POST['phoneNumber1'])){
                $phoneNumber1Err = "전화번호를 입력하세요..";
                $valid = false;
            }
            if(empty($_POST['price'])){
                $priceErr = "총 금액 정보를 입력하세요..";
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
                $price = $_POST['price'];

                $connection->selectDB3($custName, $phoneNumber1);

                if ($connection->valid == true && $connection->empty == true){
                    $message = $custName." 님의 정보가 없습니다..";
                }
                else if ($connection->valid == true && $connection->empty == false) {
                    $connection->priceUpdateDB($custName, $phoneNumber1, $price);
                    $message = $custName." 님의 총 금액 정보가 성공적으로 수정되었습니다..";
                    $connection->selectDB3($custName, $phoneNumber1);
                }
            }
        }
        if(isset($_POST['paidUpdate'])){
            if(empty($_POST['name'])){
                $nameErr = "고객명을 입력하세요..";
                $valid = false;
            }
            if(empty($_POST['phoneNumber1'])){
                $phoneNumber1Err = "전화번호를 입력하세요..";
                $valid = false;
            }
            if(empty($_POST['paid'])){
                $paidErr = "선금 정보를 입력하세요..";
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
                $paid = $_POST['paid'];

                $connection->selectDB3($custName, $phoneNumber1);

                if ($connection->valid == true && $connection->empty == true){
                    $message = $custName." 님의 정보가 없습니다..";
                }
                else if ($connection->valid == true && $connection->empty == false) {
                    $connection->paidUpdateDB($custName, $phoneNumber1, $paid);
                    $message = $custName." 님의 선금 정보가 성공적으로 수정되었습니다..";
                    $connection->selectDB3($custName, $phoneNumber1);
                }
            }
        }
        if(isset($_POST['balanceUpdate'])){
            if(empty($_POST['name'])){
                $nameErr = "고객명을 입력하세요..";
                $valid = false;
            }
            if(empty($_POST['phoneNumber1'])){
                $phoneNumber1Err = "전화번호를 입력하세요..";
                $valid = false;
            }
            if(empty($_POST['balance'])){
                $balanceErr = "잔금 정보를 입력하세요..";
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
                $balance = $_POST['balance'];

                $connection->selectDB3($custName, $phoneNumber1);

                if ($connection->valid == true && $connection->empty == true){
                    $message = $custName." 님의 정보가 없습니다..";
                }
                else if ($connection->valid == true && $connection->empty == false) {
                    $connection->balanceUpdateDB($custName, $phoneNumber1, $balance);
                    $message = $custName." 님의 잔금 정보가 성공적으로 수정되었습니다..";
                    $connection->selectDB3($custName, $phoneNumber1);
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
        <h1>수 정</h1>
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
                    <td>주  소 : </td>
                    <td><input type="text" name="address"></td>
                    <td><input type="submit" name="addressUpdate" value="주소 수정"></td>
                    <td><?php echo $addressErr ; ?></td>
                </tr>
                <tr>
                    <td>구  분 : </td>
                    <td>
                        <input type="radio" name="type" value="buy"> 맞춤
                        <input type="radio" name="type" value="handmade"> 수제
                        <input type="radio" name="type" value="rent"> 대여
                    </td>
                    <td><input type="submit" name="typeUpdate" value="구분 수정"></td>
                    <td><?php echo $typeErr ; ?></td>
                </tr>
                <tr>
                    <td>구매내역 : </td>
                    <td><input type="text" name="product"></td>
                    <td><input type="submit" name="productUpdate" value="구매내역 수정"></td>
                    <td><?php echo $productErr ; ?></td>
                </tr>
                <tr>
                    <td>수  트 : </td>
                    <td><input type="text" name="suits"></td>
                    <td><input type="submit" name="suitsUpdate" value="수트 수정"></td>
                    <td><?php echo $suitsErr ; ?></td>
                </tr>
                <tr>
                    <td>수트공장 : </td>
                    <td><input type="text" name="suitsFactory"></td>
                    <td><input type="submit" name="suitsFactoryUpdate" value="수트공장 수정"></td>
                    <td><?php echo $suitsFactoryErr ; ?></td>
                </tr>
                <tr>
                    <td>셔  츠 : </td>
                    <td><input type="text" name="shirts"></td>
                    <td><input type="submit" name="shirtsUpdate" value="셔츠 수정"></td>
                    <td><?php echo $shirtsErr ; ?></td>
                </tr>
                <tr>
                    <td>셔츠공장 : </td>
                    <td><input type="text" name="shirtsFactory"></td>
                    <td><input type="submit" name="shirtsFactoryUpdate" value="셔츠공장 수정"></td>
                    <td><?php echo $shirtsFactoryErr ; ?></td>
                </tr>
                <tr>
                    <td>구  두 : </td>
                    <td><input type="text" name="shoes"></td>
                    <td><input type="submit" name="shoesUpdate" value="구두 수정"></td>
                    <td><?php echo $shoesErr ; ?></td>
                </tr>
                <tr>
                    <td>구두공장 : </td>
                    <td><input type="text" name="shoesFactory"></td>
                    <td><input type="submit" name="shoesFactoryUpdate" value="구두공장 수정"></td>
                    <td><?php echo $shoesFactoryErr ; ?></td>
                </tr>
                <tr>
                    <td>가봉,셋팅일 : </td>
                    <td><input type="text" name="fixDate"> (예 : 2017-01-03)</td>
                    <td><input type="submit" name="fixDateUpdate" value="가봉,셋팅일 수정"></td>
                    <td><?php echo $fixDateErr ; ?></td>
                </tr>
                <tr>
                    <td>총 금액 : </td>
                    <td><input type="text" name="price"></td>
                    <td><input type="submit" name="priceUpdate" value="총 금액 수정"></td>
                    <td><?php echo $priceErr ; ?></td>
                </tr>
                <tr>
                    <td>선  금 : </td>
                    <td><input type="text" name="paid"></td>
                    <td><input type="submit" name="paidUpdate" value="선금 수정"></td>
                    <td><?php echo $paidErr ; ?></td>
                </tr>
                <tr>
                    <td>잔  금 : </td>
                    <td><input type="text" name="balance"></td>
                    <td><input type="submit" name="balanceUpdate" value="잔금 수정"></td>
                    <td><?php echo $balanceErr ; ?></td>
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
    if($_POST['phoneNumber2Update'] || $_POST['addressUpdate'] || $_POST['typeUpdate'] || $_POST['productUpdate'] || $_POST['suitsUpdate'] || $_POST['suitsFactoryUpdate'] || $_POST['shirtsUpdate'] || $_POST['shirtsFactoryUpdate'] || $_POST['shoesUpdate'] || $_POST['shoesFactoryUpdate'] || $_POST['fixDateUpdate'] || $_POST['priceUpdate'] || $_POST['paidUpdate'] || $_POST['balanceUpdate']){
        ?>
        <div>
            <?php
            if ($connection->valid == true && $connection->empty == false) {
                ?>
                <h3>Data Result</h3>
                <table class="result">
                    <tr>
                        <th>고객번호</th>
                        <th>계약일 </th>
                        <th>고객명</th>
                        <th>연락처1</th>
                        <th>연락처2</th>
                        <th>주 소</th>
                        <th>구 분</th>
                        <th>구매내역 </th>
                        <th>수 트</th>
                        <th>수트공장 </th>
                        <th>셔 츠</th>
                        <th>셔츠공장 </th>
                        <th>구 두</th>
                        <th>구두공장 </th>
                        <th>가봉,셋팅일</th>
                        <th>총 금액</th>
                        <th>선 금</th>
                        <th>잔 금</th>
                        <th>상담자 </th>
                    </tr>
                    <?php
                    // print all data
                    while ($row = mysqli_fetch_assoc($connection->result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['cust_num']; ?></td>
                            <td><?php echo $row['contract_date']; ?></td>
                            <td><?php echo $row['cust_name']; ?></td>
                            <td><?php echo $row['main_phone_number']; ?></td>
                            <td><?php echo $row['sub_phone_number']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <?php
                            if($row['type'] == 'A'){
                                $row['type'] = '맞춤';
                                ?>
                                <td><?php echo $row['type']; ?></td>
                                <?php
                            }else if($row['type'] == 'B'){
                                $row['type'] = '수제';
                                ?>
                                <td><?php echo $row['type']; ?></td>
                                <?php
                            }else if($row['type'] == 'C'){
                                $row['type'] = '대여';
                                ?>
                                <td><?php echo $row['type']; ?></td>
                                <?php
                            }else{
                                ?>
                                <td><?php echo $row['type']; ?></td>
                                <?php
                            }
                            ?>
                            <td><?php echo $row['product']; ?></td>
                            <td><?php echo $row['suits']; ?></td>
                            <td><?php echo $row['suits_factory']; ?></td>
                            <td><?php echo $row['shirts']; ?></td>
                            <td><?php echo $row['shirts_factory']; ?></td>
                            <td><?php echo $row['shoes']; ?></td>
                            <td><?php echo $row['shoes_factory']; ?></td>
                            <td><?php echo $row['fix_date']; ?></td>
                            <td><?php echo $row['total_price']; ?></td>
                            <td><?php echo $row['paid']; ?></td>
                            <td><?php echo $row['balance']; ?></td>
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