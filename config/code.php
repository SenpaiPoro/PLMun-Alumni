<?php
require 'func.php';
// //////////////////
// Home Management Add users
////////////////////
if(isset($_POST['save']))
{
    /////////////Redirecting Purpose only////////
    $superadmin = validate($_POST['superadmin']);
    ////////////////////////////////////////////
    $colleges = validate($_POST['colleges']);
    $program = validate($_POST['program']);
    $tempcode = validate($_POST['tempcode']);
    $firstname = validate($_POST['firstname']);
    $lastname = validate($_POST['lastname']);
    $middlename = validate($_POST['middlename']);
    $level = validate($_POST['level']);
    $sex =  validate($_POST['sex']);
    $graduated = validate($_POST['graduated']);
    $bday = validate($_POST['bday']);
    $programcode = programcode($program);
    $stdcode = Studentid($programcode);
    $username = strtolower($lastname.$firstname."_".$programcode."@edu.plmun.ph");
    $tempcode = ($stdcode.$tempcode);

    if ($colleges != '' && $program != ''  && $tempcode != ''
     && $firstname != '' && $lastname != '' && $middlename != '' && $sex != ''
      && $graduated != '' && $bday != '')
    {
        $users = "INSERT INTO users (level,colleges,program,tempcode,username,graduated) 
        VALUES ('$level', '$colleges','$program','$tempcode' ,'$username' ,'$graduated')";   

        $personal = "INSERT INTO personal (tempcode,FirstName,MiddleName,LastName,sex, bday)
        VALUES ('$tempcode','$firstname','$middlename','$lastname','$sex' ,'$bday')";
        $personalresult = mysqli_query($conn, $personal);
        
        $contacts = "INSERT INTO contacts (contactId,phone,email,landline) 
        VALUES ('$tempcode',null ,null, null)";
        $contactresult = mysqli_query($conn, $contacts);

        $result = mysqli_query($conn, $users) ;
        if($result && $personalresult && $contactresult)
        {
            if($superadmin != Null){
                redirect('../admin/Home_Settings.php', 'Users Successfully Added');
            }else{
                redirect('../dean/alumnilist.php', 'Users Successfully Added');
            }
        }
        else
        {
            redirect('../admin/Home_Management.php', 'Something went wrong.');
        } 
    }
    else
    {
        redirect('../admin/Home_Management.php','Please Fill Up all the input Fields');
    }   
}

// //////////////////
// Home Management Upadate user data
////////////////////
if(isset($_POST['update'])) {
    // Validate all inputs
    $colleges = validate($_POST['colleges']);
    $program = validate($_POST['program']);
    $graduatedyear = validate($_POST['graduatedyear']);
    $firstname = validate($_POST['firstname']);
    $lastname = validate($_POST['lastname']);
    $middlename = validate($_POST['middlename']);
    $sex = validate($_POST['sex']);
    $EventId = (int)validate($_POST['Id']); // Force integer type
    $page = validate($_POST['page']);
    
    // Verify ID exists first
    $user = getByid('users', $EventId);
    if($user['status'] != 200) {
        redirect('../admin/Home_Edit.php?id='.$EventId, 'ID not found.');
    }

    // Validate required fields
    if(empty($colleges) || empty($program)) {
        redirect('../admin/Home_Edit.php?id='.$EventId, 'Please fill all required fields');
    }

    // Use prepared statement
    $query = "UPDATE users
    JOIN personal ON 
    users.tempcode = personal.tempcode
    SET
    users.colleges = ?, 
    users.program = ?, 
    users.graduated = ?,
    personal.FirstName = ?,
    personal.LastName = ?,
    personal.MiddleName = ?,
    personal.sex = ?
    WHERE id = $EventId";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssissss", $colleges, $program, $graduatedyear, $firstname, $lastname, 
                                  $middlename, $sex);
    
    if($stmt->execute()) {
        $redirect = ($page == "alumnilist") 
                  ? '../dean/alumnilist.php' 
                  : '../admin/Home_Settings.php';
        redirect($redirect, 'Alumni Successfully Updated');
    } else {
        // Log the error for debugging
        error_log("Update failed: " . $stmt->error);
        redirect('../admin/Home_Edit.php?id='.$EventId, 'Update failed. Please try again.');
    }
    
    $stmt->close();
}
//////////////////////////////
// Users Update profile data//
//////////////////////////////
if(isset($_POST['updateprofile']))
{
    $profileId = validate($_POST['profileid']);
    $email = validate($_POST['email']);
    $phoneNumber = validate($_POST['phoneNumber']);
    $landlineNumber = validate($_POST['landlineNumber']);
    $RelationStatus = validate($_POST['RelationStatus']);
    $workStatus = validate($_POST['workStatus']);
    $address = validate($_POST['address']);


   if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $file_name = $_FILES['image']['name'];
        $file_temp = $_FILES['image']['tmp_name'];
        $folder = '../../users/Style/profile/' . $file_name;

        // Move the uploaded file to the desired directory
        if (move_uploaded_file($file_temp, $folder)) {
            $photos = "UPDATE personal SET
            photos = '$file_name'
            WHERE tempcode = '$profileId'"; 
            $result = mysqli_query($conn, $photos);
        } else {
            exit;
        }
    }

    $add = "SELECT WorkStatus FROM personal WHERE tempcode = '$profileId'";
    $result = mysqli_query($conn, $add);
    $statuswork = mysqli_fetch_assoc($result);

    if($statuswork['WorkStatus'] != $workStatus)
    {
        $now = new DateTime();
        $currentYear = $now->format("y");
        $currentMonth = $now->format('m');
        $currentDay = $now->format('d');
        $currentDate = $currentYear."-".$currentMonth."-".$currentDay;//y-m-d

        $query = "INSERT INTO workrecord (tempcode,workstatus, date) 
        VALUES ('$profileId','$workStatus', '$currentDate')";   
        $result = mysqli_query($conn, $query);
    }
    else
    {

    }
    $query = "UPDATE contacts 
    JOIN personal ON contacts.contactId = personal.tempcode
    SET
    contacts.phone = '$phoneNumber',
    contacts.email = '$email',
    contacts.landline = '$landlineNumber',
    personal.RelationStatus = '$RelationStatus',
    personal.WorkStatus = '$workStatus',
    personal.address = '$address'
    WHERE contacts.contactId = '$profileId'"; 
    $result = mysqli_query($conn, $query);
    if($result)
    {
        redirect('../../users/profile.php', '');
    } else {
        echo "Failed to upload file.";
        exit;
    }

    }
// ////////////////////////////////////////////////
// Event Management Add Data //////////////////////
///////////////////////////////////////////////////
if(isset($_POST['AddEvent']))
{ 
    $level = validate($_POST['level']);
    $name = validate($_POST['name']);
    $description = validate($_POST['description']);
    $colleges = validate($_POST['colleges']);

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $file_name = $_FILES['image']['name'];
        $file_temp = $_FILES['image']['tmp_name'];
        $folder = '../../users/Style/events/' . $file_name;

        // Move the uploaded file to the desired directory
        // Move the uploaded file to the desired directory
        if (move_uploaded_file($file_temp, $folder)) {
        $query = "INSERT INTO posts (photos,name,description,colleges) 
        VALUES ('$file_name','$name','$description','$colleges')";   
        
        $result = mysqli_query($conn, $query);
        
        if($result)
        {   
            if($level == "SuperAdmin"){
                redirect('../admin/Event.php', 'Event Successfully Uploaded');
            }else{
                redirect('../../users/Add-Event.php', 'Event Successfully Uploaded');
            }
        }
        else if($level == "SuperAdmin")
        {
            redirect('../admin/Add-Event.php', 'Something went wrong.');
        }else{
            redirect('../../users/Add-Event.php', 'Something went wrong.');
        }
    }else{
        exit;
    }

    }
}
// Event Management Upadte Data

if(isset($_POST['updateEvent']))
{  
    $EventId = validate($_POST['Id']);
    $name = validate($_POST['name']);
    $day = validate($_POST['date']);
    $description = validate($_POST  ['description']);
    $image = validate($_POST['image']);
    
    $user = getByid('event', $EventId);
    if($user['status'] != 200)
    {
        redirect('Event-Edit.php?id='.$EventId.'', 'ID not found.');
    }

if($name !='' && $day !='' && $description !='')
{  
    $queryEvent = "UPDATE event SET
    name = '$name',
    date = '$day', 
    description = '$description' 
    WHERE id = '$EventId' ";

    $result = mysqli_query($conn, $queryEvent);

    if($result)
    { 
        redirect('../admin/Event.php', 'Event Successfully Upadate!');
    }
    else
    {
        redirect('../admin/Event-Edit.php', 'Something Wend Wrong');
    }
}
else
{
    redirect('../admin/Event-Edit.php', 'Fill up All The Form');
}

}


?>