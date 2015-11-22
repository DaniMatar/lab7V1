<?php

require_once('/home/inet2005/PhpstormProjects/w0256244/lab7V1/Model/data/ActorModel.php');

class actorController
{
    public $model;

    public function __construct()
    {
        $this->model = new ActorModel();
    }

    public function displayAction()
    {
        $arrayOfActors = $this->model->getAllActors();

        include '../View/displayActors.php';
    }


    public function searchAction($actorID)
    {
        $arrayOfActors = $this->model->searchActors($actorID);

        include '../View/searchActors.php';
    }

    public function updateAction($actorID)
    {
        $currentActor = $this->model->getActor($actorID);

        include '../View/editActor.php';
    }

    public function deleteAction($actorID)
    {
        $currentActor = $this->model->getActor($actorID);

        include '../View/delete.php';
    }

    public function insertAction($actorID)
    {

        include '../View/insert.php';
    }

    public function commitUpdateAction($actorID,$fName,$lName)
    {
        $lastOperationResults = "";

        $currentActor = $this->model->getActor($actorID);

        $currentActor->setFirstName($fName);
        $currentActor->setLastName($lName);

        $lastOperationResults = $this->model->updateActor($currentActor);

        $arrayOfActors = $this->model->getAllActors();

        include '../View/displayActors.php';
    }
    public function commitDeleteAction($actorID)
    {
        $lastOperationResults = "";

        $currentActor = $this->model->getActor($actorID);


        $lastOperationResults = $this->model->deleteActor($currentActor);

        $arrayOfActors = $this->model->getAllActors();

        include '../View/displayActors.php';
    }

    public function commitInsertAction($fName,$lName)
    {
        $lastOperationResults = "";

        $lastOperationResults = $this->model->insertActor($fName,$lName);

        $arrayOfActors = $this->model->getAllActors();

        include '/home/inet2005/PhpstormProjects/w0256244/lab7V1/View/insert.php';
    }


}

?>
