<?php
require_once('../dbConnection.php');
?>

<?php
                        

                            if(isset($_POST['create1']))
                             {
   
                                //get INPUT data from the form 
                                $profile_profile = $_POST['input_profile1'];
                                $profile_email = $_POST['input_email1'];
                                $profile_password = $_POST['input_password1'];
                                $profile_description = $_POST['input_description1'];
                                $profile_fullname = '';
                                $profile_phone= '';
                                $profile_status = '';

                                

                                // INSERT INTO account (`profileID`, `fullName`, `email`, `accountPassword`, `phoneNumber`, `accountStatus`, `accountDescription`) VALUES ('profile_profile','', '$profile_email', '$profile_password','','', '$profile_description')


                                if($conn){
           


                                    $sqlCommand = "INSERT INTO account (profileID, fullName, email, accountPassword, phoneNumber, accountStatus, accountDescription) VALUES (?, ?, ?, ?, ?, ?, ?)";

                                     $stmt= $conn->prepare($sqlCommand);
                                    $stmt-> bind_param("sssssss", $profile_profile,$profile_fullname, $profile_email, $profile_password,$profile_phone, $profile_status, $profile_description);
                                                                
                                    $stmt->execute();

                                    // $sqlCommand = "INSERT INTO account (`profileID`, `fullName`, `email`, `accountPassword`, `phoneNumber`, `accountStatus`, `accountDescription`) VALUES (?, ?, ?, ?, ?, ?, ?)";
                                    // $stmt= $conn->prepare($sqlCommand);
                                    // $stmt-> bind_param("sssssss", $profile_profile,'', $profile_email, $profile_password,'','', $profile_description);
                            
                                    // $stmt->execute();
                            
                                }
                            }


                                if(isset($_POST['create2']))
                                {
                    
                                  //get INPUT data from the form 
                                  $profile_profile = 'Customer';
                                  $profile_fullname = $_POST['input_fullname2'];
                                  $profile_email = $_POST['input_email2'];
                                  $profile_password = $_POST['input_password2'];
                                  $profile_phone = $_POST['input_phone2'];
                                  $profile_description = $_POST['input_description2'];
                                  $profile_status = '';

                                  
                                  if($conn){
                  
                                    echo"22222xxxxxx";
                                    $sqlCommand = "INSERT INTO account (profileID, fullName, email, accountPassword, phoneNumber, accountStatus, accountDescription) VALUES (?, ?, ?, ?, ?, ?, ?)";
                                    $stmt= $conn->prepare($sqlCommand);
                                    $stmt-> bind_param("sssssss", $profile_profile,$profile_fullname, $profile_email, $profile_password,$profile_phone, $profile_status, $profile_description);
                                                                
                                    $stmt->execute();

                              
                                  }
                              }



                              header('Location:admin_homepage.php');
                            
            ?>