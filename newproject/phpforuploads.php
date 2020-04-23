<?php 
if (isset($_POST['submit'])) {
	$newfilename=$_POST['submit'];
	if (empty($newfilename)) {
		$newfilename="scrapposts";
	}
	else {
		$newfilename=strtolower(str_replace(" ", "-", $newfilename));
	}
	$customermobile=$_POST['mobileno'];
	$scrapname=$_POST['scrapname'];
	$amountofscrap=$_POST['amountofscrap'];
	$price=$_POST['price'];
	$addressofcustomer=$_POST['addressofcustomer'];
	$pincode=$_POST['pincode'];
	$descriptionofscrap=$_POST['descriptionofscrap'];
	$file=$_FILES['scrapimage'];

	$fileName=$_FILES['file']['name'];
	$fileTmpName=$_FILES['file']['tmp_name'];
	$fileSize=$_FILES['file']['size'];
	$fileError=$_FILES['file']['error'];
	$fileType=$_FILES['file']['type'];

	$fileExt= explode('.', $fileName);
	$fileActualExt=strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg', 'png');

	if (in_array($allowed, $fileActualExt)) {
		if ($fileError===0) {
			if ($fileSize>10000) {
				$fileNameNew=uniqid('', true).".".$fileActualExt;
				$fileDestination = 'itemsuploadedforsell/'.$fileNameNew;
				include_once "establishconnection.php";
				if (empty($customermobile) || empty($scrapname) || empty($amountofscrap) || empty($price) || empty($addressofcustomer) || empty($pincode) || empty($descriptionofscrap)) {
					exit();
				}else{
					$sql = "SELECT * FROM selldatabase;";
					$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo "sql statment failed";
					}
					else{
						mysqli_stmt_execute($stmt);
						$result=mysqli_stmt_get_result($stmt);
						$rowcount = mysqli_num_rows($result);
						$setimageorder = $rowcount + 1;

						$sql = "INSERT INTO selldatabase (customermobileno, scrapname, amount, price, address, pincode, description, scrapimagename) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
						if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo "sql statment failed";
						}
						else{
							mysqli_stmt_bind_param($stmt, "dsddsdss", $customermobile, $scrapname, $amount, $price, $address, $pincode, $descriptionofscrap, $fileNameNew);
							mysqli_stmt_execute($stmt);
							move_uploaded_file($fileTmpName, $fileDestination);

							header("Location: ../afterlogin.php?upload=success");
						}
					}
				}
			}else{
				echo "the file is tooo big";
			}
		}else{
			echo "there was an error in uploading this file";
		} 
	}
	else
	{
		echo "you cannot enter file of this type";
	}
}