<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>find student</title>
    <style>
        table,
        td,
        th {
            border: 1px solid black;
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

    function find_one_student(string $email) : array | bool
    {
        $query = "SELECT * FROM student WHERE email = :email";
        $statement = db_connect()->prepare($query);
        $statement->execute([':email' => $email]);
        $students = $statement->fetch(PDO::FETCH_ASSOC);

        return $students;
    }

    function display_form(): void
    {
        echo '<form action="" methode="GET">';
        echo '<label for"input-email-student" id="input-email-student"></label>';
        echo '<input type="email" name="input-email-student" id="input-email-student">';
        echo '<input type="submit" value="find">';
        echo '</form>';
    }

    function display_result(array $student)
    {
        echo '<table>';
        echo '<tr>';
        foreach ($student as $value) {
            echo '<td>' . $value . '</td>';
        }
        echo '</tr>';
        echo '</table>';
    }

    display_form();

    if (isset($_GET['input-email-student'])) {
        if ($student = find_one_student($_GET['input-email-student'])) {
            display_result($student);
        } else {
            echo 'User not found';
        }
    }

    ?>

</body>

</html>