<?php
	
	# to insert into the admin table
	class Register {


		public function doesEmailExist($dbconn, $email) {

			$result = false;

			$stmt = $dbconn->prepare("SELECT email FROM admin WHERE email=:em");
			$stmt->bindParam(':em', $email);
			$stmt->execute();

			$count = $stmt->rowCount();
			if($count > 0) {
				$result = true;
			}

			return $result;

		}


		public function doAdminRegister($dbconn, $input) {

			$stmt = $dbconn->prepare("INSERT INTO admin(firstname, lastname, email, hash) 
									VALUES(:fn, :ln, :em, :hs)");

			$data = [
						':fn' => $input['fname'],
						':ln' => $input['lname'],
						':em' => $input['email'],
						':hs' => $input['password']
					];

			$stmt->execute($data);
		}
	}