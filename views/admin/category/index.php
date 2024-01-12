<!DOCTYPE html>
<html lang="en">
<?php include 'include/header.php'; ?>

<body class="nav-md">
  <?php $page='category';
  include 'include/sidebar.php'; ?>
  <?php include 'include/menufooter.php'; ?>
  </div>
  </div>

  <?php include 'include/topnav.php'; ?>

  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3><i class="fa fa-folder"></i> Wiki Category</h3>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12  ">
          <div class="x_panel">
            <div class="x_title">
              <h2>List of Categories</h2>
              <ul class="nav navbar-right panel_toolbox">
                <a href="#addModal" class="btn btn-sm btn-info text-white" data-toggle="modal"><i class="fa fa-plus"></i> Add Category</a>

              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>Category Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($categories as $category) : ?>
                    <tr>
                      <td><?php echo $category['nom']; ?></td>
                      <td>
                        <a href="/editCategory?id=<?php echo $category['id']; ?>" class="btn btn-sm btn-success text-white"><i class="fa fa-edit"></i> edit</a>
                        <a href="/deleteCategory?id=<?php echo $category['id']; ?>" class="btn btn-sm btn-danger text-white"><i class="fa fa-trash"></i> delete</a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  <div id="addModal" class="modal">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <form id="employeeForm" method="post" action="/addCategory">
          <div class="modal-header">
            <h4 class="modal-title">Add Category</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Category name</label>
              <input type="text" name="nom" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="submit" class="btn btn-success" value="Add">
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php include 'include/footer.php'; ?>
</body>

</html>