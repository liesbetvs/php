<?php
include_once "classes/Feature.class.php";

$f = new feature;
$project = $f->getProjects();

$i = 0;
foreach($project as $k){
    $data[$i]['key'] = $k['projectID'];
    $data[$i]['value']= htmlspecialchars(utf8_encode($k['projectName']));
    $i++;
}

header('Content-type: application/json');
echo json_encode($data, JSON_PRETTY_PRINT);

?>