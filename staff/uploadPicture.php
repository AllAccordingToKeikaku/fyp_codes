<?php
require_once("../dbConnection.php");
?>
<?php 

if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 125000000000000) {
			$em = "Sorry, your file is too large.";
		    header("Location: staff_homepage.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = $img_name;
				$img_upload_path = '../MoshiQ2 IMG Assets/Menu/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
                header("Location: staff_homepage.php?success");
			}else {
				$em = "You can't upload files of this type";
		        header("Location: staff_homepage.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: staff_homepage.php?error=$em");
	}

}else {
	header("Location: staff_homepage.php");
}
?>