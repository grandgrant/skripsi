<?php 

	if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $newusername = test_input($_POST["newusername"]);
            $newpassword = test_input($_POST["newpassword"]);
            
        } 
    

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    $usernamedatabase = "root";
    $passworddatabase = "";
    $namedatabase = "user";
    $server = "localhost";
    $connectingdatabase = new mysqli($server,$usernamedatabase,$passworddatabase,$namedatabase);

    if($connectingdatabase->connect_error)
    {
        die("Koneksi database gagal ". $connectingdatabase->connect_error);
    }

    $sqlinsert = "INSERT INTO datauser (username,password,mac_address,cpuid,mbsn,biossn) VALUES ('$newusername','$newpassword','wdweas','adwwsasd','keiensaw','okoaskdoaksd')"
    $insertdata = $connectingdatabase->query($sqlinsert);

   	if ($insertdata == false) {
   		echo "Error : ". $connectingdatabase->connect_error();
   	}else echo "Berhasil daftar";
    
    


 ?>