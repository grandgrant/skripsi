<?php
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $username = test_input($_POST["username"]);
            $password = test_input($_POST["password"]);
            connectdatabase();
        } 
    

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function connectdatabase()
    {
        $usernsamedatabase = "root";
        $passworddatabase = "";
        $namedatabase = "user";
        $server = "localhost";
        $connectingdatabase = new mysqli($server,$usernsamedatabase,$passworddatabase);

        if($connectingdatabase->connect_error)
        {
            die("Koneksi database gagal ". $connectingdatabase->connect_error);
        }
        echo "Connected successfully";
    }


    


    //$connectingdatabase->close();
    
    function getdeviceinformation()
    {
        $cpuid = $_POST["CPUID"];
        $motherboardsn = $_POST["MotherboardSN"];
        $biossn = $_POST["BIOSSN"];
        $macaddress = $_POST["MacAddress"];
     }

     function getuserIpAddress()
     {
         if (!empty($_SERVER["HTTP_CLIENT_IP"]))
        {
        //check for ip from share internet
        $ip = $_SERVER["HTTP_CLIENT_IP"];
        }
        elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
        {
        // Check for the Proxy User
        $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        }
        else
        {
        $ip = $_SERVER["REMOTE_ADDR"];
        }

        // This will print user's real IP Address
        // does't matter if user using proxy or not.
        echo $ip;
     }

     function authentication()
     {

     }
?>