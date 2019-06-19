<div class="container">
<ul class="list-unstyled list-inline " style="float:right">
    <li class="pull-right"><a href="index.php?page=signout" class="btn btn-primary btn-sm" title="you are about to sign out ">sign out</a></li>
    </ul>
    <div class="jumbotron">
   
        <div class="row">
            <h2>Welcome to the HMS: </h2>
        </div>
        <div class="row">
                <div class="col-md-9">
                <?php 
            // session_start();
            include "includes/connection.php";
            $username=$_SESSION["username"];
            $password=$_SESSION["password"];
            $sql_select="SELECT REG_ID,FNAME,MNAME,LNAME FROM REGISTER WHERE USER_NAME='".$username."' AND PASSWORD='".$password."'";
            $result = mysqli_query($connect, $sql_select);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                            // output data of each row
                            echo "<p>REGISTRATION NUMBER: " . $row["REG_ID"]."<br>". "  NAME: " . $row["FNAME"]. "  " ."  ".$row["MNAME"]." ". $row["LNAME"]. "<br></p>";
                            $reg_id=$row["REG_ID"];
                            $_SESSION["reg_id"]=$reg_id;
                        }
            }
            else {
                    echo "0 results";
                }
                ?>
                </div>
            <div class="col-md-3">
                <a href="index.php?page=results" title="see your diagnistic results"><span  class="input-group-text">tests results</span></a>
            </div>
        </div>
    </div>
</div>