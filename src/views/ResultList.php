<!DOCTYPE html>
<html>
    <head>
        <title>Test Results</title>
        <style>
                        h1 {
                text-align: center;
                padding: auto;
            }
            table {
                width: 750px;
                margin: auto;
                border: 1px solid #000;
            }
            tr {
                line-height: 50px;
            }
            td {
                text-align: center;
                padding: auto;
                border: 1px solid #000;
            }
            a {
            margin-top: 30px;
            outline: none;
            text-decoration: none;
            display: inline-block;
            width: 250px;
            text-align: center;
            line-height: 3;
            color: black;
            }


            a:link,
            a:visited,
            a:focus {
                background:rgb(231, 231, 231);
            }

            a:hover {
                background:rgb(184, 184, 184);
            }

            a:active {
                background:rgb(77, 77, 77);
                color: white;
            }
        </style>
    </head>
    <?php if (!empty($results)): ?>
        <body>
            <h1>Результаты теста</h1>
            <table>
                <thead>
                    <tr>
                        <th>Номер</th>
                        <th>Название теста</th>
                        <th>Респондент</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($results as $result): ?>
                        <tr>
                            <td><?php echo $i; $i++; ?></td>
                            <td><?php echo htmlspecialchars($result['testTitle']) ?></td>
                            <td><?php echo htmlspecialchars($result['respondent']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <u1>
                <a href="?action=tests" > Вернуться к списку </a>
            </u1>
        </body>
    <?php else: ?>
        <h1> Результаты не найдены! </h1>
    <?php endif ?>
</html>