<?php
        // start get input from method post
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $username = test_input($_POST["username"]);
            $password = test_input($_POST["password"]);
            $cpuid = test_input($_POST["CPUID"]);
            $motherboardsn = test_input($_POST["MotherboardSN"]);
            $biossn = test_input($_POST["BIOSSN"]);
            $macaddress = test_input($_POST["MacAddress"]);
        } 
        // finish
        // start connect database
        $usernamedatabase = "root";
        $passworddatabase = "";
        $namedatabase = "user";
        $server = "localhost";
        $connectingdatabase = new mysqli($server,$usernamedatabase,$passworddatabase,$namedatabase);

        if($connectingdatabase->connect_error)
        {
            die("Koneksi database gagal ". $connectingdatabase->connect_error);
        }
        // finish
        // start get data user from database
        $queryselectuserdata = "SELECT * FROM datauser"; 
        $getdatauserfromdatabase = $connectingdatabase->query($queryselectuserdata)

        if ($getdatauserfromdatabase->num_rows > 0) 
        {
            while($row = $result->fetch_assoc()) 
            {
                $usernamedata = $row["username"];
                $passworddata = $row["password"];
                $macaddressdata = $row["mac_address"];
                $cpuiddata = $row["cpuid"];
                $motherboardsndata  = $row["mbsn"];
                $biossndata = $row["biossn"];
            }
        }
        $connectingdatabase->close();
        // finish
        // start auhtentication
        if ($username == $usernamedata && $password == $passworddata && $macaddress == $macaddressdata && $cpuid == $cpuiddata && $motherboardsn == $motherboardsndata && $biossn == $biossndata) 
        {
            # code...
        }
        // finish

    
    

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

      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
?>