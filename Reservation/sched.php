<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!-- ICONS -->
    <link rel="shortcut icon" href="./imgs/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/sched.css">
    <link rel="stylesheet" href="./css/footer.css">

    <!-- JS -->
    <script src="./js/script.js" defer></script>
    <script src="./js/sched.js" defer></script>
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
                <li class="nav-item"><a href="./index.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="./event.php" class="nav-link">Events</a></li>
                <li class="nav-item"><a href="./sched.php" class="nav-link curr">View Schedule</a></li>
            </ul>

            <div class="burger">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </nav>
    </header>

    <!-- CALENDAR TABLE -->
    <div class="calendar-container">
        <div class="calendar-header">
            <!-- <button id="prevMonth">&#10094;</button> -->
            <h2 id="monthYear"></h2>
            <!-- <h2>12 - 25</h2> -->
            <!-- <button id="nextMonth">&#10095;</button> -->
        </div>
        <div class="weekdays">
            <div>Sun</div>
            <div>Mon</div>
            <div>Tue</div>
            <div>Wed</div>
            <div>Thu</div>
            <div>Fri</div>
            <div>Sat</div>
        </div>
        <div class="days" id="days"></div>
    </div>
</body>
</html>