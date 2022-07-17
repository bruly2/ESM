<?php

class Auth{
	static function isLogged(){
		if(isset($_SESSION['Auth']) && isset($_SESSION['Auth']['login']) && isset($_SESSION['Auth']['pass'])){
				extract ($_SESSION['Auth']);
					$con = mysqli_connect("localhost","root","","esm_site");
					$sql = "SELECT id FROM users WHERE login='$login' AND pass='$pass'";
					$req = mysqli_query($con,$sql) or die (mysqli_error());
					if(mysqli_num_rows($req)>0){
						return true;
					}

					else{
						return false;
					}


		}
		else{
			return false;
		}
	}
}

?>