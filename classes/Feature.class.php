<?php
include_once "classes/Db.class.php";

class feature
{
    public function addProject($project) {
        $pdo = Db::getInstance();
        $stmt = $pdo->prepare("INSERT INTO project (projectName) VALUES (:project)");
        $stmt = bindValue(":project", $project);
        $result = $stmt->execute();
        if($result){
            return "Project added";
        }
        else{
            return "There was an error while adding the new project";
        }
    }


public function getProjects() {
    $pdo = Db::getInstance();
    $stmt = $pdo->prepare("SELECT projectID, projectName FROM project");
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}
}
?>