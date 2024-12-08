<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lab 5a Question3</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            text-align: center;
            margin: 20px;
        }
        input[type="number"] {
            padding: 5px;
            width: 100px;
        }
        input[type="submit"] {
            padding: 5px 10px;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <form method="POST" action="">
        <label for="multiplier">Enter a multiplier:</label>
        <input type="number" id="multiplier" name="multiplier" required>
        <input type="submit" value="Generate Table">
    </form>

    <?php
    // Function to generate the multiplication table
    function multiplication($multiplier) {
        $results = [];
        for ($i = 1; $i <= 12; $i++) {
            $results[] = [
                'no' => $i,
                'multiplier' => $multiplier,
                'answer' => $i * $multiplier
            ];
        }
        return $results;
    }

    // Check if a multiplier was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['multiplier'])) {
        $multiplier = intval($_POST['multiplier']);
        $table = multiplication($multiplier);

        echo "<table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Multiplier</th>
                        <th>Answer</th>
                    </tr>
                </thead>
                <tbody>";

        foreach ($table as $row) {
            echo "<tr>
                    <td>{$row['no']}</td>
                    <td>{$row['multiplier']}</td>
                    <td>{$row['answer']}</td>
                  </tr>";
        }

        echo "</tbody>
            </table>";
    }
    ?>
</body>
</html>
