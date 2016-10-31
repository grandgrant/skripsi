<?php

		$usernamelogin = "";
        $passwordlogin = "";
        $kodeuserlogn = "";
        $timestamplogin = 0;

        $i = 0;


        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $usernamelogin = test_input($_POST["username"]);
            $passwordlogin = test_input($_POST["password"]);
            $kodeuserlogin = test_input($_POST["kodeuser"]);
            $timestamplogin = time();
        } 



		$usernamelogina = "Skripsi";
		$usernamedataa = "";
		$passworddataa = "";
		$kodeuserdatalogina = array();
		$cpuiddatalogina = "";




		$usernamedatabase = "root";
        $passworddatabase = "";
        $namedatabase = "user";
        $server = "localhost";
        $connectingdatabase = new mysqli($server,$usernamedatabase,$passworddatabase,$namedatabase);

        if($connectingdatabase->connect_error)
        {
            die("Koneksi database gagal ". $connectingdatabase->connect_error);
        }


		$querydatalogin = "SELECT * FROM datalogin LIMIT 10 "; 
        $resultdatalogin = $connectingdatabase->query($querydatalogin);

        if ($resultdatalogin->num_rows > 0) 
        {
            $i = 0;
            while($row = $resultdatalogin->fetch_assoc()) 
            {
            	$i++;
                $kodeuserdatalogina[$i]  = $row["kode_user"];
                $cpuiddatalogina = $row["cpuid"];
                $motherboardsndatalogin  = $row["motherboardsn"];
                $biossndatalogin = $row["biossn"];
                $timestampdatalogin = $row["timestamphardware"];
            }
        }
        echo $kodeuserdatalogina[4];

        for ($j = 1; $j <= 10; $j++)
        {
            if ($kodeuserlogin == $kodeuserdatalogin[$j] && (timestampdatalogin[$j] - timestamplogin <= 120))
            {   
                echo 
            }
        }




?>