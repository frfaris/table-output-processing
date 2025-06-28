<?php
function get_csv_value($data, $row_index, $col_index)
{
    return isset($data[$row_index][$col_index]) ? intval($data[$row_index][$col_index]) : 0;
}

$csv_file = 'Table_Input.csv';
if (!file_exists($csv_file)) {
    die("Error: Table_Input.csv not found.");
}

$data = array_map('str_getcsv', file($csv_file));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Table Output & Processing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light py-4">
    <div class="container">

        <h2 class="mb-4">Table 1</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Index #</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $i => $row): ?>
                    <?php if ($i == 0) continue; // skip header 
                    ?>
                    <tr>
                        <?php foreach ($row as $cell): ?>
                            <td><?= htmlspecialchars($cell) ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php
        $A5 = get_csv_value($data, 5, 1);
        $A20 = get_csv_value($data, 20, 1);
        $A15 = get_csv_value($data, 15, 1);
        $A7 = get_csv_value($data, 7, 1);
        $A13 = get_csv_value($data, 13, 1);
        $A12 = get_csv_value($data, 12, 1);

        $Alpha = $A5 + $A20;
        $Beta = ($A7 != 0) ? ($A15 / $A7) : 'Division by zero';
        $Charlie = $A13 * $A12;
        ?>

        <h2 class="mt-5 mb-4">Table 2</h2>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Category</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Alpha</td>
                    <td><?= $Alpha ?></td>
                </tr>
                <tr>
                    <td>Beta</td>
                    <td><?= $Beta ?></td>
                </tr>
                <tr>
                    <td>Charlie</td>
                    <td><?= $Charlie ?></td>
                </tr>
            </tbody>
        </table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>