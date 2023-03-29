<?php
include '../assets//config.php';
if(isset(($_GET['deleteComment']))){
     $comment_id=$_GET['comment_id']; 
      mysqli_query($conn, "DELETE FROM `comment_reply` WHERE  comment_id = '$comment_id'") or die('query failed');
      mysqli_query($conn, "DELETE FROM `comment` WHERE  comment_id = '$comment_id'") or die('query failed'); 
      header('location:membermanagepost.php');
  

}
if(isset(($_GET['deletePost']))){
    $post_id=$_GET['post_id'];
    mysqli_query($conn, "DELETE FROM `post` WHERE   post_id = '$post_id'") or die('query failed'); 
    mysqli_query($conn, "DELETE FROM `comment_reply` WHERE  post_id = '$post_id'") or die('query failed');
    mysqli_query($conn, "DELETE FROM `comment` WHERE  post_id = '$post_id'") or die('query failed');  
    header('location:membermanagepost.php');

}
?>