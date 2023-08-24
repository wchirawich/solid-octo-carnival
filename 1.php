<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document</title>
</head>
 
<body>
 
 
<form id="form1" name="form1" method="post" action="">
<input type="checkbox" name="i_accept" id="i_accept" />
ยอมรับเงื่อนไข 
<br />
<br />
<input type="button" name="continue_bt" id="continue_bt" value="ดำเนินการต่อ"
   disabled   onclick="alert('ok')"  />
</form>
<script type="text/javascript" src="//code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
$(function(){
     $("#i_accept").click(function(){ // เมื่อคลิกที่ checkbox id=i_accept
         if($(this).prop("checked")==true){ // ถ้าเลือก
             $("#continue_bt").removeAttr("disabled"); // ให้ปุ่ม id=continue_bt ทำงาน สามารถคลิกได้
         }else{ // ยกเลิกไม่ทำการเลือก
             $("#continue_bt").attr("disabled","disabled");  // ให้ปุ่ม id=continue_bt ไม่ทำงาน
         }
     });
});
</script>
 
</body>
</html>