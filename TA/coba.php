<?php
        $username = "";
        $password = "";
        $timestamplogin = 0;
        $usernamedatauser = "";
        $passworddatauser = "";
        $kodeuserdatauser = "";
        $cpuiddatauser = "";
        $motherboardsndatauser = "";
        $biossndatauser = "";

        $kodeuserdatalogin = "";
        $cpuiddatalogin = "";
        $motherboardsndatalogin = "";
        $biossndatalogin = "";
        $timestampdatalogin = 0;


        // start get input from method post
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $usernamelogin = test_input($_POST["username"]);
            $passwordlogin = test_input($_POST["password"]);
            $kodeuserlogin = test_input($_POST["kodeuser"]);
            $timestamplogin = time();
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
        // start get data user from table datauser
        $querydatauser = "SELECT * FROM datauser WHERE Username = '$usernamelogin'"; 
        $resultdatauser = $connectingdatabase->query($querydatauser);

        if ($resultdatauser->num_rows > 0) 
        {
            while($row = $resultdatauser->fetch_assoc()) 
            {
                $usernamedatauser = $row["username"];
                $passworddatauser = $row["password"];
                $kodeuserdatauser  = $row["kode_user"];
                $cpuiddatauser = $row["cpuid"];
                $motherboardsndatauser  = $row["mbsn"];
                $biossndatauser = $row["biossn"];
            }
        }
        // finish get data from datauser

        // start get data from userlogin
        $querydatalogin = "SELECT * FROM datalogin WHERE kode_user = '$kodeuserlogin' LIMIT 10 "; 
        $resultdatalogin = $connectingdatabase->query($querydatalogin);

        if ($resultdatalogin->num_rows > 0) 
        {
            while($row = $resultdatalogin->fetch_assoc()) 
            {
                $kodeuserdatalogin  = $row["kode_user"];
                $cpuiddatalogin = $row["cpuid"];
                $motherboardsndatalogin  = $row["motherboardsn"];
                $biossndatalogin = $row["biossn"];
                $timestampdatalogin = $row["timestamphardware"];
            }
        }

        $differencetimestamp = timestamplogin - timestampdatalogin;

        // problem variable naro data kalo banyak dari limit dan dipilih jika timestampnya 2 menit.

        $connectingdatabase->close();
        
        // start auhtentication
        if ($usernamelogin == $usernamedatauser && $passwordlogin == $passworddatauser && $cpuiddatauser == $cpuiddata && $motherboardsn == $motherboardsndata && $biossn == $biossndata) 
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
    }
?>