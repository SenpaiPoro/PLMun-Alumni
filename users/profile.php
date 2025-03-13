<?php include ('include/header.php'); ?>
<div class="main-content">
            <div class="content">
                <div class="prof">
            <div class="profile">
            <div class="profile-pic-container">
                    <img  <?php 
                                if ($row['photos'] != NULL) {
                                    echo 'src="Style/profile/'.$row['photos'].'"';
                                } else {
                                    echo 'src="Style/Photos/profile.jpg"';
                                }
                                ?> alt="Profile Picture" class="profile-pic" id="profileImage">
                    <label for="uploadProfilePic" class="upload-btn">
                    </label>
                    <input value="submit" type="file" id="uploadProfilePic" accept="image/*" style="display: none;">
                </div>
                <h1><?php echo $row['FirstName'] ;?> <?php echo $row['MiddleName'] ;?>  <?php echo $row['LastName'] ;?></h1>
            </div>
        </aside>
        <main class="content">
            <section class="profile-section">
                <h2>Details</h2>
                <br>
                <div class="form-group">
                    <label><b>Lives in:</b> <p> </p></label><br>
                    <label><b>Working Status:</b> <?php echo $row['WorkStatus'] ;?></label><br>
                    <label><b>Education:</b> <?php echo $row['program'] ;?></label><br>
                    <label><b>Year Graduated: </b>  <?php echo $row['graduated'] ;?></label><br>
                </div>
                <div class="account-info">
                <h2>Contact</h2>
                <br>
                <div class="form-group">
                    <label><b>Phone No:</b> <?php echo $row['phone'] ;?></label><br>
                    <?php 
                    if ($row['email'] != NULL) { ?>
                    <label><b>Email:</b> <?php echo $row['email'] ;?></label><br>
                    <?php } 
                    else {
                        //no display in email row
                        }
                    ?>
                    <label><b>Email:</b> <?php echo $row['username'] ;?></label><br>
                    <label><b>Landline No:</b> <?php echo $row['landline'] ;?></label><br>
                </div>
                <div class="account-info">
                <h2>Personal Information</h2>
                <br>
                <div class="form-group">
                <label><b>Age:</b> <?php $age = age($tempcode); echo $age ;?></label><br>
                    <label><b>Sex:</b> <?php echo $row['sex'] ;?></label><br>
                    <label><b>Relationship:</b><?php echo $row['RelationStatus'] ;?></label><br>
                </div>
                </div>
                <div class="account-info">
                <h2>Social Media Account</h2>
                <br>
                <div class="form-group">
                <label><b>facebook:</b> <?php $age = age($tempcode); echo $age ;?></label><br>
                    <label><b>instagram:</b> <?php echo $row['sex'] ;?></label><br>
                    <label><b>twitter:</b><?php echo $row['RelationStatus'] ;?></label><br>
                </div>
                </div>
                <br>
</section>
                <a class="save-btn" id="saveEvents" href="edit-profile.php">Edit</a>
        </main>
    </div>
    </div>
    <script>
        document.getElementById("saveProfile").addEventListener("click", function() {
            let nickname = document.getElementById("nickname").value;
            let email = document.getElementById("email").value;
            if (!nickname || !email) {
                alert("Please fill out all profile fields.");
            } else {
                alert("Profile saved successfully!");
            }
        });

        document.getElementById("saveEvents").addEventListener("click", function() {
            let name = document.getElementById("realName").value;
            let phone = document.getElementById("phoneNumber").value;
            let address = document.getElementById("address").value;
            if (!name || !phone || !address) {
                alert("Please fill out all event fields.");
            } else {
                alert("Event details saved successfully!");
            }
        });

        document.getElementById("uploadProfilePic").addEventListener("change", function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById("profileImage").src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
            </div>
        </div>
</div>

<?php include ('include/footer.php'); ?>