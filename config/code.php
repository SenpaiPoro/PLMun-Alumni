<?php
require 'func.php';
// //////////////////
// Home Management Add users
////////////////////
if(isset($_POST['save']))
{
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
            redirect('../admin/Home_Settings.php', 'Users Successfully Added');
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

if(isset($_POST['update']))
{
    $name = validate($_POST['colleges']);
    $description = validate($_POST['program']);
    $image = validate($_POST['tempcode']);
    $graduatedyear = validate($_POST['graduatedyear']);
    $EventId = validate($_POST['Id']);
    $user = getByid('users', $EventId);

    if($user['status'] != 200)
    {
        redirect('../admin/Home_Edit.php?id='.$EventId.'', 'ID not found.');
    }
    
    if ($name != '' && $description != '')
    {
        $query = "UPDATE users SET
        colleges = '$name',
        program = '$description',
        tempcode = '$image',
        graduated = '$graduatedyear'
        WHERE id = '$EventId' "; 
        
        $result = mysqli_query($conn, $query);
        
        if($result)
        {
            redirect('../admin/Home_Settings.php', 'Alumni Successfully Updated');
        }
        else
        {
            redirect('../admin/Home_Edit.php', 'Something went wrong.');
        }
    }
    else
    {
        redirect('../admin/Home_Edit.php','Please Fill Up all the input Fields');
    }   
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
// Event Management Add Data
////////////////////////////////////////////////////
if(isset($_POST['saveEvent']))
{
    $name = validate($_POST['name']);
    $description = validate($_POST['description']);
    $program = validate($_POST['program']);
    $image = validate($_POST['image']);


    if ($name != "" && $description != "" && $day != "")
    {
        $query = "INSERT INTO event (name,date,description,image) 
        VALUES ('$name','$day','$description','$filename')";   
        
        $result = mysqli_query($conn, $query);
        
        if($result)
        {
            redirect('../admin/Event.php', 'Event Successfully Added');
        }
        else
        {
            redirect('../admin/Add-Event.php', 'Something went wrong.');
        }
    }
    else
    {
        redirect('../admin/Add-Event.php','Please Fill Up all the input Fields');
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