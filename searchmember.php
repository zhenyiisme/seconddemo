<?php
$con = new PDO("mysql:host=localhost;dbname=library",'root','');

/* $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $type = $_POST['type'];
    $year_level = $_POST['year_level'];
    $ban_status = $_POST['ban_status'];

    */


if (isset($_POST[">>>"])) {
	    
        
    $strmember = $_POST["searchMember"];

    if(!empty($_POST['searchMember'])){
    
    $surprise = $con->prepare("SELECT * FROM member 
    WHERE firstname LIKE '%$strmember%' 
    OR lastname LIKE '%$strmember%' 
    OR contact LIKE '%$strmember%'
    OR ban_status LIKE '%$strmember%'
    OR type LIKE '%$strmember%'");

        $surprise->setFetchMode(PDO:: FETCH_OBJ);
        $surprise -> execute();

        
            while($row = $surprise->fetch()) {


?>
        <!DOCTYPE html>
<html>
    <head>
        <title>Member Search Result</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>

        <br><br><br>  
        
        <style>   
        table, th, td {
        border: 1px solid;
        }
        </style>  

            <table>
    
            <tr>
            
            <th>member_id</th>
            <th>firstname</th>
            <th>lastname</th>
            <th>gender</th>
            <th>address</th>
            <th>contact</th>
            <th>type</th>
            <th>year_level</th>
            <th>ban_status</th>
            
        
            </tr>
            
            <tr>
            
            <td><?php echo $row-> member_id; ?></td>
            <td><?php echo $row-> firstname; ?></td>
            <td><?php echo $row-> lastname; ?></td>
            <td><?php echo $row-> gender; ?></td>
            <td><?php echo $row-> address; ?></td>
            <td><?php echo $row-> contact; ?></td>
            <td><?php echo $row-> type; ?></td>
            <td><?php echo $row-> year_level; ?></td>
            <td><?php echo $row-> ban_status; ?></td>
			
			<td><a href="includes/delete-process2.php?id=<?php echo $row-> member_id; ?>">Delete</a></td>
	
            </tr>

            </table>
			
			

        </body>
    </html>
    <?php 

}




}              else{  

        echo '<script>alert("Please Search Something!");history.go(-1);</script>';
                }


} //end for search member 


?>