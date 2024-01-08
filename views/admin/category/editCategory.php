<!DOCTYPE html>
<html lang="en">
<?php include 'include/header.php'; ?>

<body class="nav-md">
  <?php include 'include/sidebar.php'; ?>
  <?php include 'include/menufooter.php'; ?>
  </div>
  </div>

  <?php include 'include/topnav.php'; ?>

  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3><i class="fa fa-cog"></i> Category Settings</h3>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12  ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Configuration</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <form method="post" action="/updateTag">
                <div class="modal-header">
                  <h4 class="modal-title">Edit Category</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label>Category name</label>
                    <?php foreach ($results as $category) : ?>
                    <input type="text" name="nom" class="form-control" value="<?php echo $category['nom']; ?>" required >
                    <?php endforeach ?>
                  </div>

                  <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
                </div>
                <div class="modal-footer">
                  <a href="/category"><input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel"></a>
                  <input type="submit" class="btn btn-success" value="Edit">
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>

  <?php include 'include/footer.php'; ?>
</body>

</html>