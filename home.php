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
   <ul id="projectlist"></ul>
</div>

<script type="text/javascript" language="javascript">
    updateProjectList();
    
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
		$.ajax
		({
		   type: "GET",
		   url: "getprojects.php",
		   success: function(data)
		   {
				var $this = $("#projectlist").empty();
				for (x in data) {
					var b=$('<input/>').attr({
						type: "button",
						class: "deleteproject",
						onclick: "javascript: deleteProject('"+data[x].key+"');",
						value: 'X'
					});
					$(
						$("<li />").text(data[x].value).appendTo($this)
					).append(b); 
				};
		   }
		
		});
	}

	function deleteProject(projectID){
		$.ajax
		({
		   type: "POST",
		   url: "deleteproject.php",
		   data: "projectID="+projectID,
		   success: function(data)
		   {
				alert(data);
				updateProjectList();
		   }
		
		});
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