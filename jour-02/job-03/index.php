<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert student</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            width: 300px;
        }
    </style>
</head>

<body>

    <?php

    function db_connect(): PDO
    {
        $db = new PDO(
            'mysql:host=localhost;dbname=lp_official;charset=utf8',
            'root',
            ''
        );

        return $db;
    }

    function insert_student(
        string $email,
        string $fullname,
        string $gender,
        DateTime $birthdate,
        int $gradeId
        )
    {
        $query = (
            "INSERT INTO student (grade_id, email, fullname, birthdate, gender)
            VALUES (:grade_id, :email, :fullname, :birthdate, :gender)"
        );
        $statement = db_connect()->prepare($query);
        $statement->execute([
            ':grade_id' => $gradeId,
            ':email' => $email,
            ':fullname' => $fullname,
            'birthdate' => $birthdate->format('Y-m-d'),
            'gender' => $gender
        ]);
    }

    function display_form(): void
    {
        echo '<form action="" method="POST">';
        echo '<label for"input-email" id="input-email">Email</label>';
        echo '<input type="email" name="input-email" id="input-email">';
        echo '<label for"input-fullname" id="input-fullname">Fullname</label>';
        echo '<input type="text" name="input-fullname" id="input-fullname">';
        echo '<label for="input-gender" name="input-gender" id="input-gender">Genre</label>';
        echo '<select name="input-gender">';
        echo '<option name="male" value="male">Male</option>';
        echo '<option name="female" value="female">Female</option>"';
        echo '</select>';
        echo '<label for"input-birthdate" id="input-birthdate">Birthdate</label>';
        echo '<input type="date" name="input-birthdate" id="input-birthdate">';
        echo '<label for"input-grade" id="input-grade">Grade</label>';
        echo '<input type="number" name="input-grade" id="input-grade">';
        echo '<input type="submit" value="insert">';
        echo '</form>';
    }

    display_form();

    if (isset($_POST)) {
        $email = $_POST['input-email'];
        $fullname = $_POST['input-fullname'];
        $gender = $_POST['input-gender'];
        $birthdate = new DateTime($_POST['input-birthdate']);
        $gradeId = $_POST['input-grade'];

        insert_student($email, $fullname, $gender, $birthdate, $gradeId);
    }

    ?>

</body>

</html>