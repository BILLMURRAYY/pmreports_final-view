<!DOCTYPE html>
<html lang="en">
<head>
   <!-- SweetAlert2 -->
   <script src="../../assets/bootstrap/template/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../../assets/bootstrap/template/plugins/sweetalert2/sweetalert2.min.css">
</head>
<body>
<?php
require_once("../service/condb.php");  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$member_id = $_GET["member_id"];
$sql = "DELETE FROM member
WHERE member_id = $member_id ";
$query = mysqli_query($condb,$sql);
if(mysqli_affected_rows($condb)) {
// echo "Record delete successfully";
}
mysqli_close($condb);
if ($query) {
    echo "<script>";
        echo "Swal.fire({
            icon: 'success',
            title: 'ลบข้อมูลสมาชิก สำเร็จ !!!',
            // text: 'Something went wrong!'
          }).then((result)=>{
            if(result){
            window.location.href = 'index.php';
            }
        })";
        echo "</script>";
} else {
    // echo "<script type='text/javascript'>";
    // echo "alert('Error back to delete again');";
    // echo "window.location.href = 'index.php';";
    // echo "</script>";
    echo "<script>";
        echo "Swal.fire({
            icon: 'error',
            title: 'การลบ ไม่สำเร็จ!',
            // text: 'Something went wrong!'
          }).then((result)=>{
            if(result){
            window.location.href = 'index.php';
            }
        })";
        echo "</script>";
}
?>
</body>