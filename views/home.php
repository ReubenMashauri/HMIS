<div class="container">
<div class="row">
    <div class="col-md-8">
        <h2>TO SAVE LIFE IS OUR RESPONSIBILITIES</h2>
     <img src="assets/images/lab3.jpg"  width="700px" height="350px">
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header"><b>SIGN IN</b></div>
            <div class="card-body">
            <form action="models/signin_process.php" method="post" name="signin" role="form">
            <div class="form-group">
             <label for="username">User name</label>
             <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
             <label for="username">Password</label>
             <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
            <input type="submit" value="SIGN IN" class="btn btn-primary btn-block" name="signin">
            </div>
            </form>
            <?php
                if(isset($_SESSION["error"])){
                ?>
                <div class="alert-danger">
                <?php echo $_SESSION["error"]; ?>
                </div>
                <?php
                }
                $_SESSION["error"]=NULL;
                ?>
                <!-- <p>I don't have account <a href="index.php?page=signup">Sign up</a></p> -->
            <P>
            </P>
            </div>
        </div>
    </div>
</div>
</div>