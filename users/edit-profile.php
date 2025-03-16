<?php include ('include/header.php'); ?>
<div class="main-content">
            <div class="content">
             <div class="prof">
               <form action="../admin/config/code.php" method="POST" enctype="multipart/form-data">
                
               <div class="profile">
            <div class="profile-pic-container">
                    <img  <?php 
                                if ($row['photos'] != NULL) {
                                    echo 'src="Style/profile/'.$row['photos'].'"';
                                } else {
                                    echo 'src="Style/Photos/profile.jpg"';
                                }
                                ?> alt="Profile Picture" class="profile-pic" id="profileImage">
                    <label for="fileInput" class="upload-btn">
                        <img src="Style/Photos/camera-icon.jpg" alt="Style/Photos/camera-icon.jpg">
                    </label>
                    <input type="file" name="image" id="fileInput"  style="display: none;" 
                    value="<?php echo $row['photos'];?>">
                </div>
                <h1><?php echo $row['FirstName'] ;?> <?php echo $row['LastName'] ;?></h1>
            </div>
        </aside>
        <main class="content">
            <section class="profile-section">
                <h2>Edit Profile</h2>
                <div class="form-group">
                <br>
                <h4>Contact</h4> 
                    <input type="hidden" name="profileid" value="<?= $row['tempcode'];?>" required>
                    <br><label>Email</label>
                    <input type="email" name="email" value="<?php echo $row['email'] ;?>"><br>
                    <br><label>Phone Number</label>
                    <input type="number" name="phoneNumber" value="<?php echo $row['phone'] ;?>"><br>
                    <br><label>Landline Number</label>
                    <input type="number" name="landlineNumber" value="<?php echo $row['landline'] ;?>"><br>
                    <br>
                <h4>Others</h4>
                <br><label>Relationship Status:</label>
                <!-- <input type="text" name="RelationStatus" value="<?php //echo $row['RelationStatus'] ;?>"><br> -->
                <Select name="RelationStatus" value="<?php echo $row['RelationStatus'] ;?>">
                <option value=<?php echo $row['RelationStatus'] ;?>> <?php echo $row['RelationStatus'] ;?></option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Widowed">Widowed</option>
                    <option value="Separated">Separated</option>
                    <option value="Divorced">Divorced</option>
                </Select>
                <label><br>Working Status:</label>
                <Select name="workStatus" value="<?php echo $row['WorkStatus'] ;?>">
                    <option value=<?php echo $row['WorkStatus'] ;?>><?php echo $row['WorkStatus'] ;?></option>
                    <option value="Employed">Employed</option>
                    <option value="Unemployed">Unemployed</option>
                    <option value="Student">Student</option>
                    <option value="Retired">Retired</option>
                </Select>
                <br><label><br>Address</label>
                    <input type="text" name="address" value="<?php echo $row['address'] ;?>"><br>
                </div>
                <div class="account-info">
                </div>
            </section>
            <button class="save-btn" name="updateprofile" type="submit"> Update </button>
            </form>
        </div>
    </div>
</div>
<script>
        document.getElementById('fileInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profileImage').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
<?php include ('include/footer.php'); ?>