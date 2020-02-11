<?php include('./shared/header.php');
include_once('./dao/employeeDAO.php');
include_once('./dao/abstractDAO.php');
?>
<?php 
    
            $customerDAO = new customerDAO();
            //Tracks errors with the form fields
            $hasError = false;
            //Array for our error messages
            $errorMessages = Array();

            //Ensure all three values are set.
            //They will only be set when the form is submitted.
            //We only want the code that adds an employee to 
            //the database to run if the form has been submitted.
           
            if( isset($_POST['customerName']) ||
                isset($_POST['phoneNumber']) ||
                isset($_POST['emailAddress']) ||    
                isset($_POST['referral'])){
            
                //We know they are set, so let's check for values
                //EmployeeID should be a number
                if($_POST['customerName'] == ""){
                    $errorMessages['nameError'] = "Please enter a name.";
                    $hasError = true;
                }

                if($_POST['phoneNumber'] == ""){
                    $errorMessages['phoneError'] = "Please enter a phoneNumber.";
                    $hasError = true;
                }

                if($_POST['emailAddress'] == ""){
                    $errorMessages['emailError'] = "Please enter an e-mail.";
                    $hasError = true;
                }
                 if($_POST['referral'] == ""){
                    $errorMessages['referralError'] = "Please select one option.";
                    $hasError = true;
                }

                if(!$hasError){
                    $customer = new Customer('',$_POST['customerName'], $_POST['phoneNumber'], password_hash($_POST['emailAddress'],PASSWORD_DEFAULT), $_POST['referral']);
                    $addSuccess = $customerDAO->addCustomer($customer);
                    //source for the upload file: classmate - Aurelio Cochoni
                    $target_dir = "files/";
                    if(isset($_FILES["myfile"])){
                    $target_file = $target_dir . basename($_FILES["myfile"]["name"]);
                    }
        
                    if(isset($_FILES["myfile"]["tmp_name"])){
                    if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file)) {
                        echo "<br>";
                        echo "The file ". basename( $_FILES["myfile"]["name"]). " has been uploaded.";
                    }}
                    echo '<h3>' . $addSuccess . '</h3>';
                }
             }
          
 ?>
            <div id="content" class="clearfix">
                <aside>
                        <h2>Mailing Address</h2>
                        <h3>1385 Woodroffe Ave<br>
                            Ottawa, ON K4C1A4</h3>
                        <h2>Phone Number</h2>
                        <h3>(613)727-4723</h3>
                        <h2>Fax Number</h2>
                        <h3>(613)555-1212</h3>
                        <h2>Email Address</h2>
                        <h3>info@wpeatery.com</h3>
                </aside>
                <div class="main">
                    <h1>Sign up for our newsletter</h1>
                    <p>Please fill out the following form to be kept up to date with news, specials, and promotions from the WP eatery!</p>
                    <form name="frmNewsletter" id="frmNewsletter" method="post" action="contact.php" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td>Name:</td>
                                <td><input type="text" name="customerName" id="customerName" size='40' ><?php 
                                //If there was an error with the employeeId field, display the message
                                if(isset($errorMessages['nameError'])){
                                        echo '<span style=\'color:red\'>' . $errorMessages['nameError'] . '</span>';
                                      }
                                ?></td>
                            </tr>
                            <tr>
                                <td>Phone Number:</td>
                                <td><input type="text" name="phoneNumber" id="phoneNumber" size='40' >
                                <?php 
                                //If there was an error with the employeeId field, display the message
                                if(isset($errorMessages['phoneError'])){
                                        echo '<span style=\'color:red\'>' . $errorMessages['phoneError'] . '</span>';
                                      }
                                ?></td>
                            </tr>
                            <tr>
                                <td>Email Address:</td>
                                <td><input type="text" name="emailAddress" id="emailAddress" size='40' > <?php 
                                //If there was an error with the employeeId field, display the message
                                if(isset($errorMessages['emailError'])){
                                        echo '<span style=\'color:red\'>' . $errorMessages['emailError'] . '</span>';
                                      }
                                ?></td>
                            </tr>
                            <tr>
                                <td>How did you hear<br> about us?</td>
                                <td>Newspaper<input type="radio" name="referral" id="referralNewspaper" value="newspaper" >
                                    Radio<input type="radio" name='referral' id='referralRadio' value='radio' >
                                    TV<input type='radio' name='referral' id='referralTV' value='TV' >
                                    Other<input type='radio' name='referral' id='referralOther' value='other' >
                                <td><span style="font-size: 9pt;"> <?php 
                                //If there was an error with the employeeId field, display the message
                                if(isset($errorMessages['referralError'])){
                                        echo '<span style=\'color:red\'>' . $errorMessages['referralError'] . '</span>';
                                      }
                                ?></span></td>
                            </tr>
                             <tr><td>Select your file to upload: <input type='file' name='myfile' value='Upload'></td></tr>
                            <tr>
                                <!--Some help on the reset button from: https://www.sitepoint.com/community/t/using-php-on-reset-button-to-clear-html-php-form/5104/4-->
                                
                                <td colspan='2'><input type='submit' name='btnSubmit' id='btnSubmit' value='Sign up!'>&nbsp;&nbsp;<input type='reset' name="btnReset" id="btnReset" value="Reset Form" onclick="document.theForm.reset();return false;"></td>
                                    
                                
                            </tr>
                           
                        </table>
      
                    </form>
                </div><!-- End Main -->
            </div><!-- End Content -->
 <?php include('./shared/footer.php');