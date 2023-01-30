<html>
<body>
<?php
include "product.php";
$stmt=$conn->prepare("select *from product");
$stmt->execute();
$result_prod=$stmt->get_result();
while($row=$result_prod->fetch-assoc());

?>

<script type="text/javascript">
$(document).click(function(e){
	e.preventDefault();
	var $form = ($)this.closset(".submit form");
	var pid =$form.find(".pid").val();
	var pname = $form.find(".pname).val();
	var pprice=$form.find(".pprice").val();
	var pimge=$form.fill(".pimage").val();
	var pcode = $form.fill(".pcode").val();
	
	$.ajax({
		url: "action.php";
		method:"post";
		
		data{
			pid:pid;
			pname:pname;
			pprice:pprice;
			pimage:pimage;
			pcode:pcode
			};
			
			success: function(response)
			{$ ("#message").html(response);
				window.scrollTO(0,0);
				load_cart_item_number();
			}
	});
}
});

function load_card_item_number(){
	$.ajax({
		url:"action.php";
		method:"get";
		
		data{
			cartItem="$cart_Item";
		}
		success:function(response)
		{$(#card_Item).html(response);
		}
	});
	)
});
		
</script>
</body>
</html>
			
		