<?php
class Task {	
   
	private $todoTable = 'todo';
	private $conn;
	
	public function __construct($db){
        $this->conn = $db;
    }	
	
	public function getTodo($type){		
		$sqlQuery = "
			SELECT *
			FROM ".$this->todoTable." 
			WHERE status = '$type' ORDER BY id DESC";
		
		$stmt = $this->conn->prepare($sqlQuery);
		$stmt->execute();
		$result = $stmt->get_result();			
		return $result;	
	}
	
	public function insert(){
		
		if($this->task) {

			$stmt = $this->conn->prepare("
				INSERT INTO ".$this->todoTable."(`task`)
				VALUES(?)");
						
			$stmt->bind_param("s", $this->task);
			
			if($stmt->execute()){	
				$lastTodo = $stmt->insert_id;
				$sqlQuery = "
					SELECT id, task, status, DATE_FORMAT(created,'%d %M %Y %H:%i:%s') AS todo_date
					FROM ".$this->todoTable." WHERE id = '$lastTodo'";
				$stmt2 = $this->conn->prepare($sqlQuery);				
				$stmt2->execute();
				$result = $stmt2->get_result();
				$record = $result->fetch_assoc();
				echo json_encode($record);
			}		
		}
	}	
	
	public function update(){
		
		if($this->id) {			
			$stmt = $this->conn->prepare("
				UPDATE ".$this->todoTable." 
				SET status = '".$this->val."'
				WHERE id IN (".$this->id.")");		
			
			if($stmt->execute()){
				return true;
			}
			
		}	
	}
}
?>