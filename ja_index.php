<!--This is the main website where the applicants make changes in their record. Whether to insert, update, or delete records
they are performed in here.-->
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
    </style>
</head>
<body>
    <h3>Application for Data Analyst role! Input your details to apply</h3>
    <form action="/PROJECTS/Job_Application/handleForms.php" method="POST">
        <p><label for="first_name">First Name</label> <input type="text" name="first_name"></p>
        <p><label for="last_name">Last Name</label> <input type="text" name="last_name"></p>
        <p><label for="email">Email</label> <input type="text" name="email"></p>
        <p><label for="phone_number">Phone Number</label> <input type="text" name="phone_number"></p>
        <p><label for="resume_url">Resume</label> <input type="text" name="resume_url"></p>
        <p><label for="years_experience">Experience/s</label> <input type="text" name="years_experience"></p>
        <p><label for="primary_skills">Primary Skills </label> <input type="text" name="primary_skills"></p>
        <p><label for="education_level">Education level</label> <input type="text" name="education_level"></p>
            <input type="submit" name="insertNewApplicantBtn">
    </form>
<!--The form action is where the boxes of inputs are created. This is where applicants input their information-->
    
    <table border = 1>
        <tr>
            <th>Applicant_ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Resume</th>
            <th>Years of Experience</th>
            <th>Primary Skills</th>
            <th>Education Level</th
        </tr>
        <?php $seeAllApplicantRecord = seeAllApplicants($pdo); ?>
        <?php foreach ($seeAllApplicantRecord as $row) { ?>
        <tr>
            <td><?php echo $row['application_id']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone_number']; ?></td>
            <td><?php echo $row['resume_url']; ?></td>
            <td><?php echo $row['years_experience']; ?></td>
            <td><?php echo $row['primary_skills']; ?></td>
            <td><?php echo $row['education_level']; ?></td>
            <td>
                <a href="edit_applicant.php?application_id=<?php echo $row['application_id'];?>">Edit</a>
                <a href="delete_applicant.php?application_id=<?php echo $row['application_id'];?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
<!--This table is shown below the form. It will show the information of the applicants and ordered by the table header and table data
the last table data is a column for when you need changes on a certain applicant by getting their application_id -->

</body>
</html>
