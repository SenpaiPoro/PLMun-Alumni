 <?php
require '../admin/config/func.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}if (!isset($_SESSION['id'])) {
    header('Location:Login.php');
    exit();
}
$tempcode = $_SESSION['tempcode'];  
$sql = "SELECT users.id, users.tempcode, personal.FirstName, personal.MiddleName, personal.LastName
        FROM users INNER JOIN personal ON $tempcode  = users.tempcode";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
?>
//try to modify the users
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Dashboard</title>
    <link rel="stylesheet" href="Style/users-dashboard.css">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h2 class="logo">Dashboard</h2>
                <button id="toggle-sidebar" class="toggle-btn">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <ul class="sidebar-menu">
                <li><a href="dashboard.php"><i class="fas fa-home"></i> <span class="menu-text">Home</span></a></li>
                <li><a href="profile.php"><i class="fas fa-user"></i> <span class="menu-text">Profile</span></a></li>
                <li><a href="#"><i class="fas fa-envelope"></i> <span class="menu-text">Messages</span></a></li>
                <li><a href="#"><i class="fas fa-cog"></i> <span class="menu-text">Settings</span></a></li>
                <li><a href="#"><i class="fas fa-sign-out-alt"></i> <span class="menu-text">Logout</span></a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <header>
                <h1>Welcome, <?php echo $row['FirstName'] ;  ?></h1>
            </header>
            <div class="content">

                
            </div>
        </div>
    </div>

    <!-- JavaScript for Sidebar Toggle -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleSidebar = document.getElementById('toggle-sidebar');

        toggleSidebar.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
        });
    </script>
</body>
</html>

<!-- // if ($result->num_rows > 0) {
//     echo "<table border='1'>
//             <tr>
//                 <th>Code</th>
//                 <th>Name</th>
//             </tr>";

//     while($row = $result->fetch_assoc()) {
//         c
//     }
//     echo "</table>";
// } else {
//     echo "0 results";
// }

// Close connection and end HTML output
// $conn->close(); -->
