<?php
	session_start();
	foreach ($_POST as $key => $value){
		//echo "$key: $value<br>";
		if (empty($value)){
			echo "<script>history.back();</script>";
			exit();
		}
	}

	require_once "./connect.php";
	$sql = "UPDATE `pracownicy` SET
    `Imie` = '$_POST[inputImieEdit]',
    `Nazwisko` = '$_POST[inputNazwiskoEdit]',
    `Data_Urodzenia` = '$_POST[inputDataUrodzeniaEdit]',
    `Mail` = '$_POST[inputMailEdit]',
    `Telefon` = '$_POST[inputTelefonEdit]',
    `Adres` = '$_POST[inputAdresEdit]',
    `Szef_Id` = '$_POST[inputSzefEdit]',
    `Dzial_Id` = '$_POST[inputDzialEdit]'
    WHERE `users`.`id` = $_SESSION[userUpdateId];";
	$conn->query($sql);

	//echo $conn->affected_rows; //1-ok, 0-

if ($conn->affected_rows ==0){
	header("location: ../../9_db_table_delete_add_update.php?updateUser=0");
}else{
	header("location: ../../9_db_table_delete_add_update.php?updateUser=1");
}