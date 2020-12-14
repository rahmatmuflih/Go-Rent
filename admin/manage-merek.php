<?php
session_start();
error_reporting(0);
include('../inc/koneksi.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "delete from merek  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
$msg="Data Berhasil dihapus";

}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Manage Merek</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="../node_modules/summernote/dist/summernote-bs4.css">
  <link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <!--<li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>-->
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="../assets/img/admin.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, Administrator</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Menu</div>
              <a href="ubah-password.php" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Change Password
              </a>
              <!-- <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a> -->
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <!--SIDE BAR DISINI ⬇-->
      <?php include('../inc/sidebar.php');?>

    <!-- Main Content -->
    <div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Merek</h1>
        </div>
        <a href="tambah-merek.php" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah merek</a>
        <?php if($error){?><div class="alert alert-danger alert-dismissible fade show" role="alert">:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="alert alert-success alert-dismissible fade show" role="alert"><?php echo htmlentities($msg); ?> </div><?php }?>
        <table class="table table-hover table-striped table-border">
        <thead>
            <tr>
                <th>No </th>
                <th>Nama Merek </th>
                <th>Update Date</th>
                <th>Aksi </th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $sql = "SELECT * from  merek";
                $query = $dbh -> prepare($sql);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);

                $cnt=1;
                if($query->rowCount() > 0){
                    foreach($results as $result){
            ?>	
                <tr>
                    <td><?php echo htmlentities($cnt);?></td>
					<td><?php echo htmlentities($result->NamaMerek);?></td>
					<td><?php echo htmlentities($result->CreationDate);?></td>
                    <td>
                        <a href="edit-merek.php?id=<?php echo $result->id;?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="manage-merek.php?del=<?php echo $result->id;?>" onclick="return confirm('Do you want to delete');" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php $cnt=$cnt+1; }} ?>
        </tbody>
        </table>
    </section>
</div>

<?php include('../inc/footer.php');?>
<?php } ?>