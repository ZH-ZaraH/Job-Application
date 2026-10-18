<!-- this file will have the functions; 
 Displaying,
 Inserting,
 Getting the application_id to perform
 Updating and Deleting records in the database-->

<?php 
require_once 'ja_dbConfig.php';
function insertIntoApplicantRecord(
                    $pdo,$first_name,$last_name,$email,$phone_number,
                    $resume_url,$years_experience,$primary_skills,$education_level
                    ) {
    $insert = "INSERT INTO data_analyst_applications (
                first_name,last_name,email,phone_number,resume_url,
                years_experience,primary_skills,education_level
                )
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($insert);

    $executeInsert = $stmt->execute(
        [$first_name, $last_name, $email, $phone_number, 
         $resume_url, $years_experience, $primary_skills, 
         $education_level]
    );

    if ($executeInsert) {
        return true;
    }
} #this function inserts a record

function seeAllApplicants(PDO $pdo) {
    $display = "SELECT * FROM data_analyst_applications";
    $stmt = $pdo->prepare($display);
    $executeDisplay = $stmt->execute();
    if ($executeDisplay) {
        return $stmt->fetchAll();
    }
} #this function displays all records 

function getApplicantByID($pdo, $application_id) {
    $sql = "SELECT * FROM data_analyst_applications WHERE application_id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$application_id])) {
        return $stmt->fetch();
    }
} #this function is used to get a record by a certain ID

function updateApplicant(
            $pdo, $first_name, $last_name, $email, $phone_number, 
            $resume_url, $years_experience, $primary_skills, $education_level, $application_id) {
    $sql = "UPDATE data_analyst_applications
                SET first_name = ?,
                    last_name = ?,
                    email = ?,
                    phone_number = ?,
                    resume_url = ?,
                    years_experience = ?,
                    primary_skills = ?,
                    education_level = ?
                WHERE application_id = ?";
    $stmt = $pdo->prepare($sql);

    $executeEdit = $stmt->execute([$first_name, $last_name, $email, $phone_number, 
            $resume_url, $years_experience, $primary_skills, $education_level, $application_id]);
    
    if ($executeEdit) {
        return true;
    }
} #this function updates a record

function deleteApplicant($pdo, $application_id) {
    $sql = "DELETE FROM data_analyst_applications 
            WHERE application_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeDelete = $stmt->execute([$application_id]);
    if ($executeDelete) {
        return true;
    }
} #this function deletes a record
?>
