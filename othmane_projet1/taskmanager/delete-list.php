<?php
    //Include constants.php
    include('config/constants.php');
    //echo "Delete List Page";
    
    //Check whether the list_id is assigned or not
    if(isset($_GET['list_id']))
    {
        //Delete the List from the database
        
        //Get the list_id value from URL or Get Method
        $list_id = $_GET['list_id'];
        
        //Connect to the Database
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
        
        //Select Database
        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
        
        //Write the Query to DELETE List from the Database
        $sql = "DELETE FROM tbl_lists WHERE list_id=$list_id";
        
        //Execute The Query
        $res = mysqli_query($conn, $sql);
        
        //Check whether the query executed successfully or not
        if($res==true)
        {
            //Query Executed Successfully, which means the list is deleted successfully
            $_SESSION['delete'] = "List Deleted Successfully";
            
            //Redirect to Manage List Page
            header("Location:http://localhost/othmane_projet1/taskmanager/manage-list.php");
            exit(); // Make sure to include exit() after redirection to prevent further code execution
        }
        else
        {
            //Failed to Delete List
            $_SESSION['delete_fail'] = "Failed to Delete List.";
            header("Location:http://localhost/othmane_projet1/taskmanager/manage-list.php");
            exit(); // Make sure to include exit() after redirection to prevent further code execution
        }
    }
    else
    {
        //Redirect to Manage List Page
        header("Location: http://localhost/othmane_projet1/taskmanager/manage-list.php");
        exit(); // Make sure to include exit() after redirection to prevent further code execution
    }
?>
