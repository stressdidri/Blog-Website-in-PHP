<!-- DataBase Connection  -->
<?php include "includes/db.php" ?>
<!-- Header -->
<?php include "includes/header.php" ?>
<!-- Navigation -->
<?php include "includes/navigation.php" ?>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">

<?php 

if(isset($_GET['p_id']))
{
$the_post_id=$_GET['p_id'];
}
$query = "SELECT * FROM posts WHERE post_id=$the_post_id";
$select_all_posts_query = mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($select_all_posts_query))
{
    $post_title= $row["post_title"];
    $post_author= $row["post_author"];
    $post_date= $row["post_date"];
    $post_image= $row["post_image"];
    $post_content= $row["post_content"];
?>
<!-- HTML Part to Display -->
          <h1 class="page-header">Page Heading<small>Secondary Text</small></h1>
          <!-- First Blog Post -->
          <h2><a href="#"><?php echo $post_title ?></a></h2>
          <p class="lead">by <a href="index.php"><?php echo $post_author ?></a></p>
          <p>
            <span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?>
          </p>
          <hr />
          <img
            class="img-responsive"
            src="images/<?php echo $post_image ?>"
            alt=""
          />
          <hr />
          <p>
          <?php echo $post_content  ?>
          </p>
          <a class="btn btn-primary" href="#">
            Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
          <hr />
<!-- END Display HTML PART-->

<!-- Closing Braces-->
<?php
}
?>

          <!-- Posted Comments -->
          <?php 

if(isset($_POST['create_comment'])) {

    $the_post_id = $_GET['p_id'];
    $comment_author = $_POST['comment_author'];
    $comment_email = $_POST['comment_email'];
    $comment_content = $_POST['comment_content'];


    if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {

        $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status,comment_date)";

        $query .= "VALUES ($the_post_id ,'{$comment_author}', '{$comment_email}', '{$comment_content }', 'unapproved',now())";

        $create_comment_query = mysqli_query($connection, $query);

        if (!$create_comment_query) 
        {
            die('QUERY FAILED' . mysqli_error($connection));
        }
    }
}
?> 
        <!-- Comments Form -->
        <div class="well">
            <h4>Leave a Comment:</h4>
            <form action="#" method="post" role="form">

                <div class="form-group">
                    <label for="Author">Author</label>
                    <input type="text" name="comment_author" class="form-control" name="comment_author">
                </div>

                <div class="form-group">
                    <label for="Author">Email</label>
                    <input type="email" name="comment_email" class="form-control" name="comment_email">
                </div>

                <div class="form-group">
                    <label for="comment">Your Comment</label>
                    <textarea name="comment_content" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <hr>
<!-- here -->
<!-- end here -->
            
             </div>
             <!-- Blog Sidebar Widgets Column -->  
             <?php include "includes/sidebar.php";?>
         </div>
         <!-- /.row -->
         <hr>
 <?php include "includes/footer.php";?>
 