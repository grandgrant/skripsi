<?php

		$usernamelogina = "Skripsi";
		$usernamedataa = "";
		$passworddataa = "";




		$usernamedatabase = "root";
        $passworddatabase = "";
        $namedatabase = "user";
        $server = "localhost";
        $connectingdatabase = new mysqli($server,$usernamedatabase,$passworddatabase,$namedatabase);

        if($connectingdatabase->connect_error)
        {
            die("Koneksi database gagal ". $connectingdatabase->connect_error);
        }


		$queryselectuserdataa = "SELECT * FROM datauser WHERE Username = '$usernamelogina'"; 
        $getdatauserfromdatabasea = $connectingdatabase->query($queryselectuserdataa);

        if ($getdatauserfromdatabasea->num_rows > 0) 
        {
            while($row = $getdatauserfromdatabasea->fetch_assoc()) 
            {
                $usernamedataa = $row["Username"];
                $passworddataa = $row["Password"];
                $kodeusera = $row["kode_user"];
                $cpuiddataa = $row["CPUID"];
                $motherboardsndataa  = $row["MBSN"];
                $biossndataa = $row["BIOSSN"];
            }
        }

        echo $usernamedataa;
        echo $passworddataa;



?>