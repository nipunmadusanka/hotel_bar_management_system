
<?php
ob_start();

class User {
	protected $pdo;

	// construct $pdo
	function __construct($pdo) {
		$this->pdo = $pdo;
	}
    // public function login1(){
    //     $stmt = $this->pdo->prepare("SELECT * FROM admin where id='1' ");
    //     $stmt->execute();
    //     $user = $stmt->fetch(PDO::FETCH_OBJ);
    //     $_SESSION['userName'] = $user->name;
    //     $_SESSION['userId'] = $user->id;
    //     }
    // }
    public function login() {
		$stmt = $this->pdo->prepare("SELECT * FROM admin WHERE id = '1' ");
		$stmt->execute();
		$user = $stmt->fetch(PDO::FETCH_OBJ);
		$count = $stmt->rowCount();
		if ($count > 0) {
			$_SESSION['user_id'] = $user->id;
			$_SESSION['user_name'] = $user->name;
		} else {
			$_SESSION['login_error'] = "Invalid Username or Password";
		}
	}
}
    
?>
