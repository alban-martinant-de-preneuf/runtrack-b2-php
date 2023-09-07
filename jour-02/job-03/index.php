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
    ) {
        $query = ("INSERT INTO student (grade_id, email, fullname, birthdate, gender)
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

    if (isset($_POST)) {
        $email = $_POST['input-email'];
        $fullname = $_POST['input-fullname'];
        $gender = $_POST['input-gender'];
        $birthdate = new DateTime($_POST['input-birthdate']);
        $gradeId = $_POST['input-grade'];

        insert_student($email, $fullname, $gender, $birthdate, $gradeId);
    }

    ?>

    <form action="" method="POST">
        <label for="input-email" id="input-email">Email</label>
        <input type="email" name="input-email" id="input-email">

        <label for="input-fullname" id="input-fullname">Fullname</label>
        <input type="text" name="input-fullname" id="input-fullname">

        <label for="input-gender" name="input-gender" id="input-gender">Genre</label>
        <select name="input-gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>

        <label for="input-birthdate" id="input-birthdate">Birthdate</label>
        <input type="date" name="input-birthdate" id="input-birthdate">

        <label for="input-grade" id="input-grade">Grade</label>
        <input type="number" name="input-grade" id="input-grade">

        <input type="submit" value="insert">
    </form>


</body>

</html>