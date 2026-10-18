<?php 
    require_once 'ja_dbConfig.php';
    require_once 'models.php';
//this file is responsible for managing the actions from the ja-index.php
//actions are; Insert, Update, and Delete

    if (isset($_POST['insertNewApplicantBtn'])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $resume_url = $_POST['resume_url'];
        $years_experience = $_POST['years_experience'];
        $primary_skills = $_POST['primary_skills'];
        $education_level = $_POST['education_level'];

        $insert_query = insertIntoApplicantRecord(
                    $pdo,$first_name,$last_name,$email,$phone_number,
                    $resume_url,$years_experience,$primary_skills,$education_level
                );
        if ($insert_query) {
            echo "<p>Applicant Added. <a href='ja_index.php'>Click here to view record.";
        } else {
            echo "<p>Failed to add Applicant</p>";
        }
    } else {
        echo "<p>Make sure that no fields are empty.</p>";
    } //this is to insert a new record

    if (isset($_POST['editApplicantBtn'])) {
        $application_id = $_GET['application_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $resume_url = $_POST['resume_url'];
        $years_experience = $_POST['years_experience'];
        $primary_skills = $_POST['primary_skills'];
        $education_level = $_POST['education_level'];

        $update_query = updateApplicant($pdo,$first_name, $last_name, $email, $phone_number, 
            $resume_url, $years_experience, $primary_skills, $education_level, $application_id);
        
        if ($update_query) {
            echo "<p>Applicant Updated. <a href='ja_index.php'>Click here to view record.";
        } else {
            echo "<p>Failed to Update Applicant</p>";
        }
    } else {
        echo "<p>Make sure that no fields are empty.</p>";
    } //this is to update a record
    
    if (isset($_POST['deleteApplicantBtn'])) {
        $delete_query = deleteApplicant($pdo, $_GET['application_id']);
        
        if ($delete_query) {
            echo "<p>Applicant Deleted. <a href='ja_index.php'>Click here to return.";
        } else {
            echo "<p>Failed to Delete Applicant</p>"; 
        }
    } //this is to delete a record
?>
