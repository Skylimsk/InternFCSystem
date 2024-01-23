<?php
    include('../model/studModel.php');

    $currentStep = $_SESSION['currentStep'] ?? 1;
    $numberOfSteps = 4;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['formData'][$currentStep] = $_POST;

        if(isset($_POST['next'])) {
            $_SESSION['currentStep']++;
        } elseif (isset($_POST['back'])) {
            $_SESSION['currentStep']--;
        } elseif (isset($_POST['submit'])) {
            saveInternApplication($_SESSION['formData']);
            exit();
        }

        $currentStep = max(1, min($numberOfSteps, $_SESSION['currentStep']));
        $_SESSION['currentStep'] = $currentStep;
        header("Location: ../view/internApplication.php");
    }
?>