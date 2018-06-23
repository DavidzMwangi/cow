<?php
require_once "_config.php";
$db=new DB_FACADE();
$username=$_POST['username'];
$password=$_POST['password'];
if (isset($_POST['submit'])){

        if (empty($username) || empty($password)){
            echo "Username and password are required to login";
        }else{
            //query for the record in the database
           $sql="SELECT * FROM users WHERE username='".$username."' AND password='".$password."'";


            $results=mysqli_query($db->connect(),$sql);
            $row=mysqli_num_rows($results);
            if ($row==1){
                while ($row = mysqli_fetch_array($results)) {

                    $_SESSION['email']=$username;
                    $_SESSION['user_type']=$row['user_type'];

                    if ($_SESSION['user_type']==0){

                        echo "<script>
                            window.location='../LoginAssignment/index.php'
                            
</script>";
                    }else{
                        echo "Manager";
                    }
                }
            }else{
                echo 'Record does not exist';
            }



        }
}

?>