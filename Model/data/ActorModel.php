<?php

require_once '/home/inet2005/PhpstormProjects/w0256244/lab7V1/Model/data/Actor.php';


require_once '/home/inet2005/PhpstormProjects/w0256244/lab7V1/Model/data/PDOMySQLActorDataModel.php';

class ActorModel
{
    private $m_DataAccess;

    public function __construct()
    {
        $this->m_DataAccess = new PDOMySQLActorDataModel();
    }

    public function __destruct()
    {
        // not doing anything at the moment
    }

    public function getAllActors()
    {
        $this->m_DataAccess->connectToDB();

        $arrayOfActorObjects = array();

        $this->m_DataAccess->selectActors();

        while($row =  $this->m_DataAccess->fetchActors())
        {
            $currentActor = new Actor($this->m_DataAccess->fetchActorID($row),
            $this->m_DataAccess->fetchActorFirstName($row),
            $this->m_DataAccess->fetchActorLastName($row));

            $arrayOfActorObjects[] = $currentActor;
        }

        $this->m_DataAccess->closeDB();

        return $arrayOfActorObjects;
    }

    public function searchActors($actorID)
    {
        $this->m_DataAccess->connectToDB();

        $arrayOfActorObjects = array();

        $this->m_DataAccess->searchActor($actorID);

        while($row =  $this->m_DataAccess->fetchActors())
        {
            $currentActor = new Actor($this->m_DataAccess->fetchActorID($row),
                $this->m_DataAccess->fetchActorFirstName($row),
                $this->m_DataAccess->fetchActorLastName($row));

            $arrayOfActorObjects[] = $currentActor;
        }

        $this->m_DataAccess->closeDB();

        return $arrayOfActorObjects;
    }


    public function getActor($actorID)
    {
        $this->m_DataAccess->connectToDB();

        $this->m_DataAccess->selectActorById($actorID);

        $record =  $this->m_DataAccess->fetchActors();

        $fetchedActor = new Actor($this->m_DataAccess->fetchActorID($record),
        $this->m_DataAccess->fetchActorFirstName($record),
        $this->m_DataAccess->fetchActorLastName($record));



        $this->m_DataAccess->closeDB();

        return $fetchedActor;
    }

    public function updateActor($ActorToUpdate)
    {
        $this->m_DataAccess->connectToDB();

        $recordsAffected = $this->m_DataAccess->updateActor($ActorToUpdate->getID(),
        $ActorToUpdate->getFirstName(),
        $ActorToUpdate->getLastName());

        return "$recordsAffected record(s) updated succesfully!";
    }

    public function deleteActor($ActorToDelete)
    {
        $this->m_DataAccess->connectToDB();

        $recordsAffected = $this->m_DataAccess->deleteActor($ActorToDelete->getID());

        return "$recordsAffected record(s) updated succesfully!";
    }

    public function insertActor($fName,$lName)
    {
        $this->m_DataAccess->connectToDB();

        $recordsAffected = $this->m_DataAccess->InsertActor($fName,$lName);

        return "$recordsAffected record(s) updated succesfully!";
    }
}

?>
