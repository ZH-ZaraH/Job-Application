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
<!--This is the reference for the $_GET superglobal. In this case, this file handles the edit information. Which is done in a new site.-->
<title>Edit Applicant</title>
<body>
<!--All the <p> is where the text boxes are placed and where users input the info they need to change.-->
    <?php $getApplicantById = getApplicantByID($pdo, $_GET['application_id']); ?>
    <form action = "handleForms.php?application_id=<?php echo $_GET['application_id']; ?>" method="POST">
        <p>
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" value="<?php echo $getApplicantById['first_name']; ?>">
        </p>

        <p>
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" value="<?php echo $getApplicantById['last_name']; ?>">
        </p>

        <p>
            <label for="email">Email</label>
            <input type="text" name="email" value="<?php echo $getApplicantById['email']; ?>">
        </p>

        <p>
            <label for="phone_number">Phone Number</label>
            <input type="text" name="phone_number" value="<?php echo $getApplicantById['phone_number']; ?>">
        </p>

        <p>
            <label for="resume_url">Resume</label>
            <input type="text" name="resume_url" value="<?php echo $getApplicantById['resume_url']; ?>">
        </p>

        <p>
            <label for="years_experience">Years of Experience</label>
            <input type="text" name="years_experience" value="<?php echo $getApplicantById['years_experience']; ?>">
        </p>

        <p>
            <label for="primary_skills">Primary Skills</label>
            <input type="text" name="primary_skills" value="<?php echo $getApplicantById['primary_skills']; ?>">
        </p>

        <p>
            <label for="education_level">Education Level</label>
            <input type="text" name="education_level" value="<?php echo $getApplicantById['education_level']; ?>">
            <input type="submit" name="editApplicantBtn">
        </p>

</body>

</html>
