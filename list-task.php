<?php 
    include('config.php');
    //Get the listid from URL
    
    $list_id_url = $_GET['list_id'];
?>

<html>
    <head>
        <title>Task Manager with PHP and MySQL</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    
    <body>
        
        <div class="wrapper">
        
        <h1>TASK MANAGER</h1>
        
        <!-- Menu Starts Here -->
        <div class="menu">
        
            <a href="<?php  ?>">Home</a>
            
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
            
            
            
            <a href="<?php  ?>manage-list.php">Manage Lists</a>
        </div>
        <!-- Menu Ends Here -->
        
        
        <div class="all-task">
        
            <a class="btn-primary" href="<?php  ?>add-task.php">Add Task</a>
            
            
            <table class="tbl-full">
            
                <tr>
                    <th>S.N.</th>
                    <th>Task Name</th>
                    <th>Priority</th>
                    <th>Deadline</th>
                    <th>Actions</th>
                </tr>
                
                <?php 
                
                
                    
                    //SQL QUERY to display tasks by list selected
                    $sql = "SELECT * FROM tbl_tasks WHERE list_id=$list_id_url";
                    
                    //Execute Query
                    $res = mysqli_query($conn, $sql);
                    
                    if($res==true)
                    {
                        //Display the tasks based on list
                        //Count the Rows
                        $count_rows = mysqli_num_rows($res);
                        
                        if($count_rows>0)
                        {
                            //We have tasks on this list
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $task_id = $row['task_id'];
                                $task_name = $row['task_name'];
                                $priority = $row['priority'];
                                $deadline = $row['deadline'];
                                $DueDate = $row['DueDate'];
                                ?>
                                
                                <tr>
                                    <td>1. </td>
                                    <td><?php echo $task_name; ?></td>
                                    <td><?php echo $priority; ?></td>
                                    <td><?php echo $deadline; ?></td>
                                    <td><?php echo $DueDate; ?></td>
                                    <td>
                                        <a href="<?php  ?>update-task.php?task_id=<?php echo $task_id; ?>">Update </a>
                                    
                                    <a href="<?php  ?>delete-task.php?task_id=<?php echo $task_id; ?>">Delete</a>
                                    </td>
                                </tr>
                                
                                <?php
                            }
                        }
                        else
                        {
                            //NO Tasks on this list
                            ?>
                            
                            <tr>
                                <td colspan="5">No Tasks added on this list.</td>
                            </tr>
                            
                            <?php
                        }
                    }
                ?>
                
                
            
            </table>
        
        </div>
        
        </div>
    </body>
    
</html>































