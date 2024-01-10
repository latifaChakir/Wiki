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
                    <h3><i class="fa fa-list"></i> Edit Wiki</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">

                        <div class="x_content">
                        <form id="demo-form2" method="post" action="/updateWiki" enctype="multipart/form-data">

                                <?php foreach ($wikis as $wiki) {
                                    // dump($wiki);

                                ?>

                                    <div class="item form-group">
                                        <div class="col-md-8 col-sm-8 offset-md-2">
                                            <input type="text" name="title" class="form-control has-feedback-left" value="<?php echo $wiki['title']; ?>">
                                            <span class="fa fa-medkit form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <div class="col-md-8 col-sm-8 offset-md-2">
                                            <textarea type="text" name="content" class="form-control has-feedback-left"><?php echo $wiki['content']; ?></textarea>
                                            <span class="fa fa-map form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                <?php } ?>

                                <div class="item form-group">
                                    <div class="col-md-8 col-sm-8 offset-md-2">
                                        <label for="">Choose category :</label>
                                        <select class="form-control" name="category_id" data-placeholder="choose a category">
                                            <?php foreach ($categories as $category) :
                                                $selected = ($category['id'] == $wiki['category_id']) ? 'selected' : '';
                                            ?>
                                                <option value="<?php echo $category['id']; ?>" <?php echo $selected; ?>><?php echo $category['nom']; ?></option>

                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>



                                <div class="item form-group">
                                    <div class="col-md-8 col-sm-8 offset-md-2">
                                        <select class="js-example-basic-multiple form-control" name="tags[]" multiple="multiple" data-placeholder="choose your tags">

                                            <?php foreach ($tags as $tag) :

                                                $selected = ($tag['id'] == $wiki['tags_id']) ? 'selected' : '';
                                            ?>

                                            <?php endforeach ?>
                                            <?php foreach ($tagg as $tag) :

                                            ?>
                                                <option value="<?php echo $tag['id']; ?>" <?php echo $selected; ?>><?php echo $tag['nom']; ?></option>
                                            <?php endforeach ?>
                                        </select>

                                    </div>
                                </div>
                             

                               <div class="item form-group">
                                    <div class="col-md-8 col-sm-8 offset-md-2">
                                    <input type="file" class="custom-file-input" name="image_path" accept=".png, .svg, .jpg" id="image_path_input">

                                        <label class="custom-file-label" for="image_path_input">
                                            <?php echo !empty($wiki['image_path']) ? $wiki['image_path'] : 'Choisir un fichier'; ?>
                                         </label>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $wiki['wikis_id']; ?>">


                                <div class="item form-group">
                                    <div class="col-md-8 col-sm-8 offset-md-2">
                                        <a href="/wiki"><button class="btn btn-primary" type="button">Cancel</button></a>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
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
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });

        document.getElementById('image_path_input').addEventListener('change', function() {
            var fileName = this.files[0].name;
            document.querySelector('.custom-file-label').textContent = fileName;
        });
    </script>
</body>

</html>