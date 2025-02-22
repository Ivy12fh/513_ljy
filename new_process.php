<?php

// Helper function
function redirect_to($location)
{
  header("Location: " . $location);
  exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $task = [];
  $task['id'] = $_POST['id'] ?? '';
  $task['username'] = $_POST['username'] ?? '10';
  $task['password'] = $_POST['password'] ?? '';
  $task['Firstname'] = $_POST['Firstname'] ?? '';
  $task['Lastname'] = $_POST['Lastname'] ?? '';
  $task['phone'] = $_POST['phone'] ?? '';
  $task['address'] = $_POST['address'] ?? '';
  $task['city'] = $_POST['city'] ?? '';
  $task['email'] = $_POST['email'] ?? '';
  $task['create_date'] = date('Y-m-d H:i:s');;

  // 1. Create a database connection
  $db = mysqli_connect("127.0.0.1", "root", "", "ivy", 3306);
  // Test if connection succeeded (recommended)
  
  // Include config file
  require_once "config.php";
   
  // Define variables and initialize with empty values
  $Id=$username = $password  = $Firstname  = $Lastname =$phone=$address=$city =$email = "";
  $Id_err =$username_err = $password_err = $Firstname_err = $Lastname_err = $phone_err = $address_err= $city_err= $email_err ="";
   
  // Processing form data when form is submitted
  if($_SERVER["REQUEST_METHOD"] == "POST"){
   
      // Validate username
      if(empty(trim($_POST["username"]))){
          $username_err = "Please enter a username.";
      } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
          $username_err = "Username can only contain letters, numbers, and underscores.";
      } else{
          // Prepare a select statement
          $sql = "SELECT id FROM customers WHERE username = ?";
          
          if($stmt = mysqli_prepare($link, $sql)){
              // Bind variables to the prepared statement as parameters
              mysqli_stmt_bind_param($stmt, "s", $param_username);
              
              // Set parameters
              $param_username = trim($_POST["username"]);
              
              // Attempt to execute the prepared statement
              if(mysqli_stmt_execute($stmt)){
                  /* store result */
                  mysqli_stmt_store_result($stmt);
                  
                  if(mysqli_stmt_num_rows($stmt) == 1){
                      $username_err = "This username is already taken.";
                  } else{
                      $username = trim($_POST["username"]);
                  }
              } else{
                  echo "Oops! Something went wrong. Please try again later.";
              }
  
              // Close statement
              mysqli_stmt_close($stmt);
          }
      }
        // Validate password
        if(empty(trim($_POST["id"]))){
          $Id_err = "Please enter a Id.";     
      
      } else{
          $id = trim($_POST["id"]);
      }
      if(empty(trim($_POST["username"]))){
        $phone_err = "Please enter username.";     
    
    } else{
        $phone = trim($_POST["username"]);
    }
      // Validate password
      if(empty(trim($_POST["password"]))){
          $password_err = "Please enter a password.";     
      } elseif(strlen(trim($_POST["password"])) < 6){
          $password_err = "Password must have atleast 6 characters.";
      } else{
          $password = trim($_POST["password"]);
      }
      
      if(empty(trim($_POST["Firstname"]))){
        $Firstname_err = "Please enter Firstname.";     
    
    } else{
        $Firstname = trim($_POST["Firstname"]);
    }

    if(empty(trim($_POST["Lastname"]))){
        $Lastname_err = "Please enter a Lastname.";     
    
    } else{
        $Lastname = trim($_POST["Lastname"]);
    }


      if(empty(trim($_POST["phone"]))){
          $phone_err = "Please enter a phone.";     
      
      } else{
          $phone = trim($_POST["phone"]);
      }

      if(empty(trim($_POST["address"]))){
          $address_err = "Please enter a address.";     
      
      } else{
          $address = trim($_POST["address"]);
      }
      if(empty(trim($_POST["city"]))){
          $city_err = "Please enter a city.";     
      
      } else{
          $city = trim($_POST["city"]);
      }
      if(empty(trim($_POST["email"]))){
          $email_err = "Please enter a email.";     
      
      } else{
          $email= trim($_POST["email"]);
      }
      // Check input errors before inserting in database
      if(empty($username_err) && empty($password_err) && empty($Firstname_err) && empty($Lastname_err) && empty($phone_err)&& empty($address_err)&& empty($city_err)&& empty($email_err)){
          
          // Prepare an insert statement
          $sql = "INSERT INTO customers (id,username, password,Firstname,Lastname,phone,address,city,email) VALUES (?,?, ?,?,?,?,?,?,?)";
           
          if($stmt = mysqli_prepare($link, $sql)){
              // Bind variables to the prepared statement as parameters
              mysqli_stmt_bind_param($stmt, "issssisss",$param_id, $param_username, $param_password,$param_Firstname,$param_Lastname,$param_phone,$param_address,$param_city,$param_email);
              
              // Set parameters
              $param_username = $username;
              $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
              $param_id= $id;
              $param_email=$email;
              $param_Firstname=$Firstname;
              $param_Lastname=$Lastname;
              $param_phone=$phone;
              $param_address=$address;
              $param_city=$city;
              // Attempt to execute the prepared statement
              if(mysqli_stmt_execute($stmt)){
                  // Redirect to login page
                  header("location: index1.php");
              } else{
                  echo "Oops! Something went wrong. Please try again later.";
              }
  
              // Close statement
              mysqli_stmt_close($stmt);
          }
      }
      
      // Close connection
      mysqli_close($link);
  }

  // Test if query succeeded (recommended)
  // For INSERT statements, $result is true/false
  if (!$result) {
    echo 'Insert failed';
    exit;
  }
}

