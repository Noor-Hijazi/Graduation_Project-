<?php 
declare(strict_types=1);

function read_companies_contr(object $pdo, int $userId){
    $companies = read_companies($pdo);
    foreach ($companies as $company) {
        if ($company['role'] === 'car') {
           $result =  read_spicefic_car_company( $pdo,  $userId);
           var_dump($result);
           return $result;
            
        }else if($company['role'] === 'rest'){
            echo 'unkown';
        }

    }
}





//for add guide

function insertion_into_guide ($pdo ,$name,$email,$experience,$language, $can_go, $photo, $photoName, $photoTmpName, $photoSize,$photoError,$photoType)
{
    $fileExt = pathinfo($photoName, PATHINFO_EXTENSION);
    $fileActualExt = strtolower($fileExt);
    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($photoError === 0) {
            if ($photoSize < 300000) {
                $imageData = file_get_contents($photoTmpName);
                insert_into_guid($pdo, $name, $email, $experience, $language, $can_go, $photoName, $imageData);
                echo "<script>alert('Guide with name \"$name\" added successfully.');window.location.href = '../includes/admin_dashboard_add_giude.inc.php';</script>";
            } else {
                echo 'Your file is too big!';
            }
        } else {
            echo 'There was an error uploading your image!';
        }
    } else {
        echo "You cannot upload images of this type!";
    }
}


// to get all users are logged in 

function static_login(object $pdo):int{
    $count =0;
    $users= read_users( $pdo);
    foreach ($users as $user) {
       ++$count;
    }
    return $count;
}
function static_car_company(object $pdo):int{
    $count =0;
    $users= read_car_companies( $pdo);
    foreach ($users as $user) {
       ++$count;
    }
    return $count;
}

function static_rest_company(object $pdo):int{
    $count =0;
    $users= read_rest_companies( $pdo);
    foreach ($users as $user) {
       ++$count;
    }
    return $count;
}

function static_hotel_company(object $pdo):int{
    $count =0;
    $users= read_hotel_companies( $pdo);
    foreach ($users as $user) {
       ++$count;
    }
    return $count;
}
function static_guides_company(object $pdo):int{
    $count =0;
    $users=  get_guides( $pdo );
    foreach ($users as $user) {
       ++$count;
    }
    return $count;
}