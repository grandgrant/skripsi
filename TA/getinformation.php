<?php 

	$kodeuser = "";
	$cpuidclient = "";
	$motherboardsnclient = "";
	$biossnclient = "";
	$timestampclient = 0;
	if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $kodeuser = test_input($_POST["kodeuser"]);
            $cpuidclient = test_input($_POST["cpuid"]);
            $motherboardsnclient = test_input($_POST["motherboardsn"]);
            $biossnclient = test_input($_POST["biossn"]);
            $timestampclient = time();
        }
 

    	/*$usernamedatabase = "aprihadi_skripsi";
        $passworddatabase = "Skripsi123%";
        $namedatabase = "aprihadi_user";
        $server = "114.57.247.161";*/

        $usernamedatabase = "root";
        $passworddatabase = "";
        $namedatabase = "user";
        $server ="localhost";

        $connectingdatabase = new mysqli($server,$usernamedatabase,$passworddatabase,$namedatabase);

        if($connectingdatabase->connect_error)
        {
            die("Koneksi database gagal ". $connectingdatabase->connect_error);
        }

        $queryInsertData = "INSERT INTO datalogin (kode_user,cpuid,motherboardsn,biossn,timestamphardware) VALUES ('$kodeuser','$cpuidclient','$motherboardsnclient','$biossnclient','$timestampclient')";

        if ($connectingdatabase->query($queryInsertData) === TRUE) 
        {
		    echo "New record created successfully";
		} else 
		{
		    echo "Error: " . $queryInsertData . "<br>" . $connectingdatabase->error;
		}



function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
	
?>

