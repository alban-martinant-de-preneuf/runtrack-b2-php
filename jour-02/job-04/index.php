<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>find all students grades</title>
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

    function find_all_students_grades() : array
    {
        $query = ("SELECT student.email AS email, student.fullname AS fullname, grade.name AS grade_name
        FROM student
        INNER JOIN grade ON student.grade_id = grade.id
        ");
        $statement = db_connect()->prepare($query);
        $statement->execute();
        $students_grades = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $students_grades;
    }

    ?>

    <table>
        <?php foreach (find_all_students_grades() as $student) : ?>
            <tr>
                <?php foreach ($student as $value) : ?>
                    <td><?= $value ?></td>
                <?php endforeach ?>
            </tr>
        <?php endforeach ?>
    </table>

</body>

</html>