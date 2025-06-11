<!DOCTYPE html>
<html>
    <head>
        <title>Active Sessions</title>
        <style>
            h1 {
                text-align: center;
                padding: auto;
            }
            table {
                width: 750px;
                margin: auto;
            }
            tr {
                line-height: 50px;
            }
            td {
                text-align: center;
                padding: auto;
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
    <?php if (!empty($sessions)):?>
        <body>
            <h1>Активные сессии</h1>
            <table>
                <thead>
                    <tr>
                        <th>Номер</th>
                        <th>Название теста</th>
                        <th>Процент выполнения</th>
                        <th>Респондент</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($sessions as $session): 
                        if ($session['respondent'] && $session['testingUrl'] ):?>
                            <tr>
                                <td><?php echo $i; $i++; ?></td>
                                <td><?php echo htmlspecialchars($session['testTitle']) ?></td>
                                <td><?php echo htmlspecialchars($session['percent']) ?></td>
                                <td><?php echo htmlspecialchars($session['respondent']) ?></td>
                            </tr>
                        <?php endif?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <u1>
                <a href="?action=tests" > Вернуться к списку </a>
            </u1>
        </body>
    <?php else: ?>
        <h1> Активные сессии не найдены! </h1>
    <?php endif ?>
</html>