<?php
    include_once "classes/Feature.class.php";

$f = new feature;
$result = $f->addProject(htmlspecialchars($_POST['project']));
echo $result;
?>