<?php
include("authentication.php");
include("includes/header.php");
?>
<div class="container-fluid px-4">

    <div class="row mt-4">
        <div class="col-md-12">

            <?php include('message.php'); ?>

            <div class="card">
                <div class="card-header">
                    <h4>Edit Post
                        <a href="post-view.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <?php
                        if(isset($_GET['id']))
                        {
                            $post_id = $_GET['id'];
                            $post_query = "SELECT * FROM posts WHERE id='$post_id' LIMIT 1";
                            $post_query_res = mysqli_query($con, $post_query);

                            if(mysqli_num_rows($post_query_res) > 0)
                            {
                                $post_row = mysqli_fetch_array($post_query_res);
                                ?>

                                <form action="code.php" method="POST" enctype="multipart/form-data">

                                    <input type="hidden" name="post_id" value="<?= $post_row['id'] ?>">

                                    <div class="row"> 
                                        <div class="col-md-12 mb-3">
                                            <label for="">Category List</label>
                                            <?php
                                                $category = "SELECT * FROM categories WHERE status='0' ";
                                                $category_run = mysqli_query($con, $category);

                                                if(mysqli_num_rows($category_run) > 0)
                                                {
                                                    ?>                                      
                                                    <select name="category_id" required class="form-control">
                                                        <option value="">--Select Category--</option>
                                                        <?php
                                                            foreach($category_run as $categoryitem)
                                                            {
                                                            ?>
                                                            <option value="<?= $categoryitem['id'] ?>" <?= $categoryitem['id'] == $post_row['category_id'] ? 'selected':'' ?> >
                                                                <?= $categoryitem['name'] ?>
                                                            </option>
                                                            <?php   
                                                            }
                                                        ?>
                                                    </select>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                    <h5>No Category Avalaible</h5>
                                                    <?php
                                                }
                                            ?>

                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Name</label>
                                            <input type="text" name="name" value="<?= $post_row['name'] ?>" required class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Slug (URL)</label>
                                            <input type="text" name="slug" value="<?= $post_row['slug'] ?>" required class="form-control">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Description</label>
                                            <textarea name="description" id="summernote" required class="form-control" rows="4"><?= $post_row['description'] ?></textarea>
                                        </div>


                                        <div class="col-md-12 mb-3">
                                            <label for="">Meta Title</label>
                                            <input type="text" name="meta_title" value="<?= $post_row['meta_title'] ?>" max="191" required class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Meta Description</label>
                                            <textarea name="meta_description" required class="form-control" rows="4"><?= $post_row['meta_description'] ?></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Meta Keyword</label>
                                            <textarea name="meta_keyword" required class="form-control" rows="4"><?= $post_row['meta_keyword'] ?></textarea>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Latitude</label>
                                            <input type="text" name="latitude" value="<?= $post_row['latitude'] ?>" max="191" required class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Longitude</label>
                                            <input type="text" name="longitude" value="<?= $post_row['longitude'] ?>" max="191" required class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Kabupaten</label>
                                            <input type="text" name="kabupaten" value="<?= $post_row['kabupaten'] ?>" max="191" required class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Alamat</label>
                                            <input type="text" name="alamat" value="<?= $post_row['alamat'] ?>" max="191" required class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Kode Pos</label>
                                            <input type="text" name="kodepos" value="<?= $post_row['kodepos'] ?>" max="191" required class="form-control">
                                        </div>
  
                                        <div class="col-md-6 mb-3">
                                            <label for="">Kategori 1</label>
                                            <input type="text" name="kategori1" value="<?= $post_row['kategori1'] ?>" max="191" required class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Kategori 2</label>
                                            <input type="text" name="kategori2" value="<?= $post_row['kategori2'] ?>" max="191" required class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Kategori 3</label>
                                            <input type="text" name="kategori3" value="<?= $post_row['kategori3'] ?>" max="191" required class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Image</label>
                                            <input type="hidden" name="old_image" value="<?= $post_row['image'] ?>" />
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Image1</label>
                                            <input type="hidden" name="old_image1" value="<?= $post_row['image1'] ?>" />
                                            <input type="file" name="image1" class="form-control">
                                        </div>                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Image2</label>
                                            <input type="hidden" name="old_image2" value="<?= $post_row['image2'] ?>" />
                                            <input type="file" name="image2" class="form-control">
                                        </div>                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Image3</label>
                                            <input type="hidden" name="old_image3" value="<?= $post_row['image3'] ?>" />
                                            <input type="file" name="image3" class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Status</label><br/>
                                            <input type="checkbox" name="status" <?= $post_row['status'] == '1' ?'checked':'' ?> width="70px" height="70px">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <button type="submit" name="post_update" class="btn btn-primary">Update Post</button>
                                        </div>

                                    </div>
                                </form>
                                
                                <?php
                            }
                            else
                            {
                                ?>
                                    <h4>No Record Found</h4>
                                <?php
                            }
                        }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>



<?php
include("includes/footer.php");
include("includes/scripts.php");

?>