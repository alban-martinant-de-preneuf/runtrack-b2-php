<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>find students</title>
    <style>
        table, td, th {
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

    function find_all_students(): array
    {
        $query = "SELECT * FROM student";
        $statement = db_connect()->prepare($query);
        $statement->execute();
        $students = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $students;
    }

    function display_students() : void {
        echo '<table>';
        foreach (find_all_students() as $student) {
            echo '<tr>';
                foreach ($student as $value) {
                    echo '<td>' . $value . '</td>';
                }
            echo '</tr>';
        }
        echo '</table>';
    }

    display_students();

    ?>

</body>

</html>