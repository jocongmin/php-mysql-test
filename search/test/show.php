<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>show</title>
		<style type="text/css">
			.contrl{
				margin-bottom: 20px;
			}
		</style>
		<script src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-2.1.4.min.js"></script>
	</head>
	<body>
		<table width='1200px' border="1">
			<thead>
				<tr>
					<th><input type="text" class="cdit z-one" name="z-one"></th>
					<th><input type="text" class="cdit z-two" name="z-two"></th>
					<th><input type="text" class="cdit z-three" name="z-three"></th>
					<th><input type="text" class="cdit z-four" name="z-four"></th>
					<th><input type="text" class="cdit z-five" name="z-five"></th>
				</tr>
				<tr class="ziduan">
					<th>name</th>
					<th>place</th>
					<th>contry</th>
					<th>area</th>
					<th>word</th>
				</tr>
			</thead>
			<tbody>
				
			</tbody>
		</table>
	</body>
	<script type="text/javascript">
		var search=()=>{
			var cdit={};
			var zOne=$('.z-one').val().replace(/\s/g, "").toString();
			var zTwo=$('.z-two').val().replace(/\s/g, "").toString();
			var zThree=$('.z-three').val().replace(/\s/g, "").toString();
			var zFour=$('.z-four').val().replace(/\s/g, "").toString();
			var zFive=$('.z-five').val().replace(/\s/g, "").toString();
			cdit.z_one=zOne;
			cdit.z_two=zTwo;
			cdit.z_three=zThree;
			cdit.z_four=zFour;
			cdit.z_five=zFive;
			console.log(cdit)
			$.ajax({
				url:'/test/search.php',
				type:'POST',
				data:cdit,
				success:function(res){
					var allData=JSON.parse(res);
					console.log(allData);
					var html;
					for(var i=0;i<allData.length;i++){
								var s=allData[i];
								html+="<tr>"+
										"<th>"+s.name+"</th>"+
										"<th>"+s.place+"</th>"+
										"<th>"+s.contry+"</th>"+
										"<th>"+s.area+"</th>"+
										"<th>"+s.word+"</th>"+
									"</tr>";
							}
							
							$('tbody').html(html);
						},
						error:function(err){
							console.log('err')
						}
					})
		}
		$('.cdit').keyup(function(){
					search()
				})
		$(()=>{
			search()
		})
		</script>
	</html>