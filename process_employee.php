<?php
require_once('./dao/employeeDAO.php');
if(isset($_GET['action'])){
    if($_GET['action'] == "edit"){
        if(isset($_POST['customerId']) && 
                isset($_POST['customerName']) && 
                isset($_POST['phoneNumber']) &&
                isset($_POST['emailAddress']) &&
                isset($_POST['referrer'])){
        
                if($_POST['customerName'] != "" &&
                $_POST['phoneNumber'] != "" &&
                $_POST['emailAddress'] != "" &&
                $_POST['referrer'] != ""){    
               
                $customerDAO = new customerDAO();
                $result = $customerDAO->editCustomer($_POST['customerId'], $_POST['customerName'], 
                        $_POST['phoneNumber'], $_POST['emailAddress'], $_POST['referrer']);
                

                if($result > 0){
                    header('Location:edit_employee.php?recordsUpdated='.$result.'&customerId=' . $_POST['customerId']);
                } else {
                    header('Location:edit_employee.php?customerId=' . $_POST['customerId']);
                }
            } else {
                header('Location:edit_employee.php?missingFields=true&customerId=' . $_POST['customerId']);
            }
        } else {
            header('Location:edit_employee.php?error=true&customerId=' . $_POST['customerId']);
        }
    }
    
    if($_GET['action'] == "delete"){
        if(isset($_GET['customerId'])){
            $customerDAO = new customerDAO();
            $success = $customerDAO->deleteCustomer($_GET['customerId']);
            echo $success;
            if($success){
                header('Location:mailing_list.php?deleted=true');
            } else {
                header('Location:mailing_list.php?deleted=false');
            }
        }
    }
}
?>
