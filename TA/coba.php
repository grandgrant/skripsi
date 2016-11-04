<?php
        $usernamelogin = "";
        $passwordlogin = "";
        $kodeuserlogn = "";
        $timestamplogin = 0;
        $usernamedatauser = "";
        $passworddatauser = "";
        $kodeuserdatauser = "";
        $cpuiddatauser = "";
        $motherboardsndatauser = "";
        $biossndatauser = "";

        //iteration variable
        $i = 0;

        // variable to save data from table data login
        $kodeuserdatalogin_array = array();
        $cpuiddatalogin_array = array();
        $motherboardsndatalogin_array = array();
        $biossndatalogin_array = array();
        $timestampdatalogin_array = array();


        //variable data login 
        $kodeuserdatalogin = "";
        $cpuiddatalogin = "";
        $motherboardsndatalogin = "";
        $biossndatalogin = "";
        $timestampdatalogin = "";

        // start get input from method post
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $usernamelogin = test_input($_POST["username"]);
            $passwordlogin = test_input($_POST["password"]);
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
        $querydatalogin = "SELECT * FROM datalogin WHERE kode_user = '$kodeuserdatauser' LIMIT 10 "; 
        $resultdatalogin = $connectingdatabase->query($querydatalogin);

        if ($resultdatalogin->num_rows > 0) 
        {   
            
            while($row = $resultdatalogin->fetch_assoc()) 
            {   
                $i++;
                $kodeuserdatalogin_array[$i]  = $row["kode_user"];
                $cpuiddatalogin_array[$i] = $row["cpuid"];
                $motherboardsndatalogin_array[$i]  = $row["motherboardsn"];
                $biossndatalogin_array[$i] = $row["biossn"];
                $timestampdatalogin_array[$i] = $row["timestamphardware"];
            }
        }// finish get data from userlogin

        $connectingdatabase->close();
        $differencetimestamp = $timestampdatalogin_array[1] - $timestamplogin;

        if ($differencetimestamp <= 120)
        {
            $kodeuserlogin = $kodeuserdatalogin_array[1];
            $cpuiddatalogin = $cpuiddatalogin_array[1];
            $motherboardsndatalogin = $motherboardsndatalogin_array[1];
            $biossndatalogin = $biossndatalogin_array[1];
            $timestampdatalogin = $timestampdatalogin_array[1];    
        }

    
        // start auhtentication
        if ($usernamelogin == $usernamedatauser && $passwordlogin && $cpuiddatauser == $cpuiddatalogin && $motherboardsndatauser == $motherboardsndatalogin && $biossndatauser == $biossndatalogin) 
        {
            
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