<?php

    require '../config/func.php';
    $result1 = mysqli_query($conn, "SELECT * FROM home WHERE id = 13");
    $row1 = mysqli_fetch_assoc($result1);

    $result2 = mysqli_query($conn, "SELECT * FROM home WHERE id = 14");
    $row2 = mysqli_fetch_assoc($result2);

    $result3 = mysqli_query($conn, "SELECT * FROM home WHERE id = 15");
    $row3 = mysqli_fetch_assoc($result3);

    $result4 = mysqli_query($conn, "SELECT * FROM home WHERE id = 16");
    $row4 = mysqli_fetch_assoc($result4);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">1`
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!-- ICONS -->
    <link rel="shortcut icon" href="./imgs/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/footer.css">

    <!-- JS -->
    <script src="./js/script.js" defer></script>
</head>
<body>
    <!-- HEADER -->
    <header class="header">
        <div class="logo-div">
            <a href="./index.php"><img src="./imgs/logo.png" class="logo" alt="logo"></a>
            <a href="./index.php" class="title">Court Reservation</a>
        </div>

        <nav class="nav-bar">
            <ul class="nav-menu">
                <li class="nav-item"><a href="./index.php" class="nav-link curr">Home</a></li>
                <li class="nav-item"><a href="./event.php" class="nav-link">Events</a></li>
                <li class="nav-item"><a href="./sched.php" class="nav-link">View Schedule</a></li>
            </ul>

            <div class="burger">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </nav>
    </header>
    
    <!-- HERO SECTION -->
    <section class="hero-section">
        <div class="upper-part">
            <h1>Welcome</h1>
            <h2>To Brgy Cupang <br> Covered Court <br> Online Reservation</h2>
        </div>

        
    </section>

    <!-- ABOUT SECTION -->
    <section class="about-section">
<!-- ------------------------------------------- -->
         <div class="div">
            <div class="left">
                <img src="./imgs/intro.jpg" alt="">
            </div>
            <div class="right">
                <h1> <?php echo $row1["name"];?> </h1>
                <p> <?php echo $row1["description"];?></p>
            </div>
        </div>

        <div class="div">
            <div class="left">
                <img src="./imgs/intro.jpg" alt="">
            </div>
            <div class="right">
                <h1> <?php echo $row2["name"];?> </h1>
                <p> <?php echo $row2["description"];?></p>
            </div>
        </div>

        <div class="div">
            <div class="left">
                <img src="./imgs/intro.jpg" alt="">
            </div>
            <div class="right">
                <h1> <?php echo $row3["name"];?> </h1>
                <p> <?php echo $row3["description"];?></p>
            </div>
        </div>


        <div class="div">
            <div class="right">
                <img src="./imgs/intro.jpg" alt="">
            </div>
            <div class="left">
                <h1> <?php echo $row4["name"];?> </h1>
                <p> <?php echo $row4["description"];?></p>
            </div>
        </div>


        <!-- ------------------------------ -->
        <div class="div">
            <div class="left">
                <img src="./imgs/intro.jpg" alt="">
            </div>
            <div class="right">
                <h1> <?php echo $row1["name"];?> </h1>
                <p> <?php echo $row1["description"];?></p>
            </div>
        </div>


        <div class="div">
            <div class="left">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem maxime sint eaque temporibus impedit eligendi culpa ducimus quod, nostrum laborum dolorem asperiores rem dolores reiciendis voluptates magni quisquam ex et nisi! Blanditiis quidem dolores voluptates, ad quasi voluptate earum possimus doloribus ea consectetur ab suscipit odio amet ut odit debitis voluptatibus ullam voluptas maiores aliquid dolor nihil quisquam quam? Nihil tempora rerum id ut sed velit quae, dignissimos at quam ratione repudiandae, molestias corporis nam, distinctio quis iure! Omnis, iusto?</p>
            </div>
            <div class="right">
                <img src="./imgs/middlezumba.jpg" alt="">
            </div>
        </div>

        <div class="div">
            <div class="left">
                <img src="./imgs/left.jpg" alt="">
            </div> 


        <!-- <div class="div">
            <div class="left">
                <img src="./imgs/intro.jpg" alt="">
            </div>
            <div class="right">
                <p>What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
        </div>

        <div class="div">
            <div class="left">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem maxime sint eaque temporibus impedit eligendi culpa ducimus quod, nostrum laborum dolorem asperiores rem dolores reiciendis voluptates magni quisquam ex et nisi! Blanditiis quidem dolores voluptates, ad quasi voluptate earum possimus doloribus ea consectetur ab suscipit odio amet ut odit debitis voluptatibus ullam voluptas maiores aliquid dolor nihil quisquam quam? Nihil tempora rerum id ut sed velit quae, dignissimos at quam ratione repudiandae, molestias corporis nam, distinctio quis iure! Omnis, iusto?</p>
            </div>
            <div class="right">
                <img src="./imgs/middlezumba.jpg" alt="">
            </div>
        </div>

        <div class="div">
            <div class="left">
                <img src="./imgs/left.jpg" alt="">
            </div> -->
            <div class="right">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt officia veritatis iusto ad neque aperiam dolores eum quaerat hic accusantium? Aspernatur omnis reprehenderit iure animi voluptatem. Nemo doloribus autem quibusdam quas dicta quo reiciendis omnis impedit sunt recusandae accusantium ipsum reprehenderit sint temporibus neque blanditiis, non minus a officiis nulla.</p>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt nostrum beatae qui reprehenderit porro architecto ducimus dolore eius nemo aperiam tempore incidunt, saepe fugiat officia vitae, dolorum libero nisi odit!</p>
            </div>
        </div>

        <div class="div">
            <div class="left">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem maxime sint eaque temporibus impedit eligendi culpa ducimus quod, nostrum laborum dolorem asperiores rem dolores reiciendis voluptates magni quisquam ex et nisi! Blanditiis quidem dolores voluptates, ad quasi voluptate earum possimus doloribus ea consectetur ab suscipit odio amet ut odit debitis voluptatibus ullam voluptas maiores aliquid dolor nihil quisquam quam? Nihil tempora rerum id ut sed velit quae, dignissimos at quam ratione repudiandae, molestias corporis nam, distinctio quis iure! Omnis, iusto?</p>
            </div>
            <div class="right">
                <img src="./imgs/20240419_063441.jpg" alt="">
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="contacts">
            <h3>Contact Us</h3>
            <p><i class="ri-mail-line"></i> cupang@muntinlupa.gov.ph</p>
            <p><i class="ri-phone-line"></i> +63 9 1234 45623</p>
            <p><i class="ri-map-pin-line"></i> Brgy. Cupang, Muntinlupa City</p>
        </div>
        <div class="socials">
            <h3>Follow Us</h3>
            <div class="links">
                <a href="#"><i class="ri-facebook-line"></i></a>
                <a href="#"><i class="ri-twitter-x-line"></i></a>
                <a href="#"><i class="ri-instagram-line"></i></a>
                <a href="#"><i class="ri-linkedin-box-fill"></i></a>
            </div>
        </div>
    </footer>
</body>
</html>