<?php 
require_once("lib/connection.php");
?>
<?php
		if (isset($_POST["btn_submit1"])) {
  			//lấy thông tin từ các form bằng phương thức POST
  			$username = $_POST["username"];
  			$password = $_POST["password"];
 			$hoten = $_POST["hoten"];
  			$coquan = $_POST["coquan"];
  			
  			//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
			  if ($username == "" || $password == "" || $hoten == "" || $coquan == "") {
				   echo "bạn vui lòng nhập đầy đủ thông tin";}
					else if($xacnhan != "12345678"){echo "Mã xác nhận không đúng";}
				   else{
  					// Kiểm tra tài khoản đã tồn tại chưa
  					$sql="select * from tb_nhanvienhanhchinh where username='$username'";
					$kt=mysqli_query($conn, $sql);
 
					if(mysqli_num_rows($kt)  > 0){
						echo "Tài khoản đã tồn tại";
					}else{
						//thực hiện việc lưu trữ dữ liệu vào db
	    				$sql = "INSERT INTO tb_nhanvienhanhchinh(
	    					coquan,
	    					hoten,
	    					username,
						    password
	    					) VALUES (
	    					'$coquan',
	    					'$hoten',
						    '$username',
	    					'$password'
	    					)";
					    // thực thi câu $sql với biến conn lấy từ file connection.php
   						mysqli_query($conn,$sql);
				   		echo "chúc mừng bạn đã đăng ký thành công";
					}
									    
					
			  }
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Đăng ký
	</title>
	<meta charset="utf-8">
	
</head>
<body>
	<table style="width: 400px;padding: 2px;font-size: 20px;font-family: arial;margin: auto">
		<tr>
			<td width="50%"><input id="btn1" style="width: 100%;font-size: 20px;" type="button" value="Nhân viên hành chính" name=""></td>
			<td><input id="btn2" style="width: 100%;font-size: 20px;" type="button" value="Người yêu cầu" name=""></td>
		</tr>
	</table>
	<fieldset  class="border" style="border-radius: 10px; margin: auto; width: 420px;margin-top: 100px;">
		<legend style="margin: auto; font-size: 24px;"><b>SignUp</b></legend>
		<form name="form1" id="form1" action="signup.php" method="POST" >
			<table style="width: 100%;padding: 2px;font-size: 20px;font-family: arial">
				<tr>
					<td width="35%">Họ tên</td>
					<td width="65%"><input style="width: 100%;border-radius: 3px;font-size: 20px;" type="text" name="hoten"></td>
				</tr>
				<tr>
					<td>Cơ quan</td>
					<td><input style="width: 100%;border-radius: 3px;font-size: 20px;" type="text" name="coquan"></td>
				</tr>
				<tr>
					<td>Username</td>
					<td><input style="width: 100%;border-radius: 3px;font-size: 20px;" type="text" name="username"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input style="width: 100%;border-radius: 3px;font-size: 20px;" type="Password" name="password"></td>
				</tr>
				<tr>
					<td>Mã xác nhận:</td>
					<td>
						<select style="width: 100%;border-radius: 3px;font-size: 20px;">
							<option value="0">--Tỉnh/Thành phố--</option>
							<?php
							
							for ($i=0; $i <5 ; $i++) { 
							 	echo "<option>".$i.$i."</option>";
							 } 
							 ?>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2"><input style="width: 100%;border-radius: 3px;font-size: 20px;background-color: #999;" type="submit" value="SignUp" name="btn_submit1" id="btn_submit1"></td>
				</tr>
			</table>
		</form>
	
		
		<form id="form2" action="signup.php" method="POST" style="display: none;">
			<table style="width: 100%;padding: 2px;font-size: 20px;font-family: arial">
				<tr>
					<td width="35%">Họ tên</td>
					<td width="65%"><input style="width: 100%;border-radius: 3px;font-size: 20px;" type="text" name="hoten"></td>
				</tr>
				<tr>
					<td>Ngày sinh</td>
					<td><input style="width: 100%;border-radius: 3px;font-size: 20px;" type="date" name="coquan"></td>
				</tr>
				<tr>
					<td>Giới tính</td>
					<td>
						<select name="gioitinh" style="width: 100%;border-radius: 3px;font-size: 20px;">
							<option>--Chọn giới tính</option>
							<option>Nam</option>
							<option>Nữ</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Dân tộc:</td>
					<td><input style="width: 100%;border-radius: 3px;font-size: 20px;" type="text" name="dantoc"></td>
				</tr>
				<tr>
					<td>Quốc tịch:</td>
					<td><input style="width: 100%;border-radius: 3px;font-size: 20px;" type="text" name="xacnhan"></td>
				</tr>
				<tr>
					<td>Số CMTND:</td>
					<td><input style="width: 100%;border-radius: 3px;font-size: 20px;" type="text" name="xacnhan"></td>
				</tr>
				<tr>
					<td>Tỉnh/Thành phố:</td>
					<td><input style="width: 100%;border-radius: 3px;font-size: 20px;" type="text" name="xacnhan"></td>
				</tr>
				<tr>
					<td>Quận/Huyện:</td>
					<td><input style="width: 100%;border-radius: 3px;font-size: 20px;" type="text" name="xacnhan"></td>
				</tr>
				<tr>
					<td>Phường/Xã:</td>
					<td><input style="width: 100%;border-radius: 3px;font-size: 20px;" type="text" name="xacnhan"></td>
				</tr>
				<tr>
					<td>Địa chỉ nhà:</td>
					<td><input style="width: 100%;border-radius: 3px;font-size: 20px;" type="text" name="xacnhan"></td>
				</tr>
				<tr>
					<td colspan="2"><input style="width: 100%;border-radius: 3px;font-size: 20px;background-color: #999;" type="submit" value="SignUp" name="btn_submit2" id="btn_submit2"></td>
				</tr>
			</table>
		</form>
	</fieldset>
	<script type="text/javascript">

		document.getElementById("btn1").onclick = function () {
                document.getElementById("form1").style.display = 'block';
                document.getElementById("form2").style.display = 'none';
            };
 
            document.getElementById("btn2").onclick = function () {
                document.getElementById("form1").style.display = 'none';
                document.getElementById("form2").style.display = 'block';
            };
        
        // document.getElementById("btn_submit1").onclick = function (){
        // var hoten=document.form1.hoten.value;
        // var coquan=document.form1.coquan.value;
        // var username=document.form1.username.value;
        // var password=document.form1.password.value;
        // if(hoten=="" || coquan=="" || username=="" || password=="") {Alert("Vui lòng nhập đầy đỉ thông tin")}
    
	</script>
	<script type="text/javascript">
		$('form').btn_submit2(function(){Alert('Đăng ký thát bại');
			return false;});
	</script>
</body>

</html>