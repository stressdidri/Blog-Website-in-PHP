<?php include "includes/admin_header.php" ?>

<div id="wrapper">
  <!-- Navigation -->
<?php include "includes/admin_navigation.php" ?>


  <div id="page-wrapper">
    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">


          <h1 class="page-header">
            Wlcome to Admin: 
            <small>Author   </small>
          </h1>

<div class="col-xs-6">
<?php 
if(isset($_POST["submit"]))
{
  $cat_title=$_POST["cat_title"];
  if($cat_title== "" || empty($cat_title))
    {
      echo "This field should not be empty";
    }
  else
    {
      $query="INSERT INTO categories(cat_title) VALUE('{$cat_title}')";
      $create_category_query=mysqli_query($connection, $query);

      if(!$create_category_query)
      {
        die ("Add Category Failed") . mysqli_error($connection);
      }
    }

}

?>

        <form action="" method="post">
            <div class="form-group">
            <label for="cat_title">Add Category</label>
                <input class="form-control" type="text" name="cat_title" id="">
            </div>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="submit" value="Add Category ">
            </div>
        </form>
</div>
<div class="col-xs-6">

    <table class="table table-bordered table-hover">
        <thead>
            <th>ID</th>
            <th>Category Title</th>
        </thead>
        <tbody>

<?php  //FIND ALL CATEGORIES
$query = "SELECT * FROM categories";
$select_categories = mysqli_query($connection,$query);

while($row=mysqli_fetch_assoc($select_categories))
{
    $cat_id= $row["cat_id"];
    $cat_title= $row["cat_title"];
    echo "<tr>";
    echo "<td>{$cat_id}</td>";
    echo "<td>{$cat_title}</td>";
    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
    echo "</tr>";
}

?>

<?php //DELETE QUERY

if(isset($_GET['delete']))
{
  $the_cat_id=$_GET['delete'];

  $query= "DELETE FROM categories WHERE cat_id={$the_cat_id}";
  $delete_query=mysqli_query($connection,$query);
  header("Location: categories.php");
}

?>

        </tbody>
    </table>
</div>


        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<?php include "includes/admin_footer.php" ?>
