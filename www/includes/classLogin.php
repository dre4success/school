<?php 
	
	# To login the user
	class Login {

		private $result = [];

		private function selectFromAdmin($dbconn, $input) {

			$stmt = $dbconn->prepare("SELECT admin_id, hash FROM admin WHERE email=:em");
			$stmt->bindParam(':em', $input['email']);
			$stmt->execute();

			return $stmt;
		}

		public function doLogin($dbconn, $input) {

			$stmt = $this->selectFromAdmin($dbconn, $input);

			$row = $stmt->fetch(PDO::FETCH_BOTH);

			if( ($stmt->rowCount() != 1) || !password_verify($input['password'], $row['hash']) ) {
				header("Location:login.php?msg=Invalid Email or Password");
				exit();
			} else {
				$this->result = true;
				$this->result = $row;
			}

			return $this->result;
		}
	}