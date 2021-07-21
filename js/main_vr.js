	var numClick=0;
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
	function gianhang3(){
		closeTg();
		$("#popup1").toggle(200);
	}

	function tengianhang(id){
		$.ajax({
			url : './../../template_vr/sources/ten_gianhang_ajax.php',
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
			url : './../../template_vr/sources/gianhang_ajax.php',
			type : 'post',
			dataType : 'text',
			data:{
				id: id,
				},
			success : function (result){
				$('.all_sp_gianhang').html(result);
			},
			complete:function (result){
				
			}

		});
	}
	function giohang(){
		closeTg();
		uploadgiohang();
		capnhatslsp();
		$("#popup2").toggle(200);
	}
	function giohangconcept(){
		closeTg();
		uploadgiohangconcept();
		
		$("#popup5").toggle(200);
	}
	function datmua_concept(){
			$("#popup5").toggle(200);
			  $.ajax({
					url : './../../template_vr/sources/concept_datmua_ajax.php',
					type : 'post',
					dataType : 'text',
					data:{
						
					},
						success : function (result){
						
								giohang();
						}
					});

		
	}
	function macdinh_concept(){
		
		   $.ajax({
					url : './../../template_vr/sources/concept_macdinh_ajax.php',
					type : 'post',
					dataType : 'text',
					data:{
						
					},
						success : function (result){
						
							uploadgiohangconcept();
						}
					});
		
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
		/*$('.'+clregular+'-for').slick({
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
		});*/
	}
	function showMenuAndCart(){
		$('.Cart_big').show(200);
		$('.Menu_big').show(200);
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
		a = a.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
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
			url : './../../template_vr/sources/cart_ajax.php',
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
			url : './../../template_vr/sources/cart_ajax.php',
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
			url : './../../template_vr/sources/cart_ajax.php',
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
		var dienthoai=$('#dienthoai').val();
		var ghichu=$('#ghichu').val();
		if(hoten!='' && diachi!='' && email!=''){
			$.ajax({
				url : './../../template_vr/sources/dathang.php',
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
						showMenuAndCart();
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
			url : './../../template_vr/sources/chitietsanpham.php',
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
				$(".scorll-chitiet").css({"height": returnHeightBrowser+'px'});
				$(".scorll-chitiet").css({"max-height": 380+'px'});
				eval(slider_chitietsp("regular2"));
			}
		});
	}
	function capnhatslsp(){
		$.ajax({
			url : './../../template_vr/sources/cart_ajax.php',
			type : 'post',
			dataType : 'text',
			data:{
				act:'get_total_cart',
				},
			success : function (result){
				$('.capnhatslsp').html(result);
				var x=parseInt(document.getElementsByClassName('capnhatslsp')[0].innerHTML);

				if(x>0){
					$(".icon_giohang").attr("src", "./../../template_vr/images/cart_2_1.png");
				}
				else{
					$(".icon_giohang").attr("src", "./../../template_vr/images/cart_2_1.png");
				}
			}
		});
	}

	function uploadgiohangconcept(){
		var mobile="<?php echo $mobile;?>";
		$.ajax({
			url : './../../template_vr/sources/giohangconcept_ajax.php',
			type : 'post',
			dataType : 'text',
			data:{
				mobile: mobile
			},
			success : function (result){
				$('.sanphamconcept').html(result);
				capnhatgiatienconcept();
			}
		});
	} 
	function uploadgiohang(){
		var mobile="<?php echo $mobile;?>";
		$.ajax({
			url : './../../template_vr/sources/giohang_ajax.php',
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
			url : './../../template_vr/sources/giohang2_ajax.php',
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
	
	function capnhatgiatienconcept(){
		var slsp=$(".sanphamconcept").find('#tongtienconcept').val();
	
		document.getElementById("thanhtienconcept").innerHTML=format_curency_money(slsp.toString())+" VNĐ.";
	}
	
	//login
	function dangnhap(){
		var user=$('#user').val();
		var password1=$('#password1').val();
		if(validateEmail(user)){
			$.ajax({
				url : './../../template_vr/sources/dangnhap_ajax.php',
				type : 'post',
				dataType : 'text',
				data:{
					email: user,
					password1: password1
				},
				success : function (result){
					if(result == 'true'){
						setTimeout(location.reload(),3000);
					}
					else{
						alert('dang nhap that bai');
					}
				}
			});
		}
		else{
			alert('Vui lòng nhập đúng email');
		}
	}
	//chech email
	function validateEmail(email) {
		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return re.test(email);
	}
	
	$( document ).ready(function(){
		uploadgiohang();
		window.onload = function(){
			
			
			if(id_sp_vr>0){
				chitietsp(id_sp_vr);
			}
			if(id_dm_vr>0){
				gianhang(id_dm_vr);
			}
	
			if(o_ThanhToan==1){
				thanhtoan_tab();
				$.ajax({
					url : './../../template_vr/sources/set_session.php',
					type : 'post',
					dataType : 'text',
					data:{
						val_session: 0,
						},
					success : function (result){}
				});
			}
		}
		
		
		//Danh mục menu giới thiệu
		
		$(".icon_menu_gioithieu").click(function(){
			element=$(this);
			if(numClick==0){
				numClick=1;
				element.parent().parent().find(".menu_gioithieu").addClass('active_menuGioiThieu');
				closeTg();
			}
			else{
				numClick=0;
				//element.parent().parent().find(".danhmucmenu").removeClass("select_menu_gioithieu");
				//element.parent().parent().find(".content_gioithieu").hide(200);
				element.parent().parent().parent().parent().find(".menu_gioithieu").removeClass('active_menuGioiThieu');
				
				closeTg();
				showMenuAndCart();
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
				url : './../../template_vr/sources/cart_ajax.php',
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
				url : './../../template_vr/sources/cart_ajax.php',
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
		$(".gianhang3").on("click","#dangnhap", function( e ){
			dangnhap();
		});
		$(".gianhang3").on("click",".dathang2", function( e ){
			
			var slsp=$(this).parent().parent().parent().parent().parent().parent().find('#spluongsp').val();
			
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

	
		$(".sanphamconcept").on("input",".soluongconcept", function( e ){
			var id=$(this).data('id');
			var number=$(this).val();
		
			        $.ajax({
					url : './../../template_vr/sources/concept_ajax.php',
					type : 'post',
					dataType : 'text',
					data:{
						idsp: id,
						number: number,
						act: 'change_number'
					},
						success : function (result){
							uploadgiohangconcept();
							
						}
					});
		    	
			
		    
    		e.stopPropagation();
		});


		$(".item_giohang").on("input",".soluong", function( e ){
			var id=$(this).data('id');
			var number=$(this).val();
			if(!isNaN(number)){
			if(number>0){
			        $.ajax({
					url : './../../template_vr/sources/cart_ajax.php',
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
			}
			else{
				$(this).val("1");
				var number=$(this).val();
				if(number>0){
			        $.ajax({
					url : './../../template_vr/sources/cart_ajax.php',
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


		

		$("#thongtinchitietsp").on("click",".mau3d", function(e){
			
			data = Object();
			data.id = $(this).data('id');
			mau3d(data.id);
			$.ajax({
				url : './../../template_vr/sources/mau3d_ajax.php',
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