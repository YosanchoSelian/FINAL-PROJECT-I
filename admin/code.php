<?php
include("authentication.php");

if(isset($_POST['post_delete_btn']))
{
    $post_id = $_POST['post_delete_btn'];

    $check_img_query = "SELECT * FROM posts WHERE id='$post_id' LIMIT 1";
    $img_res = mysqli_query($con, $check_img_query);
    $res_data = mysqli_fetch_array($img_res);
    $image = $res_data['image'];

    $query = "DELETE FROM posts WHERE id='$post_id' LIMIT 1";
    $query_run = mysqli_query($con, $query); 

    if($query_run)
    {
        if(file_exists('../uploads/posts/'.$old_filename))
        {
            unlink("../uploads/posts/".$image);
        }

        $_SESSION['message'] = "Post Deleted Succesfully";
        header("Location: post-view.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something went wrong";
        header("Location: post-view.php");
        exit(0);
    }   
}

if(isset($_POST['post_update']))
{   
    $post_id = $_POST['post_id'];

    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];

    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];

    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    $kabupaten = $_POST['kabupaten'];
    $alamat = $_POST['alamat'];
    $kodepos = $_POST['kodepos'];

    $kategori1 = $_POST['kategori1'];
    $kategori2 = $_POST['kategori2'];
    $kategori3 = $_POST['kategori3'];

    $old_filename = $_POST['old_image'];
    $image = $_FILES['image']['name'];
    $image1 = $_FILES['image1']['name'];
    $image2 = $_FILES['image2']['name'];
    $image3 = $_FILES['image3']['name'];


    $update_filename = "";
    $update_filename1 = "";
    $update_filename2 = "";
    $update_filename3 = "";
    if($image != NULL)
    {
        // rename this image
        $image_extension = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time().'.'.$image_extension;

        $update_filename = $filename;
    }
    else
    {
        $update_filename = $old_filename;
    }

    if($image1 != NULL)
    {
        $image1_extension = pathinfo($image1, PATHINFO_EXTENSION);
        $filename1 = time().'_1.'.$image1_extension;
        $update_filename1 = $filename1;
    }
    else
    {
        $update_filename1 = $_POST['old_image1'];
    }

    if($image2 != NULL)
    {
        $image2_extension = pathinfo($image2, PATHINFO_EXTENSION);
        $filename2 = time().'_2.'.$image2_extension;
        $update_filename2 = $filename2;
    }
    else
    {
        $update_filename2 = $_POST['old_image2'];
    }

    if($image3 != NULL)
    {
        $image3_extension = pathinfo($image3, PATHINFO_EXTENSION);
        $filename3 = time().'_3.'.$image3_extension;
        $update_filename3 = $filename3;
    }
    else
    {
        $update_filename3 = $_POST['old_image3'];
    }

    $status = $_POST['status'] == true ? '1':'0';


    $query = "UPDATE posts SET category_id='$category_id', name='$name', slug='$slug', description='$description', image='$update_filename',image1='$update_filename1', 
                    image2='$update_filename2', image3='$update_filename3',
                    meta_title='$meta_title', meta_description='$meta_description', meta_keyword='$meta_keyword',
                    status='$status', latitude='$latitude', longitude='$longitude', kabupaten='$kabupaten', alamat='$alamat', kodepos='$kodepos', kategori1='$kategori1', kategori2='$kategori2', kategori3='$kategori3' WHERE id='$post_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        if($image != NULL)
        {
            if(file_exists('../uploads/posts/'.$old_filename))
            {
                unlink("../uploads/posts/".$old_filename);
            }
            move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/posts/'.$update_filename);
        }

        if($image1 != NULL)
        {
            if(file_exists('../uploads/posts/'.$_POST['old_image1']))
            {
                unlink("../uploads/posts/".$_POST['old_image1']);
            }
            move_uploaded_file($_FILES['image1']['tmp_name'], '../uploads/posts/'.$update_filename1);
        }

        if($image2 != NULL)
        {
            if(file_exists('../uploads/posts/'.$_POST['old_image2']))
            {
                unlink("../uploads/posts/".$_POST['old_image2']);
            }
            move_uploaded_file($_FILES['image2']['tmp_name'], '../uploads/posts/'.$update_filename2);
        }

        if($image3 != NULL)
        {
            if(file_exists('../uploads/posts/'.$_POST['old_image3']))
            {
                unlink("../uploads/posts/".$_POST['old_image3']);
            }
            move_uploaded_file($_FILES['image3']['tmp_name'], '../uploads/posts/'.$update_filename3);
        }

        $_SESSION['message'] = "Post Updated Succesfully";
        header("Location: post-edit.php?id=".$post_id);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something went wrong";
        header("Location: post-edit.php?id=".$post_id);
        exit(0);
    }   
                     
}


if(isset($_POST['post_add']))
{
    $category_id = $_POST['category_id'];

    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];

    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];

    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    $kabupaten = $_POST['kabupaten'];
    $alamat = $_POST['alamat'];
    $kodepos = $_POST['kodepos'];

    $kategori1 = $_POST['kategori1'];
    $kategori2 = $_POST['kategori2'];
    $kategori3 = $_POST['kategori3'];

    $image = $_FILES['image']['name'];
    $image1 = $_FILES['image1']['name'];
    $image2 = $_FILES['image2']['name'];
    $image3 = $_FILES['image3']['name'];

    // rename this image
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_extension;

    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_extension;

    $image1_extension = pathinfo($image1, PATHINFO_EXTENSION);
    $filename1 = time().'_1.'.$image1_extension;

    $image2_extension = pathinfo($image2, PATHINFO_EXTENSION);
    $filename2 = time().'_2.'.$image2_extension;

    $image3_extension = pathinfo($image3, PATHINFO_EXTENSION);
    $filename3 = time().'_3.'.$image3_extension;

    $status = $_POST['status'] == true ? '1':'0';

    $query = "INSERT INTO posts(category_id,name,slug,description,image,image1,image2,image3,meta_title,meta_description,meta_keyword,status,latitude,longitude,kabupaten,alamat,kodepos,kategori1,kategori2,kategori3) VALUES 
                ('$category_id','$name','$slug','$description','$filename','$filename1','$filename2','$filename3','$meta_title','$meta_description','$meta_keyword','$status','$latitude','$longitude','$kabupaten','$alamat','$kodepos','$kategori1','$kategori2','$kategori3')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/posts/'.$filename);
        move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/posts/'.$filename);
        move_uploaded_file($_FILES['image1']['tmp_name'], '../uploads/posts/'.$filename1);
        move_uploaded_file($_FILES['image2']['tmp_name'], '../uploads/posts/'.$filename2);
        move_uploaded_file($_FILES['image3']['tmp_name'], '../uploads/posts/'.$filename3);

        $_SESSION['message'] = "Post Created Succesfully";
        header("Location: post-add.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something went wrong";
        header("Location: post-add.php");
        exit(0);
    }   
}




if(isset($_POST['category_delete']))
{
    $category_id = $_POST['category_delete'];

    // 2 = delete category
    $query = "UPDATE categories SET status='2' WHERE id='$category_id' LIMIT 1";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Category Deleted Succesfully";
        header("Location: category-view.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something went wrong";
        header("Location: category-view.php");
        exit(0);
    }    
}

if(isset($_POST['category_update']))
{
    $category_id = $_POST['category_id'];

    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];

    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];

    $navbar_status = $_POST['navbar_status'] == true ? '1':'0';
    $status = $_POST['status'] == true ? '1':'0';

    $query = "UPDATE categories SET name='$name', slug='$slug', description='$description', meta_title='$meta_title', 
                meta_description='$meta_description', meta_keyword='$meta_keyword', navbar_status='$navbar_status',
                status='$status' WHERE id='$category_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Category Updated Succesfully";
        header("Location: category-edit.php?id=".$category_id);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something went wrong";
        header("Location: category-edit.php?id=".$category_id);
        exit(0);
    }    
}







if(isset($_POST['category_add']))
{
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];

    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];

    $navbar_status = $_POST['navbar_status'] == true ? '1':'0';
    $status = $_POST['status'] == true ? '1':'0';

    $query = "INSERT INTO categories (name,slug,description,meta_title,meta_description,meta_keyword,navbar_status,status) VALUES
            ('$name','$slug','$description','$meta_title','$meta_description','$meta_keyword','$navbar_status','$status')";

    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Category Added Succesfully";
        header("Location: category-add.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something went wrong";
        header("Location: category-add.php");
        exit(0);
    }    
}








if(isset($_POST['user_delete']))
{
    $user_id = $_POST['user_delete'];

    $query = "DELETE FROM users WHERE id='$user_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Admin/User Deleted Succesfully";
        header("Location: view-register.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something went wrong";
        header("Location: view-register.php");
        exit(0);
    }    
}

if(isset($_POST['add_user']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_as = $_POST['role_as'];
    $status = $_POST['status'] == true ? '1' : '0';

    $query = "INSERT INTO users (fname,lname,email,password,role_as,status) VALUES ('$fname', '$lname', '$email', '$password', '$role_as', '$status')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Admin/User Added Succesfully";
        header("Location: view-register.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something went wrong";
        header("Location: view-register.php");
        exit(0);
    }
}


if(isset($_POST['update_user']))
{
    $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_as = $_POST['role_as'];
    $status = $_POST['status'] == true ? '1' : '0';

    $query = "UPDATE users SET fname='$fname', lname='$lname', email='$email', password='$password', role_as='$role_as', status='$status'
                WHERE id='$user_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Updated Succesfully";
        header("Location: view-register.php");
        exit(0);
    }

}
?>