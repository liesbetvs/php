<?php
include_once "inc/header.inc.php";
showheader('home');

if(!isset($_SESSION['todo_login'])){
	//er is nog niet ingelogd
    header("location: login.php");
}
?>

<div class="container">
<div class="login">
<div class="row">

<div class="col-md-4 left">
    <a href="logout.php" target="_self">Logout</a>
     <img src="" alt=""> 
     <h2><?php echo $_SESSION['todo_fullname']; ?></h2>
   <a href="javascript: addProject();" target="_self">Add Project</a>
</div>

<script type="text/javascript" language="javascript">
    function addProject() {
        var project = prompt("Please give the name of your new project", " ");
        if(project != null){
            $.ajax
            ({
                type: "POST",
                url: "addproject.php",
                data: "project="+project,
                success: function(data)
                {
                    alert(data);
                    updateProjectList();
                }
            });
        }
    }
    function updateProjectList(){
    }
    </script>

<div class="col-md-4">
<div id="date">&nbsp;</div>
<ul><li>
    <img src="" alt="">
    <h2>titel</h2>
    <p>student die taak toevoegt</p>
    <input type="checkbox">
</li></ul>    
</div>


<div class="col-md-4" id="right">
<a href="#" target="_self" id="addtask">Add Task</a>
<ul class="left"><li>
    <img src="" alt="">
    <h2>naam</h2>
</li></ul> 
</div>
</div>
</div>
</div>

</body>
</html>