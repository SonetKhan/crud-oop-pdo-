<?php
 include 'DB.php';
	class student{
		private $table = 'tbl_student';
		private $name;
		private $Dep;
		private $Age;
		
		public function readAll()
		{
			$sql = "SELECT * FROM $this->table";
			
			$stmt =DB::prepare($sql);   //...Here DB is class and we access DB class Method (prepare) using 'Scope' 
			
			$stmt ->execute();
			
			return $stmt ->fetchAll();
		}
		public function setName($name)
		{
			$this->name = $name;
			
		}
		public function setDep($Dep)
		{
			$this->Dep = $Dep;
			
			
		}
		public function setAge($Age)
		{
			$this->Age = $Age;
			
			
		}
		
		public function Insert()
		{
			$sql = "INSERT INTO $this->table(`Name`,`Department`,`Age`) VALUES(:Name,:Department,:Age)";
			
			$stmt = DB::prepare($sql);
			
			$stmt ->bindParam(':Name',$this->name);
			
			$stmt ->bindParam(':Department',$this->Dep);
			
			$stmt ->bindParam(':Age',$this->Age);
			
			return $stmt ->execute();
			
			
			
		}
		public function readDataBYId($id)
		{
			$sql = "SELECT * FROM $this->table WHERE Id = :id";
			
			$stmt =DB::prepare($sql);
			
			$stmt ->bindParam(':id',$id);
			$stmt ->execute();
			return $stmt ->fetch();
			
		}
		
		public function UpdateData($id)
		{
			$sql = "UPDATE $this->table
			
			 SET 
			 
			`Name` = :Name,
			
			`Department` =:Department,
			
			`Age`=:Age 
			
			 WHERE Id = :id ";
			 
			 $stmt = DB::prepare($sql);
			 
			 $stmt ->bindParam(':Name',$this->name);
			 
			 $stmt ->bindParam(':Department',$this->Dep);
			 
			 $stmt ->bindParam(':Age',$this->Age);
			 
			 $stmt ->bindParam(':id',$id);
			 
			return $stmt ->execute();
		}
		public function DeleteData($id)
		{
			$sql = "DELETE  FROM $this->table WHERE `Id`=:Id";
			
			$stmt = DB::prepare($sql);
			
			 $stmt ->bindParam(':Id',$id);
			 
			 return $stmt ->execute();
			
			
		}
		
		
		
		
	}

?>