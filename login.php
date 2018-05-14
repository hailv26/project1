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
	<title>Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
	<div class="header" style="height: 100px;background-color: orange;">
		<form class="form-inline" style="float: right;margin-top: 50px;">
      		<input class="form-control mr-sm-2" type="search" placeholder="Username" aria-label="Search">
      		<input class="form-control mr-sm-2" type="search" placeholder="Password" aria-label="Search">
      		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Đăng Nhập</button>
    	</form>
	</div>
	<div id="form" class="noidung mt-2 form-control" style="width: 525px;border: 2px solid #999;margin: auto;border-radius: 10px">
		<p class="mt-2 font-weight-bold" align="center" style="font-size: 25px" ;">
			Đăng ký tài khoản
			<input id="btn1" class="btn btn-outline-success" type="button" value="Người dùng" name="">
			<input id="btn2" class="btn btn-outline-success" type="button" value="Quản lý" name="">
		</p>
		<hr class="mt-1">
		<form name="form1" id="form1">
		<div class="row">
			<div class="col-4"><label class="form-control" style="border: 0;">Họ tên:</label></div>
			<div class="col-8"><input class="border form-control" type="text" name=""></div>
			<div class="col-4"><label class="form-control" style="border: 0;">Ngày sinh:</label></div>
			<div class="col-8"><input class="border form-control" type="text" name=""></div>
			<div class="col-4"><label class="form-control" style="border: 0;">Giới tính:</label></div>
			<div class="col-8">
				<select class="form-control">
					<option>--Chọn giới tính--</option>
					<option>Nam</option>
					<option>Nữ</option>
				</select>
			</div>
			<div class="col-4"><label class="form-control" style="border: 0;">Dân tộc:</label></div>
			<div class="col-8"><input class="border form-control" type="text" name=""></div>
			<div class="col-4"><label class="form-control" style="border: 0;">Quốc tịch:</label></div>
			<div class="col-8">
				<select class="form-control">
					<option>--Chọn quốc tịch--</option>
					<option>Việt nam</option>
				</select>
			</div>
			<div class="col-4"><label class="form-control" style="border: 0;">Số CMTND:</label></div>
			<div class="col-8"><input class="border form-control" type="text" name=""></div>
			<div class="col-4"><label class="form-control" style="border: 0;">Tỉnh/ Thành phố:</label></div>
			<div class="col-8">
				<select class="form-control">
					<option>--Chọn Tỉnh/Thành phố--</option>
					<?php
							$sqll="SELECT provinceid,name FROM `tb_tinh`";
							$query=mysqli_query($conn, $sqll);
							while ($data= mysqli_fetch_array($query)) {
								echo '<option value="'.$data["provinceid"].'">'.$data["name"].'</option>';
							}
							 ?>
				</select>
			</div>
			<div class="col-4"><label class="form-control" style="border: 0;">Quận/Huyện:</label></div>
			<div class="col-8">
				<select class="form-control">
					<option>--Chọn Quận/Huyện--</option>
					<option>Việt Nam</option>
				</select>
			</div>
			<div class="col-4"><label class="form-control" style="border: 0;">Phường/Xã:</label></div>
			<div class="col-8">
				<select class="form-control">
					<option>--Chọn Phường/Xã--</option>
					<option>Việt Nam</option>
				</select>
			</div>
			<div class="col-4"></div>
			<div class="col-8"><input id="btn1" class="btn btn-outline-success" style="width: 100%; font-size: 20px;" type="submit" value="Sign Up" name=""></div>
		</div>
		</form>
		<form name="form2" id="form2" style="display: none">
		<div class="row">
			<div class="col-4"><label class="form-control" style="border: 0;">Họ tên:</label></div>
			<div class="col-8"><input class="border form-control" type="text" name=""></div>
			<div class="col-4"><label class="form-control" style="border: 0;">Cơ quan:</label></div>
			<div class="col-8"><input class="border form-control" type="text" name=""></div>
			<div class="col-4"><label class="form-control" style="border: 0;">Username:</label></div>
			<div class="col-8"><input class="border form-control" type="text" name=""></div>
			<div class="col-4"><label class="form-control" style="border: 0;">Password:</label></div>
			<div class="col-8"><input class="border form-control" type="password" name=""></div>
			
			<div class="col-4"></div>
			<div class="col-8"><input id="btn2" class="btn btn-outline-success" style="width: 100%; font-size: 20px;" type="submit" value="Sign Up" name=""></div>
		</div>
		</form>
	</div>
</body>
</html>
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