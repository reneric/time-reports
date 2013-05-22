  <?php
	mysql_connect('localhost','code','rensimmo4');    
    mysql_select_db('code_time');  
        $id = mysql_real_escape_string($_POST['id']);   
        $name = mysql_real_escape_string($_POST['name']); 
        $project = mysql_real_escape_string($_POST['project']);    
        $description = mysql_real_escape_string($_POST['description']); 
        $start = mysql_real_escape_string($_POST['start']); 
        $end = mysql_real_escape_string($_POST['end']); 
        $hours = mysql_real_escape_string($_POST['hours']); 
        $theDate = mysql_real_escape_string($_POST['date']); 
 
        // Check if already exists
		//$check = mysql_query("SELECT * FROM timesheets WHERE id='$id'"); 
		if($id) {	
			$insertData = mysql_query("UPDATE timesheets SET name='$name',project='$project',description='$description',start='$start',end='$end',theDate='$theDate', hours='$hours' WHERE id='$id'");
			$data = array(
					'name' => $name,
					'project' => $project,
					'description' => $description,
					'start' => $start,
					'end' => $end,
					'hours' => $hours,
					'date' => $date,
					'id' => $id
				);
		}else{
			$insertData = mysql_query("INSERT INTO timesheets (name, project, description, start, end, theDate, hours) VALUES ('$name', '$project', '$description', '$start', '$end', '$theDate', '$hours')");
        	$lastId = mysql_insert_id();
        	$data = array(
					'message' => "Added.",
					'name' => $name,
					'project' => $project,
					'description' => $description,
					'start' => $start,
					'end' => $end,
					'hours' => $hours,
					'date' => $date,
					'id' => $lastId
				);
        }
			
        
	echo json_encode($data);
	exit;
