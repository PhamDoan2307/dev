<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="breadcrumbs">
        <p><a href="#">Trang chủ</a> <i class="icons icon-right-dir"></i>Khuyến mại</p>
    </div>
</div>
<section class="main-content col-lg-9 col-md-9 col-sm-9">
    <div align="center">Thông tin khuyến mại</div><br>
<?php
$stt = 1;
$khuyenmai=khuyenmai();
while($row=mysqli_fetch_array($khuyenmai)){
?>
    <div align="left"><strong><?php echo $stt ?>.<?php echo $row['kTitle'] ?></strong></div><br>
    <div align="center"><strong>Từ &nbsp; :</strong> <?php echo $row['kDateStart'] ?>
        <strong>&nbsp; đến :</strong> <?php echo $row['kDateEnd'] ?></div>
    <div align="left"><?php echo $row['kContent'] ?></div>
    <?php
$stt++;
} ?>
</section>