<?php require_once("./assets/core/init.php"); require_once("./include/navbar.php"); ?>
    
    <?php
        
        error_reporting(0);
        
        if(logged_in() === true) {
            header("location: ./index");
        }else{
            if(empty($_POST['signinbutton']) === false) {
                $username = $_POST['username'];
                $password = $_POST['password'];
    
                if(empty($username) === true || empty($password) === true) {
                    $errors[] = "Please enter a username and password!";
                }else if(user_exists($username) === false) {
                    $errors[] = "We cannot find the specified username.";
                }else if(user_active($username) === false) {
                    $errors[] = "Account not activated.";
                }else{
    
                    $login = login($username, $password);
    
                    if($login === false) {
                        $errors[] = "Username/Password combination is incorrect.";
                    }else{
                        $_SESSION['user_id'] = $login;
                        header("location: ./index");
                        exit();
                    }
                }
            }
        }
    
        if(isset($_GET['notsignedin'])) {
    		$notsi = '<div class="errors">You are not logged in!</div>';
    	}
    
    ?>
    
    <div class="container">
		<div class="row">
			<br />
			<div class="col s6 offset-s3">
				<div class="card">
                    <div class="card-title">Sign In</div>
					<div class="card-content">
						<?php 
						    echo $notsi;
						    if(empty($errors) === false) {
								echo output_error($errors);
							}
						?>
						<form action="" method="POST">
							<input id="username" name="username" type="text" class="input" required="required" placeholder="Username">
							<input id="password" name="password" type="password" class="input" required="required" placeholder="Password">
							<input type="submit" name="signinbutton" id="signinbutton" class="button-raised" value="Sign In" style="width: 100%; margin-top: 4px; margin-bottom: 4px;" />
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
    
<?php require_once("./include/footer.php"); ?>
