<?php 
    include('config.php');
?>

<html>

    <head>
        <title>Task MANAGER</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    
    <body>
    
    <div class="wrapper">
    
    <h1>TASK MANAGER</h1>
    
    
    <!-- Menu Starts Here -->
    <div class="menu">
    
        <a href="../index.php">Home</a>
        
        <?php 
            
        
            
            //Query to Get the Lists from database
            $sql2 = "SELECT * FROM tbl_lists";
            
            //Execute Query
            $res2 = mysqli_query($conn, $sql2);
            
            //CHeck whether the query executed or not
            if($res2==true)
            {
                //Display the lists in menu
                while($row2=mysqli_fetch_assoc($res2))
                {
                    $list_id = $row2['list_id'];
                    $list_name = $row2['list_name'];
                    ?>
                    
                    <a href="<?php  ?>list-task.php?list_id=<?php echo $list_id; ?>"><?php echo $list_name; ?></a>
                    
                    <?php
                    
                }
            }
            
        ?>
        
        
        <a href="manage-list.php">Manage Lists</a>
    </div>
    <!-- Menu Ends Here -->
    
    <!-- Tasks Starts Here -->
    
    <p>
        <?php 
        
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            
            
            if(isset($_SESSION['delete_fail']))
            {
                echo $_SESSION['delete_fail'];
                unset($_SESSION['delete_fail']);
            }
        
        ?>
    </p>
    
    <div class="all-tasks">
        
        <a class="btn-primary" href="<?php  ?>add-task.php">Add Task</a>
        
        <table class="tbl-full">
        
            <tr>
                <th>S.N.</th>
                <th>Task Name</th>
                <th>Priority</th>
                <th>Deadline</th>
                <th>DueDate</th>
                <th>Actions</th>
            </tr>
            
            <?php 
            
              
                
                //Create SQL Query to Get DAta from Databse
                $sql = "SELECT * FROM tbl_tasks";
                
                //Execute Query
                $res = mysqli_query($conn, $sql);
                
                //CHeck whether the query execueted o rnot
                if($res==true)
                {
                    //DIsplay the Tasks from DAtabase
                    //Dount the Tasks on Database first
                    $count_rows = mysqli_num_rows($res);
                    
                    //Create Serial Number Variable
                    $sn=1;
                    
                    //Check whether there is task on database or not
                    if($count_rows>0)
                    {
                        //Data is in Database
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $task_id = $row['task_id'];
                            $task_name = $row['task_name'];
                            $priority = $row['priority'];
                            $deadline = $row['deadline'];
                            $DueDate = $row['DueDate'];
                            $Actions = $row['Actions'];
                            ?>
                            
                            <tr>
                                <td><?php echo $sn++; ?>. </td>
                                <td><?php echo $task_name; ?></td>
                                <td><?php echo $priority; ?></td>
                                <td><?php echo $deadline; ?></td>
                                <td><?php echo $DueDate; ?></td>
                                <td><?php echo $Actions; ?></td>
                                <td>
                                    <a href="update-task.php?task_id=<?php echo $task_id; ?>">Update </a>
                                    
                                    <a href="delete-task.php?task_id=<?php echo $task_id; ?>">Delete</a>
                                
                                </td>
                            </tr>
                            
                            <?php
                        }
                    }
                    else
                    {
                        //No data in Database
                        ?>
                        
                        <tr>
                            <td colspan="5">No Task Added Yet.</td>
                        </tr>
                        
                        <?php
                    }
                }
            
            ?>
            
            
        
        </table>
    
    </div>
    
    <!-- Tasks Ends Here -->
    </div>
    </body>

</html>