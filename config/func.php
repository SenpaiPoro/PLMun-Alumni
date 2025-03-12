<?php
session_start();

require 'dbcon.php';

function validate($inputData)
{
    global $conn;
    $validatedData = mysqli_real_escape_string($conn, $inputData);
    return trim($validatedData);
}

function redirect ($url, $status)
{  
   $_SESSION['status'] = $status;
   header('Location: '.$url);
   exit(0);
}
function alertMessage()
{ 
    if(isset($_SESSION['status']))
    {
        echo '<div class="alert alert-success">
        <h6>'.$_SESSION['status'].'</h6>
        </div>';
        unset($_SESSION['status']);
    }
}
function checkId($paramType){

    if(isset($_GET[$paramType]))
    {
        if($_GET[$paramType] != null){
            return $_GET[$paramType];
        }else{
            return 'Id Not Found';
        }
    }else{
        return 'No Id Given';
    }
}

function GetData($tablename)
{
    global $conn;

    $table = validate($tablename);

    $query = "SELECT * FROM $table";
    $result = mysqli_query($conn, $query);
    return $result;

}

function getByid($tablename, $id)
{
    global $conn;

    $table = validate($tablename);
    $id = validate($id);

    $query = "SELECT * FROM  $table WHERE id= '$id' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if($result)
    {
        if(mysqli_num_rows($result) == 1)
        {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $response = [
                'status' => 200,
                'data' => $row
            ];
            return $response;
        }
        else
        {
            $response = [
                'status' => 400,
                'message' => 'No Data Record'
            ];
            return $response;
        }
    }
    else
    {
        $response = [
            'status' => 500,
            'message' => 'Something Went Wrong'
        ];
    }
}

function deleteQuery($tablename, $id, $personalId){
    global $conn;

    $table = validate($tablename);
    $id = validate($id);
    $personalId = validate($personalId);

    $query = 
    "DELETE  $table, personal, contacts
    FROM $table
    JOIN 
    personal 
    ON $table.tempcode = personal.tempcode
    JOIN
    contacts
    ON personal.tempcode = contacts.contactId
    WHERE contacts.contactId = '$personalId'";
    $result = mysqli_query($conn, $query);
    return $result;
}

function age ($id){
    global $conn;

    $query = "SELECT bday FROM personal WHERE tempcode = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $dob = $row['bday'];
    $today = new DateTime();
    $birthdate = new DateTime($dob);
    $age = $today->diff($birthdate)->y;

    $currentMonth = $today->format('m');
    $currentDay = $today->format('d');
    $birthMonth = $birthdate->format('m');
    $birthDay = $birthdate->format('d');

    if (($currentMonth < $birthMonth) || ($currentMonth == $birthMonth && $currentDay < $birthDay)) {
        $age;
    }else{
        $age--;
    }

    return $age;
}

function programcode($program)
{
    switch ($program) {
    case "information-technology":
        return "bsit";
        break;
    case "computer-science":
        return "bscs";
        break;
    case "act":
        return "act";
        break;
    case "criminology":
        return "bscrim";
        break;
    case "communication":
        return "bscomm";
        break;
    case "political-science":
        return "bsps";
        break;
     case "psychology":
        return "bspsy";
        break;
    case "business-administration":
        return "bsad";
        break;
    case "accountancy":
        return "bsaccounting";
        break;
    case "elementary-education":
    case "secondary-education":
        return "bsed";
        break;                                               
    default:
        return $program;
}
}
?>