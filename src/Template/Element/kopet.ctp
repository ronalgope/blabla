<?php
$projects = $this->requestAction('projects/homedata');
foreach($projects as $project){
  echo $project->name;
}
 ?>
