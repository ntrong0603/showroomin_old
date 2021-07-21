	function gianhang(id){	
		tengianhang(id);
		sp_gianhang(id);
		capnhatslsp();
		closeTg();
		$("#popup1").toggle(200);
	}
	
	function slider(id){
		var clregular=document.getElementById(id).className;
		$("."+clregular).slick({
			infinite: true,
			slidesToShow: 3,
			slidesToScroll: 3,
			arrows: false,
			dots:false,
			autoplay: true,
  			autoplaySpeed: 5000
		});
	}

	function gianhang2(){
		var x=parseInt(document.getElementById("id_dm_ct").innerHTML);
		gianhang(x);
		
	}

	function tengianhang(id){
		$.ajax({
			url : 'sources_giohang/ten_gianhang_ajax.php',
			type : 'post',
			dataType : 'text',
			data:{
				id: id,
				},
			success : function (result){
				$('.title_gianhang').html(result);
			}
		});
	}
	
	function sp_gianhang(id){
		$.ajax({
			url : 'sources_giohang/gianhang_ajax.php',
			type : 'post',
			dataType : 'text',
			data:{
				id: id,
				},
			success : function (result){
				$('.all_sp_gianhang').html(result);
			},
			complete:function (result){
				slider("regular1");
			}

		});
	}
	function giohang(){
		closeTg();
		uploadgiohang();
		capnhatslsp();
		$("#popup2").toggle(200);
	}
	function thanhtoan(){
		closeTg();
		$("#popup3").toggle(200);
	}
	function mau3d(id){
		uploadgiohang2();
		$("#popup5").toggle(200);
	}

	function gioithieu(){
		uploadgiohang2();
		closeTg();
		$("#popup6").toggle(200);
	}

	function chinhsachgiaohang(){
		uploadgiohang2();
		closeTg();
		$("#popup7").toggle(200);
	}

	function lienhe(){
		uploadgiohang2();
		closeTg();
		$("#popup8").toggle(200);
	}

	function thanhtoan_tab(){
		var sl=$(".capnhatslsp").html();
		if(sl>0){
			closeTg();
			uploadgiohang2();
			$("#popup3").toggle(200);
		}
		else{
			alert("Bạn chưa chọn mua sản phẩm!");
		}
	}

	function chitietsp(id){
		get_info_sp(id);
		capnhatslsp();
		closeTg();
		$("#popup4").toggle(200);
	}
	function chitietsp2(){
		capnhatslsp();
		closeTg();
		$("#popup4").toggle(200);
	}
	function slider_chitietsp(id){
		var clregular=document.getElementById(id).className;
		$('.'+clregular+'-for').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			autoplay: true,
  			autoplaySpeed: 5000,
			fade: true,
			asNavFor: '.'+clregular+'-nav'
		});
		$('.'+clregular+'-nav').slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			asNavFor: '.'+clregular+'-for',
			dots: false,
			arrows: false,
			centerMode: true,
			focusOnSelect: true
		});
	}
	function showMenuAndCart(){
		$('.Cart_big').show(200);
		$('.Menu_big').show(200);
	}
	function openLoadLogo(){
		closeTg();
		$('#loadpano').show();
	}
	function closeLoadLogo(){
		$('#loadpano').hide();
	}
	function closeTg(){
		$("#popup1").hide(200);
		$("#popup2").hide(200);
		$("#popup3").hide(200);
		$("#popup4").hide(200);
		$("#popup5").hide(200);
		$("#popup6").hide(200);
		$("#popup7").hide(200);
		$("#popup8").hide(200);
		$('.Cart_big').hide(200);
		$('.Menu_big').hide(200);
	}
	//dinh dang chuoi gia tien 1,000,000
	function format_curency_money(a) {
		a = a.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
		return a;
	}
	function dis_format_curency_money(a) {
		a = a.replace(/,/gi, "");
		return a;
	}
	//
	
	function xoa_sp(id){
		var r = confirm("Bạn chắc chắn muốn xóa sản phẩm này?");
	    if (r == true) {
	        $.ajax({
			url : 'sources_giohang/cart_ajax.php',
			type : 'post',
			dataType : 'text',
			data:{
				idsp: id,
				act: 'delete_cart_item'
			},
				success : function (result){
					uploadgiohang();
					alert("Xóa hàng thành công");
					capnhatslsp();
				}
			});
	    }
	}
	/*function huy_giohang2(){
	        $.ajax({
			url : 'sources_giohang/cart_ajax.php',
			type : 'post',
			dataType : 'text',
			data:{
				act: 'cart_destroy'
			},
				success : function (result){
					uploadgiohang();
					alert("Hủy giỏ hàng thành công");
					capnhatslsp();
				}
			});
	}*/
	function huy_giohang(){
		var r = confirm("Bạn chắc chắn muốn hủy giỏ hàng?");
	    if (r == true) {
	        $.ajax({
			url : 'sources_giohang/cart_ajax.php',
			type : 'post',
			dataType : 'text',
			data:{
				act: 'cart_destroy'
			},
				success : function (result){
					uploadgiohang();
					alert("Hủy giỏ hàng thành công");
					capnhatslsp();
				}
			});
	    }
	}
	function thanhtoan2(){
		var hoten=$('#hoten').val();
		var diachi=$('#diachi').val();
		var email=$('#email').val();
		var dienthoai=$('#sodienthoai').val();
		var ghichu=$('#ghichu').val();
		if(hoten!='' && diachi!='' && email!=''){
			$.ajax({
				url : 'sources_giohang/dathang.php',
				type : 'post',
				dataType : 'text',
				data:{
					hoten: hoten,
					diachi: diachi,
					dienthoai: dienthoai,
					email: email,
					ghichu: ghichu
				},
				success : function (result){
					if(result=="true"){
						alert("Đặt hàng thành công");
						uploadgiohang();
						$("#popup3").hide(200);
					}
					else{
						alert("Gửi yêu cầu thất bại");
					}
					
				}
			});
		}
		else{
			alert("Quý khách vui lòng điền đầy đủ thông tin vào các trường có dấu (*)")
		}
	}
	
	function get_info_sp(id){
		$.ajax({
			url : 'sources_giohang/chitietsanpham.php',
			type : 'post',
			dataType : 'text',
			data:{
				id: id,
				},
			success : function (result){
				$('#thongtinchitietsp').html(result);
			},
			complete:function (){
				var heightBrowser=$(document).height();
				var returnHeightBrowser=((heightBrowser*65)/100);
				$(".scorll-chitiet").css({"height": returnHeightBrowser});
				eval(slider_chitietsp("regular2"));
			}
		});
	}
	function capnhatslsp(){
		$.ajax({
			url : 'sources_giohang/cart_ajax.php',
			type : 'post',
			dataType : 'text',
			data:{
				act:'get_total_cart',
				},
			success : function (result){
				$('.capnhatslsp').html(result);
				var x=parseInt(document.getElementsByClassName('capnhatslsp')[0].innerHTML);

				if(x>0){
					$(".icon_giohang").attr("src", "./images/cart_2_3.png");
				}
				else{
					$(".icon_giohang").attr("src", "./images/cart_2_1.png");
				}
			}
		});
	}

	function uploadgiohang(){
		var mobile="<?php echo $mobile;?>";
		$.ajax({
			url : 'sources_giohang/giohang_ajax.php',
			type : 'post',
			dataType : 'text',
			data:{
				mobile: mobile
			},
			success : function (result){
				$('.item_giohang').html(result);
				capnhatgiatien();
				capnhatslsp();
			}
		});
	}
	function uploadgiohang2(){
		var mobile="<?php echo $mobile;?>";
		$.ajax({
			url : 'sources_giohang/giohang2_ajax.php',
			type : 'post',
			dataType : 'text',
			data:{
				mobile: mobile
			},
			success : function (result){
				$('.item_giohang2_tt').html(result);
				capnhatgiatien();
				capnhatslsp();
			}
		});
	}
	function capnhatgiatien(){
		
		var slsp=$(".item_giohang").find('#tongtien').val();
		document.getElementById("tamtinh").innerHTML=format_curency_money(slsp.toString())+" VNĐ.";
		document.getElementById("thanhtien").innerHTML=format_curency_money(slsp.toString())+" VNĐ.";
	}
	function setWidthGianHang(width, height){
		var widthBrowser=$(document).width();
		var returnWisthBrowser=(widthBrowser*width)/100;
		var heightBrowser=$(document).height();
		var returnHeightBrowser=(heightBrowser*height)/100;
		var returnHeightGioHang=(heightBrowser*(height-10))/100;
		$(".gianhang").css({"width": returnWisthBrowser});
		$(".gianhang").css({"min-height": returnHeightBrowser});
		$(".fix-scorll-ball").css({"height": returnHeightGioHang});
	}
	
	$( document ).ready(function(){
		uploadgiohang();
		//Danh mục menu giới thiệu
		var numClick=0;
		$(".icon_menu_gioithieu").click(function(){
			element=$(this);
			if(numClick==0){
				numClick=1;
				element.parent().parent().find(".menu_gioithieu").toggle(200);
			}
			else{
				numClick=0;
				element.parent().parent().find(".danhmucmenu").removeClass("select_menu_gioithieu");
				element.parent().parent().find(".content_gioithieu").hide(200);
				element.parent().parent().find(".menu_gioithieu").hide(200);
			}
		});
		$(".danhmucmenu").click(function(){
			//$(this).parent().find(".content_gioithieu").hide(200);
			element=$(this);
			thongtingioithieu=element.find(".content_gioithieu");
			if(thongtingioithieu.css("display")=="none"){
				
				element.parent().find(".content_gioithieu").hide(200);
				element.parent().find(".danhmucmenu").removeClass("select_menu_gioithieu");

				element.addClass("select_menu_gioithieu");
				thongtingioithieu.toggle(200);
			}
			else{
				element.removeClass("select_menu_gioithieu");
				thongtingioithieu.hide(200);
			}
		});
		//Các nút close
		$('.x').click(function(){
			closeTg();
			showMenuAndCart();
		});
		$('.x2').click(function(){
			closeTg();
			showMenuAndCart();
		});
		$('.x3').click(function(){
			$("#popup5").hide(200);
		});
		//Thêm sản phẩm vào giỏ hàng khi click vào nút mua ngay
		$(".all_sp_gianhang").on('click', '.bt-cart', function(e) {
			data = Object();
			data.number = 1;
			data.id = $(this).data('id');
			$.ajax({
				url : 'sources_giohang/cart_ajax.php',
				type : 'post',
				dataType : 'text',
				data:{
					idsp: data.id,
					number: 1,
					act: 'add_cart_item'
				},
				success : function (result){
					uploadgiohang();
					capnhatslsp();
					giohang();
				}
			});
			e.stopPropagation();
		});

		$("#thongtinchitietsp").on("click",".bt-cart2", function(e){
			data = Object();
			data.number = $(this).parent().parent().parent().parent().find('#soluongmua').val();
			data.id = $(this).data('id');
			$.ajax({
				url : 'sources_giohang/cart_ajax.php',
				type : 'post',
				dataType : 'text',
				data:{
					idsp: data.id,
					number: data.number,
					act: 'add_cart_item'
				},
				success : function (result){
					uploadgiohang();
					capnhatslsp();
					giohang();
				}
			});
			e.stopPropagation();
		});
		//Đến trang chi tiết sản phẩm khi click vào nút xem chi tiết
		$(".all_sp_gianhang").on('click', '.xemchitiet', function(e) {
			chitietsp($(this).data('id'));
			e.stopPropagation();
		});
		$(".item_giohang").on('click', '.xemchitiet', function(e) {
			chitietsp($(this).data('id'));
			e.stopPropagation();
		});

		$(".gianhang2").on("click","#thanhtoan", function( e ){
			var slsp=$(this).parent().parent().parent().parent().find('#spluongsp').val();
			if(slsp>0){
				thanhtoan();
				capnhatslsp();
			}
			else{
				alert("Bạn chưa chọn mua sản phẩm nào");
				$("#popup2").hide(200);
			}
			e.stopPropagation();
		});

		$(".gianhang3").on("click",".dathang2", function( e ){
			
			var slsp=$(this).parent().parent().parent().parent().find('#spluongsp').val();
			
			if(slsp>0){
				thanhtoan2();
				capnhatslsp();
			}
			else{
				alert("Bạn chưa chọn mua sản phẩm nào");
				$("#popup3").hide(200);
			}
			e.stopPropagation();
		});

		$(".item_giohang").on("click",".btn_add", function( e ){
			var id=$(this).data('id');
			var number= parseInt($(this).parent().find(".soluong").val())+1;	
				if(number>0){
			        $.ajax({
					url : 'sources_giohang/cart_ajax.php',
					type : 'post',
					dataType : 'text',
					data:{
						idsp: id,
						number: number,
						act: 'change_number'
					},
						success : function (result){
							uploadgiohang();
							capnhatslsp();
						}
					});
		    	}
		    	else{
		    		$(this).val("1");
		    		var number= parseInt($(this).parent().find(".soluong").val());
		    		if(number>0){
			        $.ajax({
					url : 'sources_giohang/cart_ajax.php',
					type : 'post',
					dataType : 'text',
					data:{
						idsp: id,
						number: number,
						act: 'change_number'
					},
						success : function (result){
							uploadgiohang();
							capnhatslsp();
						}
					});}
			    	alert("Sản phẩm phải có số lượng lớn hơn hoặc bằng 1");
			    }

		    
    		e.stopPropagation();
		});
		$(".item_giohang").on("keyup",".soluong", function( e ){
			var id=$(this).data('id');
			var number=$(this).val();
			if(!isNaN(number)){
			if(number>0){
			        $.ajax({
					url : 'sources_giohang/cart_ajax.php',
					type : 'post',
					dataType : 'text',
					data:{
						idsp: id,
						number: number,
						act: 'change_number'
					},
						success : function (result){
							uploadgiohang();
							capnhatslsp();
						}
					});
		    	}
		    	else{
		    		$(this).val("1");
		    		var number= parseInt($(this).parent().find(".soluong").val());
		    		if(number>0){
			        $.ajax({
					url : 'sources_giohang/cart_ajax.php',
					type : 'post',
					dataType : 'text',
					data:{
						idsp: id,
						number: number,
						act: 'change_number'
					},
						success : function (result){
							uploadgiohang();
							capnhatslsp();
						}
					});}
			    	alert("Sản phẩm phải có số lượng lớn hơn hoặc bằng 1");
			    }
			}
			else{
				$(this).val("1");
				var number=$(this).val();
				if(number>0){
			        $.ajax({
					url : 'sources_giohang/cart_ajax.php',
					type : 'post',
					dataType : 'text',
					data:{
						idsp: id,
						number: number,
						act: 'change_number'
					},
						success : function (result){
							uploadgiohang();
							capnhatslsp();
						}
					});
		    	}
				alert("Chỉ được nhập số");
			}

		    
    		e.stopPropagation();
		});
		$(".item_giohang").on("click",".btn_sub", function( e ){

			var id=$(this).data('id');
			var number= parseInt($(this).parent().find(".soluong").val())-1;	
				if(number>0){
			        $.ajax({
					url : 'sources_giohang/cart_ajax.php',
					type : 'post',
					dataType : 'text',
					data:{
						idsp: id,
						number: number,
						act: 'change_number'
					},
						success : function (result){
							uploadgiohang();
							capnhatslsp();
						}
					});
		    	}
		    	else{
		    		$(this).val("1");
		    		var number= parseInt($(this).parent().find(".soluong").val());
		    		if(number>0){
			        $.ajax({
					url : 'sources_giohang/cart_ajax.php',
					type : 'post',
					dataType : 'text',
					data:{
						idsp: id,
						number: number,
						act: 'change_number'
					},
						success : function (result){
							uploadgiohang();
							capnhatslsp();
						}
					});}
			    	alert("Sản phẩm phải có số lượng lớn hơn hoặc bằng 1");
			    }

		    
    		e.stopPropagation();
		});


		

		$("#thongtinchitietsp").on("click",".mau3d", function(e){
			
			data = Object();
			data.id = $(this).data('id');
			mau3d(data.id);
			$.ajax({
				url : 'sources_giohang/mau3d_ajax.php',
				type : 'post',
				dataType : 'text',
				data:{
					idsp: data.id
				},
				success : function (result){
					$('.ajax_mau3d').html(result);
				}
			});
			
			e.stopPropagation();
		});

		$("#thongtinchitietsp").on("change","#soluongmua", function(e){
			var soluong =$(this).val();
			var gia=$(this).parent().parent().parent().parent().find('.giagoc').data('gia');
			var tong=soluong*gia;
			$(this).parent().parent().parent().parent().find('.price-tong').html(format_curency_money(tong.toString())+" VNĐ.");
		});

		$(".item_giohang").on("click",".muathem", function( e ){
			giohang();
    		e.stopPropagation();
		});
	});