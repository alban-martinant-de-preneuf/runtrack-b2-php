<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>find full rooms</title>
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

    function find_full_rooms(): array
    {
        $query = ("SELECT room.name AS room_name, room.capacity, grade.name AS grade_name, student.grade_id
            FROM room
            INNER JOIN grade ON room.id = grade.room_id
            INNER JOIN student ON student.grade_id = grade.id
        ");
        $statement = db_connect()->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        $filling = [];

        foreach ($results as $element) {
            $roomName = $element['room_name'];

            if (!array_key_exists($roomName, $filling)) {
                $filling[$roomName] = 1;
            } else {
                $filling[$roomName]++;
            }
        }

        $rooms = [];

        foreach ($results as $result) {
            $roomName = $result['room_name'];

            $roomExists = false;
            foreach ($rooms as $room) {
                if ($room['name'] === $roomName) {
                    $roomExists = true;
                    break;
                }
            }

            if (!$roomExists) {
                $isFull = $result['capacity'] < $filling[$roomName];

                $rooms[] = [
                    'name' => $roomName,
                    'capacity' => $result['capacity'],
                    'is_full' => $isFull ? 'full' : 'not full'
                ];
            }

        }

        return $rooms;
    }

    find_full_rooms();

    ?>

    <table>
        <?php foreach (find_full_rooms() as $room) : ?>
            <tr>
                <?php foreach ($room as $value) : ?>
                    <td><?= $value ?></td>
                <?php endforeach ?>
            </tr>
        <?php endforeach ?>
    </table>

</body>

</html>