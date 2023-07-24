<?php

$conn = mysqli_connect('localhost', 'root', '', 'urbancrew_db');

if (isset($_POST['submit'])) {
    @$name = mysqli_real_escape_string($conn, $_POST['name']);
    @$id_no = $_POST['id_no'];
    @$gender = mysqli_real_escape_string($conn, $_POST['gender']);
    @$email = mysqli_real_escape_string($conn, $_POST['email']);
    @$phone = $_POST['phone'];
    @$check_out = $_POST['check_out'];
    @$check_in= $_POST['check_in'];

    @$select = "SELECT * FROM equipments WHERE equipment_id = '$equipment_id'";
    $result = $conn->query($select);
    $rows = $result->fetch_assoc();

    $select = " SELECT * FROM clients WHERE email = '$email' && id_no = '$id_no' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['success'] = "payment pending";
        header('location: payment.php');
        exit();
    }else {
        $query = "INSERT INTO clients( name,id_no, email,gender, phone,check_out,check_in,equipment_id)
        VALUES('$name','$id_no','$email','$gender','$phone','$check_out','$check_in','$equipment_id')";
        $result = mysqli_query($conn, $query);
        header('location: payment.php');
        exit();

    } 
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css\style2.css">
    <link rel="stylesheet" href="css\Main.css">

    <title>Booking site</title>
</head>

<body>
    <header>
        <div class="nav container">

            <i class='bx bx-menu' id="menu-icon"></i>

            <a href="#" class="logo">Urban<span>crew</span></a>

            <ul class="navbar">
                <li><a href="index.html" class="active">Home</a></li>
                <li class="dropdown"><a href="#catalogue">Catalogue</a>
                    <ul class="dropdown-menu">
                        <li><a href="Tractors.html" class="nav-dropdown " style="color: rgb(7, 7, 7);">Tractor</a></li>
                        <li><a href="Harvesters.html" class="nav-dropdown" style="color: rgb(7, 7, 7);">Harvesters</a>
                        </li>
                        <li><a href="Transporters.html" class="nav-dropdown"
                                style="color: rgb(14, 13, 13);">Transporters</a>
                        </li>
                        <li><a href="Loaders.html" class="nav-dropdown" style="color: rgb(7, 7, 7);">Loaders</a></li>
                        <li><a href="Headers.html" class="nav-dropdown" style="color: rgb(8, 8, 8);">Headers</a></li>
                        <li><a href="Sprayers.html" class="nav-dropdown" style="color: rgb(2, 2, 2);">Sprayers</a></li>
                        <li><a href="cultivators.html" class="nav-dropdown"
                                style="color: rgb(12, 12, 12);">cultivators</a></li>
                        <li><a href="planters.html" class="nav-dropdown" style="color: rgb(10, 10, 10);">planter</a>
                        </li>
                    </ul>
                </li>
                <li><a href="#abo">About us</a></li>
                <li><a href="#con">contact</a></li>
                <li><a href="register.php">sign up</a></li>
            </ul>
            <i class='bx bx-search' id="search-icon"></i>
            <div class="search-box container">
                <input type="search" name="" id="" placeholder="search here..." style="color: rgb(251, 252, 253);">
            </div>
        </div>
    </header>



    <div class="limiter">
        <div class="container-login100">
            <div class="login100-more"
                style="background-image: url('https://s.wsj.net/public/resources/images/BN-PQ805_TRACTO_TOP_20160901122306.jpg');">
            </div>

            <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">

                <form class="login100-form validate-form" action="" method="post">
                    <span class="login100-form-title p-b-59">
                        Book Your equipments
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Name is required">
                        <span class="label-input100">Fullname</span>
                        <input class="input100" type="text" name="name" placeholder="Name...">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="email is required">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="text" name="email" placeholder="User email...">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validais required">
                        <span class="label-input100">id number</span>
                        <input class="input100" type="text" name="id_no" placeholder="Enter id number...">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate=" phone number required">
                        <span class="label-input100">phone number</span>
                        <input class="input100" type="number" name="phone" placeholder="">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="gender required">
                        <span class="label-input100">gender</span>
                        <select name="gender">
                            <option value="Male">male</option>
                            <option value="Female">female</option>
                        </select>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="date required">
                        <span class="label-input100">check_out_date</span>
                        <input type="text" class="float" name="check_out_date">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="date required">
                        <span class="label-input100">check_in_date</span>
                        <input type="text" class="float" name="check_in_date">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" name="submit" type="submit">Book here

                            </button>
                        </div>

                    </div>
                </form>


            </div>
        </div>
    </div>


    <script src="js/main.js"></script>

    <section class="footer" id="footer">
        <div class="footer-container container">
            <div class="footer-box">
                <a href="#" class="logo">Urban<span>Crew</span></a>
                <div class="social">
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                    <a href="#"><i class='bx bxl-youtube'></i></a>
                </div>
                <div class="footer-box">
                    <h3>Page</h3>
                    <a href="#">Home</a>
                    <a href="#">Catalogue</a>
                    <a href="register.php">Sign up</a>
                </div>
            </div>
            <div class="footer-box">
                <h3>Legal</h3>
                <a href="#">Privacy</a>
                <a href="#">Refund Policy</a>
                <a href="#">Cookie Policy</a>
            </div>
            <div class="footer-box">
                <h3>Contacts</h3>
                <p>Kenya</p>
                <p>Uganda</p>
                <p>Tanzania</p>
            </div>
        </div>
    </section>
    <div class="copyright">
        <p>@2023 UrbanCrew All RIGHTS RESERVED</p>
    </div>

</body>

</html>