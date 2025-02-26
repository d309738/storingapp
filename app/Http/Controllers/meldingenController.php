<?php

//Variabelen vullen
$action = $_POST['action'];
if ($action == "create")
{

    $attractie = $_POST['attractie'];
    if(empty($attractie))
    {
        $errors[] = "Vul de attractie-naam in.";
    }
    $type = $_POST['type'];
    if(empty($type))
    {
        $errors[] = "Kies een type.";
    }
    $capaciteit = $_POST['capaciteit'];
    if(!is_numeric($capaciteit))
    {
        $errors[] = "Vul voor capaciteit een geldig getal in.";
    }
    if(isset($_POST['prioriteit']))
    {
        $prioriteit = 1;
    }
    else
    {
        $prioriteit = 0;
    }
    $melder = $_POST['melder'];
    if(empty($melder))
    {
        $errors[] = "Vul je naam in.";
    }
    $overig = $_POST['overig'];
    if(isset($errors))
    {
        var_dump($errors);
        die();
    }

    //1. Verbinding
    require_once '../../../config/conn.php';

    //2. Query
    $query = "INSERT INTO meldingen (attractie, type, capaciteit, prioriteit, melder, overige_info)
    VALUES (:attractie, :type, :capaciteit, :prioriteit, :melder, :overige_info)";

    //3. Prepare
    $statement = $conn->prepare($query);

    //4. Execute
    $statement->execute([
        ":attractie" => $attractie,
        ":type" => $type,
        ":capaciteit" => $capaciteit, 
        ":prioriteit" => $prioriteit, 
        ":melder" => $melder,
        ":overige_info" => $overig,
    ]);


    header("Location:../../../resources/views/meldingen/index.php?msg=Meldingopgeslagen");
}
if ($action == "uodate")
{
    $id = $_POST['id'];
    $capaciteit = $_POST['capaciteit'];
    if(isset($_POST['prioriteit']))
    {
        $prioriteit = 1;
    }
    else
    {
        $prioriteit = 0;
    }
    $melder = $_POST['melder'];
    if(empty($melder))
    {
        $errors[] = "Vul je naam in.";
    }
    $overig = $_POST['overig'];

    require_once '../../../config/conn.php';
    $query = "UPDATE meldingen SET capaciteit, prioriteit, melder, overige_info = :capaciteit, :prioriteit, :melder, :overige_info WHERE id = :id";
    $statement = $conn->prepare($query);
    $statement->execute([
        ":capaciteit" => $capaciteit, 
        ":prioriteit" => $prioriteit, 
        ":melder" => $melder,
        ":overige_info" => $overig,
        ":id" => $id
    ]);
    
    header("Location:../../../resources/views/meldingen/index.php?msg=Meldingbewerkt");
}
if ($action == "delete")
{
    
}
   