<?php

$conn = mysqli_connect('localhost', 'root', '', 'urbancrew_db');

if (isset($_POST['submit'])) {

    $card_name = $_POST['card_name'];
    $card_no = $_POST['card_no'];
    $id_no =  $_POST['id_no'];
    $cvv = $_POST['cvv'];
    $address = $_POST['address'];

    $select = " SELECT * FROM payments WHERE id_no = '$id_no' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['success'] = "payment pending";
        header('location: Thank you.html');
        exit();
    } else {
        $insert = "INSERT INTO payments(card_name,card_no,id_no, cvv, address) VALUES('$card_name','$card_no','$id_no','$cvv','$address')";
        mysqli_query($conn, $insert);
        header('location:Thank you.html');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style3.css">
    <link rel="stylesheet" href="css\style2.css">
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <div class="row">
                <div class="col">
                    <h3 class="title">Billing address</h3>
                    <div class="inputBox"><span>full name :</span><input type="text" name="name" placeholder="Full name"></div>
                    <div class="inputBox"><span>id_no :</span><input type="number" name="id_no" placeholder="id-no">
                    </div>
                    <div class="inputBox"><span>address :</span><input type="text" name="address" placeholder="current address"></div>
                    <div class="inputBox"><span>city :</span><input type="text" name="city" placeholder="city"></div>
                    <div class="flex">
                        <div class="inputBox"><span>country :</span><input type="text" placeholder="country"></div>
                        <div class="inputBox"><span>zip code :</span><input type="text" placeholder="zip"></div>
                    </div>
                </div>
                <div class="col">
                    <h3 class="title">payment</h3>
                    <div class="inputBox"><span>cards accepted :</span><img src="images\card_img.png" alt=""></div>
                    <div class="inputBox"><span>name on card :</span><input type="text" name="card_name" placeholder="Card name"></div>
                    <div class="inputBox"><span>credit card number :</span><input type="number" name="card_no" placeholder="****-****-****-****"></div>
                    <div class="inputBox"><span>exp month :</span><input type="text" placeholder="month"></div>
                    <div class="flex">
                        <div class="inputBox"><span>exp year :</span><input type="year" placeholder="2011"></div>
                        <div class="inputBox"><span>CVV :</span><input type="text" name="cvv" placeholder="***"></div>
                    </div>
                </div>
            </div>
            <input type="submit" name="submit" value="pay" class="submit-btn">

    </div>
</body>

</html>