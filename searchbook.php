<?php
$con = new PDO("mysql:host=localhost;dbname=library",'root','');

/* $book_title = $_POST['book_title'];
    $category = $_POST['category'];
    $author = $_POST['author'];
    $book_copies = $_POST['book_copies'];
    $book_pub = $_POST['book_pub'];
    $isbn = $_POST['isbn'];
    $copyright_year = $_POST['copyright_year'];
    $date_added = $_POST['date_added'];
    $status = $_POST['status'];
 */
if (isset($_POST[">>"])) {


    $str = $_POST["searchBook"];

    if(!empty($_POST['searchBook'])){
    
    $sth = $con->prepare("SELECT * FROM book WHERE book_title LIKE '%$str%' OR book_pub LIKE '%$str%' OR author LIKE '%$str%'
    OR isbn LIKE '%$str%'") ;

        $sth->setFetchMode(PDO:: FETCH_OBJ);
        $sth -> execute();

            while($row = $sth->fetch()) {


?>
        <!DOCTYPE html>
<html>
    <head>
        <title>Book Search Result</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        
        
        <br><br><br>  
        
        
            <table>
    
            <tr>
            
            <th>book_id</th>
            <th>book_title</th>
            <th>category</th>
            <th>author</th>
            <th>book_copies</th>
            <th>book_pub</th>
            <th>isbn</th>
            <th>copyright_year</th>
            <th>date_added</th>
            <th>status</th>
        
            </tr>
            
            <tr>
            
            <td><?php echo $row-> book_id; ?></td>
            <td><?php echo $row-> book_title; ?></td>
            <td><?php echo $row-> category; ?></td>
            <td><?php echo $row-> author; ?></td>
            <td><?php echo $row-> book_copies; ?></td>
            <td><?php echo $row-> book_pub; ?></td>
            <td><?php echo $row-> isbn; ?></td>
            <td><?php echo $row-> copyright_year; ?></td>
            <td><?php echo $row-> date_added; ?></td>
            <td><?php echo $row-> status; ?></td>
			
			<td><a href="includes/delete-process.php?id=<?php echo $row-> book_id; ?>">Delete</a></td>
            </tr>

            </table>
            </form>
        
    </body>
</html>
            
    <?php 

}



}              else{  

        echo '<script>alert("Please Search Something!");history.go(-1);</script>';
                }


} //end for search book function





?>