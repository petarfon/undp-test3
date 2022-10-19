<?php

include "podaci.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>HTML i PHP</title>
</head>

<body>
    <h1>Prodavnica elektronike</h1>
    <h3>Narudzbenica</h3>
    <table>
        <thead>
            <th>Naziv</th>
            <th>Jedinicna cena</th>
            <th>Kolicina</th>
            <th>PDV</th>
            <th>Rabat</th>
            <th>Ukupan iznos</th>
        </thead>
        <tbody>
            <?php
            foreach ($proizvodi as $pr) :
            ?>
                <tr>
                    <td><?php echo $pr["naziv"] ?></td>
                    <td><?php echo $pr["cena"] ?></td>
                    <td><?php echo $pr["kolicina"] ?></td>
                    <td><?php echo vratiPDV($pr["cena"]) ?></td>
                    <td><?php echo vratiRabat($pr["kolicina"]) ?></td>
                    <td><?php echo vratiUkupanIznos($pr["cena"], $pr["kolicina"]) ?></td>
                    <!-- 
                        za kolicinu ispod 40 rabat 2
                        za kolicinu iznad 40 ispod 50 rabat 3
                        za kolicinu iznad 50 rabat 5
                     -->
                </tr>
            <?php
            endforeach;
            ?>

            <!-- komentar Ctrl + K, C
                <tr>
                <td>Monitor</td>
                <td>350</td>
                <td>35</td>
            </tr>
            <tr>
                <td>Tastatura</td>
                <td>200</td>
                <td>47</td>
            </tr> -->
        </tbody>
        <tfoot>
            <td colspan="5">Ukupno:</td>
            <td><?php echo vratiUkupno() ?></td>
        </tfoot>
    </table>
</body>

</html>