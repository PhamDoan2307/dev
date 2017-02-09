<script type="text/javascript">
    function xoaSP(){
        var conf=confirm("Bạn có thực sự muốn xóa?");
        return conf;
    }
</script>
<?php 
ob_start();
	if(isset($_SESSION['giohang'])){
		if(isset($_POST['muatiep']))
			header('location:index.php');
        
        if(isset($_POST['muahang']))
            header('location:index.php?page_layout=muahang');

		if(isset($_POST['capnhat'])){
			if(isset($_POST['soluong_post'])){
				foreach($_POST['soluong_post'] as $id_sp=>$soluong){
					if ($soluong==0) unset($_SESSION['giohang'][$id_sp]);
					else if($soluong>0) $_SESSION['giohang'][$id_sp]=$soluong;
					}
				}
			}
		$arrayId=array();
		foreach($_SESSION['giohang'] as $id_sp=>$so_luong)
			$arrayId[]=$id_sp;
		    $strId=implode(',',$arrayId);
    		$sql="SELECT * FROM tbl_sanpham WHERE id_sp IN($strId)";
    		$query=mysqli_query($dbConnect,$sql);
?>
        <div id="gio-hang"><h2>giỏ hàng</h2></div>
        <table class="tbl-gio-hang" cellpadding="0" cellspacing="0">
            <tr id="title-gio-hang">
                <td width="15%">hình ảnh</td>
                <td width="35%">sản phẩm</td>
                <td width="12%">số lượng</td>
                <td width="16%">đơn giá</td>
                <td width="16%">thành tiền</td>
                <td width="6%">xóa</td>
            </tr>
            <?php 
        		$totalPriceAll=0;
        		while($row=mysqli_fetch_array($query)){
                    //Kiểm tra giá khuyến mãi
                    if(isset($row['batdau_km']))
                        $batdau_km=strtotime($row['batdau_km']);
                    else
                        $batdau_km=0;
                    if(isset($row['ketthuc_km']))
                        $ketthuc_km=strtotime($row['ketthuc_km']);
                    else
                        $ketthuc_km=0;
                    $date_now=strtotime(gmdate("Y-m-d", time()+7*3600));//
                    
                    if(checkTime($batdau_km,$ketthuc_km,$date_now)) $gia=$row['gia_km']; else  $gia=$row['gia_sp'];
        			$totalPrice=$gia*$_SESSION['giohang'][$row['id_sp']];
        	 ?>
            <tr class="iteam-gio-hang">
                <td width="15%"><img width="50" height="70" src="anh/<?php echo $row['anh_sp']; ?>" /></td>
                <td width="35%"><?php echo $row['ten_sp']; ?> </td>
                <form method="post">
                <td width="12%"><input style="width:80px; height:30px;"
                                       name="soluong_post[<?php echo $row['id_sp'];  ?>]" type="text"
                                       value="<?php echo $_SESSION['giohang'][$row['id_sp']]; ?>" /></td>
                <td width="16%"><?php echo number_format($gia,0,",","."); ?></td>
                <td width="16%"><?php echo number_format($totalPrice); ?></td>
                <td width="6%"><a onclick="return xoaSP()" href="chucnang/xoahang.php?id_sp=<?php echo $row['id_sp']; ?>">Xóa</a></td>
            </tr>
            <?php 
                    $totalPriceAll+=$totalPrice;
                 } 
            ?>
        </table>

        <table>
            <tr><td colspan="6" id="total-price">Tổng giá trị: <span style="color:red"><?php echo number_format($totalPriceAll); ?></span> VNĐ</td></tr>
            <tr class="submit-gio-hang">
            	    <td style="width:20px;"><input type="submit" value="Cập nhật" name="capnhat"/></td><td colspan="3"  id="xoahang"></form><form method="post" action="chucnang/xoahang.php"><input type="submit" onclick="return xoaSP()"; name="xoahet" value="Xóa hết"/></td></form>
                   <form method="post"><td colspan="2" id="submit-right"><input type="submit" name="muatiep" value="Mua tiếp"/><input type="submit" name="muahang" value="Đặt hàng"/></td>
                </form>
            </tr>
        </table>
<?php 
    }
    else 
	echo '<script> alert("Hiện không có sản phẩm nào trong giỏ hàng");</script>';
?>