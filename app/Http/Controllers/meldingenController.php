<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
$capaciteit = $_POST['capaciteit'];
$type = $_POST['type'];
$melder = $_POST['melder'];

echo $attractie . " / " . $capaciteit . " / " . $melder . " / " . $type;

//1. Verbinding
require_once '../../../config/conn.php';

//2. Query
$query = "INSERT INTO meldingen (attractie, capaciteit, melder, type)
VALUES(:attractie, :capaciteit, :melder, :type)";

//3. Prepare
$statement = $conn->prepare($query);

//4. Execute
$statement->execute([
    ":attractie" => $attractie,
    ":capaciteit" => $capaciteit,
    ":melder" => $melder,
    ":type" => $type
]);

$items = $statement->fetchAll(PDO::FETCH_ASSOC);
   