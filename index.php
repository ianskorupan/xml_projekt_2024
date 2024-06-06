<?php

$forsale = simplexml_load_file('data/forsale.xml');
$users = json_decode(file_get_contents('data/users.json'), true);

?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <title>choo.ns</title>
</head>

<style>
    td {
        border: 1px solid #DDDDDD;
        padding: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        cursor: pointer;
    }

    table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        background-color: #202020;
        font-family: "Roboto Condensed Bold", "Calibri Bold", sans-serif;
        color: white;
    }

    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    table tr:nth-child(odd) {
        background-color: #ffffff;
    }

    table tr:hover {
        background-color: #ddd;
    }
</style>

<body>

    <div id="main">

        <div id="header" class="container-fluid">
            <a href=index.php title="choo.ns homepage">
                <h1 id="title" class="display-5">choo.ns</h1>
            </a>
        </div>

        <div id="content">
            <div id="releases">
                <table>
                    <tr>
                        <th></th>
                        <th>artist</th>
                        <th>release</th>
                        <th>medium</th>
                        <th>catalogue number</th>
                        <th>price</th>
                    </tr>

                    <?php
                        foreach ($forsale->item as $item) {
                            echo "<tr onclick=\"location.href='info.php?id=" . $item->attributes()->{'id'} . "'\">";
                            echo "<a href=opis.php?id=" . $item->attributes()->{'id'} . ">";
                            echo "<td><image src='" . $item->img . "' width=100/></td>";
                            echo "<td>" . $item->artist . "</td>";
                            echo "<td>" . $item->release . "</td>";
                            echo "<td>" . $item->medium . "</td>";
                            echo "<td>" . $item->catno . "</td>";
                            echo "<td>" . $item->price . "€</td>";
                            echo "</a>";
                            echo "</tr>";
                        }
                    ?>
                    <tr>
                    </tr>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
