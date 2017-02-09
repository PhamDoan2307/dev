<?php
require('connectDB.php');
//menu item
function getdanhmucsp()
{
    $query="select * from typephone_lbl ORDER  BY  pID DESC ";
    return mysqli_query(connectDB(),$query);
}
function getsp_theoloaisp($pID)
{
    $qery="select * from phone_lbl where pID='$pID' AND pNumber!=0 ORDER BY pIMEI ";
    return mysqli_query(connectDB(),$qery);
}
//random sản phẩm
function random_sp()
{
    $r="select * from phone_lbl ORDER BY RAND() LIMIT 0,6";
    return mysqli_query(connectDB(),$r);
}
function sanphamhot()
{
    $query="select * from phone_lbl  ORDER by pView DESC LIMIT 0,4";
    return mysqli_query(connectDB(),$query);
}
function sau_dtmoinhat()
{
    $query="select * from phone_lbl ORDER  by pIMEI DESC limit 0,6";
    return mysqli_query(connectDB(),$query);
}
// phân trang và xem từng sản phẩm theo loại sản phẩm
function dt_theoldt_phantrang($pID,$tu,$sotin1trang)
{
    $strquery="select * from phone_lbl where pID=$pID ORDER BY pIMEI DESC LIMIT $tu,$sotin1trang";
    return mysqli_query(connectDB(),$strquery);
}
function getloaisp_theoid($pID)
{
    $strquery="select pTypephone from typephone_lbl WHERE pID='$pID'";
    return mysqli_query(connectDB(),$strquery);

}
function get_all_dt()
{

    $strquery="select * from phone_lbl ORDER BY pIMEI DESC ";
    return mysqli_query(connectDB(),$strquery);
}
function getall_dt($tu,$sotin1trang)
{
    $strquery="select * from phone_lbl ORDER BY pIMEI DESC LIMIT $tu,$sotin1trang";
    return mysqli_query(connectDB(),$strquery);
}
function laytenlsp_sp($pIMEI)
{
 $r="select pTypephone,pName from typephone_lbl,phone_lbl WHERE typephone_lbl.pID=phone_lbl.pID AND pIMEI='$pIMEI'";
    return mysqli_query(connectDB(),$r);
}
function chitiet_sp($pIMEI)
{
    $r="select * from phone_lbl WHERE pIMEI='$pIMEI'";
    return mysqli_query(connectDB(),$r);
}
function binhluan_by_pIMEI($pIMEI)
{
    $r="select * from comment_lbl WHERE  pIMEI='$pIMEI' AND cmStatus=1 ORDER BY cmID DESC ";
    return mysqli_query(connectDB(),$r);
}

function spcungloai($pIMEI,$pID)
{
$r="select * from phone_lbl WHERE pIMEI<>$pIMEI AND pID='$pID' ORDER BY RAND() LIMIT 0,6";
    return mysqli_query(connectDB(),$r);
}
function capnhatsolanxem($pIMEI)
{
    $r="update phone_lbl set pView=pView+1 WHERE pIMEI='$pIMEI'";
    return mysqli_query(connectDB(),$r);
}
//gio hang
//get spham theo giá
function max2trieu()
{
    $query="select * from phone_lbl where pPrice BETWEEN 0 AND 2000000";
    return mysqli_query(connectDB(),$query);
}
function max3trieu()
{
    $query="select * from phone_lbl where pPrice BETWEEN 2100000 AND 3000000";
    return mysqli_query(connectDB(),$query);
}
function max5trieu()
{
    $query="select * from phone_lbl where pPrice BETWEEN 31000000 AND 50000000";
    return mysqli_query(connectDB(),$query);
}function max10trieu()
{
    $query="select * from phone_lbl where pPrice BETWEEN 5000001 AND 10000000";
    return mysqli_query(connectDB(),$query);
}function min10trieu()
{
    $query="select * from phone_lbl where pPrice BETWEEN 10000000 AND 50000000";
    return mysqli_query(connectDB(),$query);
}
//tìm kiếm
function timkiem($tukhoa)
{
    $query="select * from phone_lbl where pName like ('%$tukhoa%')";
    return mysqli_query(connectDB(),$query);
}
function khuyenmai()
{
    $r="select * from khuyenmai_lbl";
    return mysqli_query(connectDB(),$r);
}
?>
