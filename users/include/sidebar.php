
<div class="dashboard">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <button id="toggle-sidebar" class="toggle-btn">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <ul class="sidebar-menu">
            <div class="text-center">
  <img <?php 
                                if ($row['photos'] != NULL) {
                                    echo 'src="Style/profile/'.$row['photos'].'"';
                                } else {
                                    echo 'src="Style/Photos/profile.jpg"';
                                }
                                ?> alt="Profile Picture" class="profile-pic menu-text">
  <h4 class="menu-text text-info"style="margin-left: 1.5rem;"><?php echo $row['FirstName'];?>, <?php echo $row['LastName'];?></h4>
</div>
                <li><a href="userDashboard.php"><i class="fas fa-home"></i> <span class="menu-text">Home</span></a></li>
                <li><a href="profile.php"><i class="fas fa-user"></i> <span class="menu-text">Profile</span></a></li>
                <li><a href="#"><i class="fas fa-envelope"></i> <span class="menu-text">Messages</span></a></li>
                <li><a href="#"><i class="fas fa-cog"></i> <span class="menu-text">Settings</span></a></li>
                <li><a href="include/Logout.php"><i class="fas fa-sign-out-alt"></i> <span class="menu-text">Logout</span></a></li>
            </ul>
        </div>