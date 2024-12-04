<?php
include "admin/config/dbcon.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $post_id = $_POST['post_id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $comment = $_POST['comment'];
  $slug = $_GET['title'];

  // Lakukan validasi data jika diperlukan

  // Insert komentar ke database
  $query = "INSERT INTO comments (post_id, name,comment) VALUES ('$post_id', '$name', '$comment')";
  $result = mysqli_query($con, $query);

  if ($result) {
    // Komentar berhasil ditambahkan, lakukan tindakan selanjutnya (misalnya kembali ke halaman post)
    header("Location: post1.php?title=$slug");
    exit();
  } else {
    // Terjadi kesalahan saat menambahkan komentar
    echo "Error: " . mysqli_error($con);
  }
}