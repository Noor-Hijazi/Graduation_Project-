<?php

//to insert the rest
function insertion_into_rest($pdo, $userID ,$name,$address,$category,$fileName_one, $fileTmpName_one, $fileSize_one, $fileError_one, $fileType_one , $menu_url)

{
    $fileExt_one = pathinfo($fileName_one, PATHINFO_EXTENSION);

    $fileActualExt_one = strtolower($fileExt_one);
    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt_one, $allowed)) {
        if ($fileError_one === 0 ) {
            if ($fileSize_one < 400000) {
                $imageData_one = file_get_contents($fileTmpName_one);
               
                insert_into_restaurant($pdo, $userID, $name, $address, $category, $fileName_one, $imageData_one, $menu_url) ;
                echo "<script>alert('Restaurant with name \"$name\" added successfully.');window.location.href = '../views/restaurant_dashboard/insert_rest.php';</script>";

                
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


// Function to handle deletion of a rest
function delete_rest($pdo, $name) {
    $rowCount = delete_a_rest($pdo, $name);
    if ($rowCount > 0) {
        echo "<script>alert('Restaurant with name \"$name\" deleted successfully.');window.location.href = '../views/restaurant_dashboard/delete_rest.php';</script>";
    } else {
        echo "<script>alert('No Restaurant found with the name \"$name\".');window.location.href = '../views/restaurant_dashboard/delete_rest.php';</script>";
    }
}



function Update_rest_contr($pdo, $restId, $name, $address, $category, $fileName_one, $fileTmpName_one, $fileSize_one, $fileError_one, $fileType_one, $menu_url) {
    $updateImage = false;
    
    // Check if a file was uploaded
    if (!empty($fileName_one)) {
        $fileExt_one = pathinfo($fileName_one, PATHINFO_EXTENSION);
        $fileActualExt_one = strtolower($fileExt_one);
        $allowed = array('jpg', 'jpeg', 'png', "");

        if (in_array($fileActualExt_one, $allowed)) {
            if ($fileError_one === 0) {
                if ($fileSize_one < 300000) { // 300KB size limit
                    $imageData_one = file_get_contents($fileTmpName_one);
                    $updateImage = true;
                } else {
                    echo 'Your file is too big!';
                    return;
                }
            } else {
                echo 'There was an error uploading your image!';
                return;
            }
        } else {
            echo "You cannot upload images of this type!";
            return;
        }
    }

    // Proceed with the update with checking if the image was uploadedor not
    Update_rest($pdo, $restId, $name, $address, $category, $updateImage ? $fileName_one : null, $updateImage ? $imageData_one : null, $menu_url);
    echo "<script>alert('Restaurant with name \"$name\" updated successfully.');window.location.href = '../views/restaurant_dashboard/edit_rest.php?ID=$restId';</script>";
}