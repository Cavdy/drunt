<?php
  require_once('core/index.php');

  $dateTime = strftime("%B-%d-%Y %H:%M:%S", time());

  if(isset($_POST['submit'])) {
    $categoryName = $drunt-> checkInput($_POST['categoryName']);
    $categorySlug = $drunt-> checkInput($_POST['categorySlug']);
    $admin = "Cavdy";

    if(empty($categoryName)) {
      $_SESSION['ErrorMessage'] = "All fields are required";
      $drunt-> redirect("category.php");
    } else if(strlen($categoryName) > 20) {
      $_SESSION['ErrorMessage'] = "Category should not be greater than 20 characters";
      $drunt-> redirect("category.php");
    } else {
      global $connect;

      empty($categorySlug) ? $categorySlug = $categoryName : $categorySlug = $drunt-> checkInput($_POST['categorySlug']);

      $Query = "INSERT INTO dt_category(datetime,category_name,category_slug,creator_name) VALUES('$dateTime', '$categoryName', '$categorySlug', '$admin')";
      $Execute = mysqli_query($connect,$Query);
      if($Execute) {
        $_SESSION['SuccessMessage'] = "Category added successfully";
        $drunt-> redirect("category.php");
      } else {
        $_SESSION['ErrorMessage'] = "Failed to submit! Try again";
        $drunt-> redirect("category.php");
      }
    }
    mysqli_close($connect);
  }

?>

<?php include('includes/header.php'); ?>

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Table</a></li>
                        <li class="active">Data table</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Author</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                      <?php
                                        global $connect;
                                        $ViewQuery = "SELECT * FROM dt_category ORDER BY datetime desc";
                                        $Execute = mysqli_query($connect, $ViewQuery);

                                        while ($DataRows = mysqli_fetch_array($Execute)) {
                                          $Id = $DataRows['category_id'];
                                          $Category_name = $DataRows['category_name'];
                                          $Author = $DataRows['creator_name'];

                                      ?>
                                        <tr>
                                            <td><?php echo $Category_name; ?></td>
                                            <td><?php echo $Author; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                      <?php echo ErrorMessage(); echo SuccessMessage(); ?>
                      <div class="card">
                        <div class="card-header"><strong>Category</strong></div>
                        <div class="card-body card-block">

                          <form action="category.php" method="post" id="categoryForm">
                            <div class="form-group">
                              <label for="categoryName"  class=" form-control-label">Category Name</label>
                              <input type="text" name="categoryName" id="categoryName" placeholder="Category Name" class="form-control">
                            </div>

                            <div class="form-group">
                              <label for="categorySlug" class=" form-control-label">Category Slug <small>(Optional)</small></label>
                              <input type="text" name="categorySlug" id="categorySlug" placeholder="Category Slug" class="form-control">
                            </div>

                            <input type="submit" name="submit" class="btn btn-outline-primary" value="Add Category">
                          </form>

                        </div>
                      </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

<?php include('includes/footer.php'); ?>
