<?php 
include 'smtp.php';

$servername = "localhost";
$username = "root";
$password = "";
$db = "form_validation";


try {
    $con = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "connection successfully";
}
catch(PDOException $e){
    echo "Connection failed : ", $e->getMessage();
} 

// CREATE START
if(isset($_POST['name'],$_POST['dob'],$_POST['age'],$_POST['gen'],$_POST['state'],$_POST['city'],$_POST['university'],$_POST['college'],$_POST['address'],$_POST['phonenum'],$_POST['gmail'])){
    $names = $_POST['name'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $gen = $_POST['gen'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $university = $_POST['university'];
    $college = $_POST['college'];
    $address = $_POST['address'];
    $phonenum = $_POST['phonenum']; 
    $email = $_POST['gmail'];
    if(isset($_POST['create'])){
        // duplicate value validation for Name, phone number, email
        $validation_name = $con->query("SELECT * FROM register_form WHERE name='$names'");
        $name_exist = $validation_name->fetchColumn(PDO::FETCH_ASSOC);
        $validation_phone = $con->query("SELECT * FROM register_form WHERE name='$names'");
        $phone_exist = $validation_phone->fetchColumn(PDO::FETCH_ASSOC);
        $validation_email = $con->query("SELECT * FROM register_form WHERE email='$email'");
        $email_exist = $validation_email->fetchColumn(PDO::FETCH_ASSOC);
        if($name_exist>0){
            $message = "Name Already exist";
            echo "<script>alert('$message');</script>";
        }else if($phone_exist>0){
            $message = "Phone number Already exist";
            echo "<script>alert('$message');</script>";
        }else if($email_exist>0){
            $message = "Email-id number Already exist";
            echo "<script>alert('$message');</script>";
        }else{
            // Image
            $file_name = $_FILES['image']['name'];
            $temp_name = $_FILES['image']['tmp_name'];
            $folder_path = './static/img/'.$file_name;
            if(move_uploaded_file($temp_name,$folder_path)){
                // Create
                print_r("create button");
                $register = $con->prepare("INSERT INTO register_form (name,dob,age,gender,state,city,university,college,address,phonenum,email,imgs)VALUES('$names','$dob','$age','$gen','$state','$city','$university','$college','$address','$phonenum','$email','$file_name')");
                $register->execute();
                $smtp_mail = mailFunction($names,$dob,$age,$gen,$state,$city,$university,$college,$address,$phonenum,$email);
                echo $smtp_mail;
                $message = "Email sent successfully!";
                echo "<script>alert('$message');</script>";
                header("Location: form_validation.php");
                exit();
            }else{
                $message = "Failed to upload image";
                echo "<script>alert('$message');</script>";
            }
        }
    }else{
        $message = "Register Not stored in DataBase";
        echo "<script>alert('$message');</script>";
        header("Location: form_validation.php");
    }
}else{
    // view
    $limit =  2;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page-1)*$limit;
    // echo $start;
    $view_data_query  = $con->query("SELECT * FROM register_form LIMIT $start, $limit");
    $view_data = $view_data_query->fetchAll(PDO::FETCH_ASSOC);

    // Counting records
    $data_count  = $con->query("SELECT COUNT(id) AS id FROM register_form");
    $dataCount = $data_count->fetchAll(PDO::FETCH_ASSOC);
    $total = $dataCount[0]['id'];
    $pages = ceil($total/$limit);

    if($page>1){ 
        $Previous = $page-1;
    }
    if($page<$pages){
        $Next = $page+1;
    }
}
// CREATE END




// UPDATE START
if(isset($_GET['editid'])){
    $upid = $_GET['editid'];
    $update = $con->prepare("SELECT * FROM register_form WHERE id = $upid ");
    $update->execute();
    $show =  $update->fetch(PDO::FETCH_ASSOC);
        
    $names = $show['name'];
    $dob = $show['dob'];
    $age = $show['age'];
    $gen = $show['gender'];
    $state = $show['state'];
    $city = $show['city'];
    $university = $show['university'];
    $college = $show['college'];
    $address = $show['address'];
    $phonenum = $show['phonenum']; 
    $email = $show['email'];
    $imgs = $show['imgs'];
    if(isset($_POST['edit'])){
        $dob = $_POST['dob'];
        $age = $_POST['age'];
        $gen = $_POST['gen'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $university = $_POST['university'];
        $college = $_POST['college'];
        $address = $_POST['address'];

        // Check if a new image is uploaded
        if(!empty($_FILES['image']['name'])) {
            $file_name = $_FILES['image']['name'];
            $temp_name = $_FILES['image']['tmp_name'];
            $folder_path = './static/img/'.$file_name;
            if(move_uploaded_file($temp_name,$folder_path)){
                // Update with new image
                print_r("update button");
                $update_data = $con->prepare("UPDATE register_form SET dob='$dob',age='$age',gender='$gen',state='$state',city='$city',university='$university',college='$college',address='$address',imgs='$file_name'  WHERE id = $upid ");
                $update_data->execute();
                // print    _r($update_data); 
                // $message = "successfully to upload";
                echo "<script>alert('successfully to upload');</script>";     
                header("Location: form_validation.php");
                exit();
            }else{
                $message = "Failed to upload image";
                echo "<script>alert('$message');</script>";
            }
        } else {
            // Update without changing the image
            $update_data = $con->prepare("UPDATE register_form SET dob='$dob',age='$age',gender='$gen',state='$state',city='$city',university='$university',college='$college',address='$address' WHERE id = $upid ");
            $update_data->execute();
            echo "<script>alert('Update successful');</script>";     
            header("Location: form_validation.php");
            exit();
        }
    }
}
// UPDATE END 

// DELETE START
if(isset($_GET['deleteid'])){
    $deleteid = $_GET['deleteid'];
    $delete_data = $con->query("DELETE FROM register_form WHERE id = $deleteid");
    if($delete_data->execute()){
        echo "<script>alert('$message');</script>";
        header("Location: form_validation.php");
        exit();
    }else{
        $message = "Record Not deleted";
        echo "<script>alert('$message');</script>";
    }
}   
// DELETE END
?>