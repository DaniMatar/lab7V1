<?php

require_once '../Controller/ActorController.php';

$actorController = new ActorController();


if(isset($_GET['idUpdate']))
{
    $actorController->updateAction($_GET['idUpdate']);
}
elseif (isset($_POST['UpdateBtn']))
{
    $actorController->commitUpdateAction($_POST['editActorId'],$_POST['firstName'],$_POST['lastName']);
}
elseif(isset($_GET['idDelete']))
{
    $actorController->deleteAction($_GET['idDelete']);
}
elseif (isset($_POST['DeleteBtn']))
{
    $actorController->commitDeleteAction($_POST['deleteActorId']);
}
elseif(isset($_GET['idInsert']))
{
    $actorController->insertAction($_GET['idInsert']);
}
elseif (isset($_POST['InsertBtn']))
{
    $actorController->commitInsertAction($_POST['firstName'], $_POST['lastName']);
}
elseif (!empty($_POST['search']))
{
    $actorController->searchAction($_POST['search']);
}
else
{
    $actorController->displayAction();
}

?>

