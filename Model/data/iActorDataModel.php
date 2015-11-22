<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
interface iActorDataModel
{
    public function connectToDB();

    public function closeDB();

    public function selectActors();

    public function selectActorById($actorID);

    public function fetchActors();

    public function updateActor($actorID,$first_name,$last_name);

    public function deleteActor($actorID);

    public function insertActor($first_name,$last_name);

    public function searchActor($searchWord);

    // field access functions
    public function fetchActorID($row);

    public function fetchActorFirstName($row);

    public function fetchActorLastName($row);
}
?>
