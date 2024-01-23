<?php
    session_start();

    function dbConnect() {
        $con = mysqli_connect("localhost", "root", "", "internFC");
        if (!$con) {
            die('Could not connect: ' . mysqli_connect_error());
        }
        return $con;
    }
    
    function saveCoordinatorInfo($data) {
        $con = dbConnect();
        $stmt = mysqli_prepare($con, "INSERT INTO coordinatorInfo (coorName, coorFac, coorOfficeNo, coorPhoneNo, coorEmail, coorProgramme) VALUES (?,?,?,?,?,?)");
        mysqli_stmt_bind_param($stmt, "ssssss", $data['coorName'], $data['coorFac'], $data['coorOfficeNo'], $data['coorPhoneNo'], $data['coorEmail'], $data['coorProgramme']);
        mysqli_stmt_execute($stmt);
        $insertedId = mysqli_stmt_insert_id($stmt);
        mysqli_stmt_close($stmt);
        return $insertedId;
    }

    function saveCompanyInfo($data) {
        $con = dbConnect();
        $stmt = mysqli_prepare($con, "INSERT INTO companyInfo (comName, comRegNo, comPicName, comWeb, comCategory, comSector, comCity, comState, comPostcode, comCountry, comOfficeNo, comFaxNo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
        mysqli_stmt_bind_param($stmt, "ssssssssssss", $data['comName'], $data['comRegNo'], $data['comPicName'], $data['comWeb'], $data['comCategory'], $data['comSector'], $data['comCity'], $data['comState'], $data['comPostcode'], $data['comCountry'], $data['comOfficeNo'], $data['comFaxNo']);
        mysqli_stmt_execute($stmt);
        $insertedId = mysqli_stmt_insert_id($stmt);
        mysqli_stmt_close($stmt);
        return $insertedId;
    }

    function saveCompanyDepartment($data) {
        $con = dbConnect();
        $stmt = mysqli_prepare($con, "INSERT INTO companyDepartment (departName, picName, picOfficePhoneNo, picFaxNo, picMobileNo, picEmail) VALUES (?,?,?,?,?,?)");
        mysqli_stmt_bind_param($stmt, "ssssss", $data['departName'], $data['picName'], $data['picOfficePhoneNo'], $data['picFaxNo'], $data['picMobileNo'], $data['picEmail']);
        mysqli_stmt_execute($stmt);
        $insertedId = mysqli_stmt_insert_id($stmt);
        mysqli_stmt_close($stmt);
        return $insertedId;
    }

    function savePlacementDetails($data) {
        $con = dbConnect();
        $stmt = mysqli_prepare($con, "INSERT INTO placementDetails (accommodation, distance, transportation, comProfile, scopeOffer) VALUES (?,?,?,?,?)");
        mysqli_stmt_bind_param($stmt, "sssss", $data['accommodation'], $data['distance'], $data['transportation'], $data['comProfile'], $data['scopeOffer']);
        mysqli_stmt_execute($stmt);
        $insertedId = mysqli_stmt_insert_id($stmt);
        mysqli_stmt_close($stmt);
        return $insertedId;
    }

    function saveInternApplication($formData) {
        $con = dbConnect();
        
        try {
            // Save coordinator info and get ID
            $coordinatorId = saveCoordinatorInfo($formData[1]); // Assuming step 1 is coordinator info
            // Save company info and get ID
            $companyDetailsId = saveCompanyInfo($formData[2]); // Assuming step 2 is company main info
            // Save department details and get ID
            $departmentDetailsId = saveCompanyDepartment($formData[3]); // And so on...
            // Save placement details and get ID
            $placementDetailsId = savePlacementDetails($formData[4]);
            
            // Now save the intern application with all the foreign keys
            $stmt = mysqli_prepare($con, "INSERT INTO internApplication (coordinatorInfo, companyDetails, departmentDetails, placeDetails) VALUES (?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "iiii", $coordinatorId, $companyDetailsId, $departmentDetailsId, $placementDetailsId);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            
            // If everything is fine, commit the transaction
        } catch (mysqli_sql_exception $exception) {
            mysqli_rollback($con);
            throw $exception;
        }

        $stmt->close();
        $con->close();
    }

    if (isset($_POST['submit'])) {
        // Validate and sanitize all data here
        
        // Call the function to save the entire application
        saveInternApplication($_SESSION['formData']);
        
        // Clear session data and redirect to a thank you page
        session_destroy();
        //header('Location: thank_you.php');
        exit();
    }

    function displayForm($step){
            switch ($step) {
                case 1: 
                    include 'form_step1.php';
                    break;
                case 2:
                    include 'form_step2.php';
                    break;
                case 3:
                    include 'form_step3.php';
                    break;
                case 4:
                    include 'form_step4.php';
                    break;
                
            }
    }
?>