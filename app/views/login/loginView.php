
    <div class="container">
	    <section id="auth-content" class="auth-container container-fluid ">
		    <div class="auth-logo">
               <h2 class="header-border">  Log in </h2>
            </div>
			<div class="login-content">
			    <p>Use an existing account you have on Theseus and the Minotaur Gaming Community.</p>
                <!-- www.test.com/controllerName/actionName/queryString -->
				<form action = "login.php?login" method="POST">
				    <ol>
                        <div>
				    	    <label for="username" class=" required">Username <span>*</span></label>
				    	    <input type="text" id="username" name="user_name" required="required">
				    	</div>
				    	<div>
				    	    <label for="password" class=" required">Password <span>*</span></label>
				    		<input type="password" id="password" name="user_pwd" required="required">

				    	</div>
                       <span class="help-block"><a href="#">Resend Email Verification</a></span>
                       <br>
                       <span class="help-block"><a href="#">Forgot password?</a></span>
                       <li class="text-right btn-margin">
				            <input id="btn_login" type="submit" value="Log in" class="btn">
                            <input type="submit" value="Register" class="btn">
                       </li>
                    </ol>
                    <?php echo $warning?>
				</form>

			<div>
		</section>
	</div>