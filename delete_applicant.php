<?php require_once 'ja_dbConfig.php'; ?>
<?php require_once 'models.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application</title>
    <style>
        body {
            font-family: "Arial";
            size: 10px;
        }
        input {
            font-size: 1.5em;
            height: 50px;
            width: 150px;
        }
        table, th, td {
            border:1px solid black;
        }
    </style>
</head>
<title>Edit Applicant</title>
<body>
<!--This is for the deletion of record. Similar to the edit_applicant.php but here you only click buttons-->
    <h1>Are you sure you would like to delete this applicant?</h1>
    <?php $getApplicantById = getApplicantByID($pdo, $_GET['application_id']); ?>
    <form action="handleForms.php?application_id=<?php echo $_GET['application_id']; ?>" method="POST">
<!--the div class is used to contain the information of the record you want to delete.-->
        <div class="applicantContainer" style="border-style: solid; font-family: 'Arial';">
            <p>First Name: <?php echo $getApplicantById['first_name']; ?></p>
            <p>Last Name: <?php echo $getApplicantById['last_name']; ?></p>
            <p>Email: <?php echo $getApplicantById['email']; ?></p>
            <p>Phone Number: <?php echo $getApplicantById['phone_number']; ?></p>
            <p>Resume: <?php echo $getApplicantById['resume_url']; ?></p>
            <p>Years of Experience: <?php echo $getApplicantById['years_experience']; ?></p>
            <p>Primary Skills: <?php echo $getApplicantById['primary_skills']; ?></p>
            <p>Education Level: <?php echo $getApplicantById['education_level']; ?></p>
            <input type="submit" name="deleteApplicantBtn" value="Delete">
        </div>
    </form>
</body>

</html>
