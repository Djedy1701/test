<!DOCTYPE html>
<html>
    <head>
        <title>Доступные тесты</title>
        <style>
            h1 {
                text-align: center;
                padding: auto;
            }
            table {
                width: 550px;
                margin: auto;
            }
            tr {
                line-height: 50px;
            }
            .name {
                font-size: 30px;
            }
            td {
                text-align: center;
                padding: auto;
            }
            a {
            outline: none;
            text-decoration: none;
            display: inline-block;
            width: 70%;
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
    <body>
        <h1>Доступные тесты</h1>
        <table>
            <?php foreach ($tests as $test): ?>
                <tr class="name"><td colspan="3"><?php echo $test['title']; ?></td></tr>
                <tr>
                    <td><a href="?action=start_session&test_id=<?php echo $test['name']; ?>" > К тесту </a></td>
                    <td><a href="?action=results" > Результаты теста</a></td>
                    <td><a href="?action=sessions" > Активные тесты</a></td>
            </tr>
                <?php endforeach; ?>
        </table>
    </body>
</html>

