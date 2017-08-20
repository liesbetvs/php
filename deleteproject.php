<?php
include_once "classes/Feature.class.php";
$f = new feature;
$result = $f->delProject(htmlspecialchars($_POST['projectID']));
echo $result;
?>