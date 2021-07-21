<style>
	.thuonghieunoithat{
		padding-top:45px;
	}
	.thuonghieunoithat-content{
		background-color:#fff;
	}
	#thuonghieu-logo img{
		max-width:125px;
		height: auto;
	}
	#thuonghieu-ten{
		display:block;
		margin: 10px 0px;
	}
	#thuonghieu-ten h1{
		color: #616161;
		font-size: 16px;
		text-transform: uppercase;
		    font-weight: bold;
		
	}
	.thuonghieu-mota{
		text-align: justify;
		color:#616161;
		font-size:16px;
		margin: 20px 0px;
		display: block;
	}
	#thuonghieu-info{
	}
	#thuonghieu-slider-main{
		
	}
	.slick-prev, .slick-next {
		font-size: 0;
		line-height: 0;
		position: absolute;
		top: 50%;
		transform: translate(0%,-50%);
		display: block;
		width: 30px;
		height: 30px;
		margin-top: -10px;
		padding: 0;
		cursor: pointer;
		color: inherit;
		border: 1px solid #d7d7d7;
		outline: none;
		background: none;
	}
	.slick-prev:hover, .slick-prev:focus, .slick-next:hover, .slick-next:focus {
		color: transparent;
		outline: none;
		border-radius: inherit;
		background-color: rgba(255,255,255,0.3);
	}
	.slick-prev:before, .slick-next:before {
		font-family: 'slick';
		font-size: 20px;
		line-height: 1;
		opacity: 1;
		color: #d7d7d7;
		-webkit-font-smoothing: antialiased;
		-moz-osx-font-smoothing: grayscale;
	}
	.slick-next {
		right: 15px;
	}
	.slick-prev {
		left: 15px;
	}
	.slick-prev:before {
		    content: '';
		background-image: url(./images/slider_row_pre.png);
		width: 100%;
		height: 100%;
		display: block;
		background-repeat: no-repeat;
		background-position: center center;
	}
	.slick-next:before {
		content: '';
		background-image: url(./images/slider_row_next.png);
		width: 100%;
		height: 100%;
		display: block;
		background-repeat: no-repeat;
		background-position: center center;
	}
	#thuonghieu-title-tab{
		padding:0px;
		border-bottom: 1px solid #e1e1e1;
		margin-bottom: 30px;
	}
	#thuonghieu-title-tab span{
		font-size: 14px;
		font-weight: bold;
		display: block;
		text-align: center;
		width: max-content;
		width: -moz-max-content;
		width: -webkit-max-content;
		width: -o-max-content;
		min-width: 210px;
		color: #fff;
		background-color: #cc0000;
		padding: 7px 0px;
		text-transform: uppercase;
	}
	.thuonghieu-bkg-xam{
		background-color:#f9f9f9;
	}
	.thuonghieu-concept{
		padding: 30px;
	}
	.thuonghieu-title-concept h2{
		font-size: 16px;
		text-transform: uppercase;
		color: #616161;
		margin:0px;
		font-weight: bold;
	}
	.thuonghieu-concept .vote-star{
	    margin-top: 5px;
	}
	.thuonghieu-concept .vote-star *{
		font-size:13px;
	}
	.thuonghieu-concept .vote-star .danhgia{
		color: #636363;
	}
	.thuonghieu-diachi{
		font-size: 16px;
		color: #4a4a4a;
		text-align: justify;
		border-bottom: 1px solid #e1e1e1;
		padding: 10px 0px;
	}
	.thuonghieu-mota a{
		text-decoration: underline;
		font-style: italic;
		font-size: 13px;
	}
	.thuonghieu-thamquan a{
		background-image: url('./images/row_left_th.png');
		background-repeat:no-repeat;
		background-position: right 30px center;
		max-width:230px;
		background-color: #e1e1e1;
		display: block;
		padding: 10px 20px;
		border-radius: 20px;
		color: #cc0000;
		font-size: 12px;
		text-transform:uppercase;
		font-weight: bold;
	}
	.thuonghieunoithat .phantrang a {
		display: block;
		background: #fff;
		width: 22px;
		color: #616161;
		float: left;
		margin-left: 5px;
		border-radius: 2px;
		border:1px solid #d7d7d7;
		font-size: 11px;
	}
	.thuonghieunoithat .phantrang span {
		display: block;
		font-size: 11px;
		width: 22px;
		color: #616161;
		background: #f2f2f2;
		float: left;
		margin-left: 5px;
		border-radius: 2px;
		border:1px solid #d7d7d7;
	}
</style>


<div id='' class='thuonghieunoithat' style='background: #f2f2f2;' > 
	<div class='container thuonghieunoithat-content' id=''>
		<div class='row'>
			<div class='col-xs-12 col-sm-12 col-md-5 col-md-offset-1 col-lg-5 col-lg-offset-1' id='thuonghieu-slider-main'>
				<div class="thuonghieu-slider">
					<?php for($i=0;$i<count($slider_thuonghieu);$i++){?>
						<div>
							<img src='<?php echo _upload_sanpham.$slider_thuonghieu[$i]['photo'];?>' width='100%' title='<?php echo $thuonghieu['ten']; ?>' alt='<?php echo $thuonghieu['ten']; ?>'>
						</div>
					<?php }?>
				</div>
			</div>
			<script type="text/javascript">
			$(document).ready(function(){
				$('.thuonghieu-slider').slick({
				  dots: false,
				  infinite: true,
				  speed: 300,
				  slidesToShow: 1,
				  adaptiveHeight: true
				});
			});
			</script>
			<div class='col-xs-12 col-sm-12 col-md-5 col-lg-5' id='thuonghieu-info'>
				<div id='thuonghieu-logo'>
					<img src='<?php echo _upload_sanpham.$thuonghieu['photo']?>' title='<?php echo $thuonghieu['ten']; ?>' alt='<?php echo $thuonghieu['ten']; ?>'/>
				</div>
				<div id='thuonghieu-ten'>
					<h1><?php echo $thuonghieu['ten']; ?></h1>
				</div>
				<div class='thuonghieu-mota'>
					<?php echo $thuonghieu['mota'];?>
				</div>
			</div>
		</div>
		
		<div class='row' id=''>
			<div class='col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1' id='thuonghieu-title-tab'>
				<span>concept nội thất</span>
			</div>
			<?php 
			$dem_concept=1;
			for($i=0;$i<count($places);$i++){
			?>
			<div class='col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 thuonghieu-concept <?php if($dem_concept%2!=0){echo 'thuonghieu-bkg-xam';}?>'>
				<div class='col-xs-12 col-sm-12 col-md-6 com-lg-6' style='margin-bottom:15px;>
					<a href='place/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$places[$i]['id_tinh']);?>/<?php echo $places[$i]['tenkhongdau'];?>-<?php echo $places[$i]['id'];?>.html'>
						<img src='<?php echo _upload_sanpham.$places[$i]['photo']?>' width='100%' title='<?php echo $places[$i]['ten'] ?>' alt='<?php echo $places[$i]['ten'] ?>' />
					</a>
				</div>
				<div class='col-xs-12 col-sm-12 col-md-6 com-lg-6'>
					<div class='thuonghieu-title-concept'>
						<a href='place/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$places[$i]['id_tinh']);?>/<?php echo $places[$i]['tenkhongdau'];?>-<?php echo $places[$i]['id'];?>.html'>
							<h2><?php echo $places[$i]['ten'] ?></h2>
						</a>
					</div>
					<?php
						//thong ke vote
						$sql='select AVG(vote) as star from table_review where status=1 and id_place= '.$places[$i]['id'];
						$d->query($sql);
						$star=$d->fetch_array();
						$sql='select id from table_review where status=1 and id_place= '.$places[$i]['id'];
						$d->query($sql);
						$star_count=$d->result_array();
					?>
					<div id='' class='vote-star' > 
						<input type="hidden" class="rating" value="<?php echo $star['star']; ?>" data-readonly />
						<span class='danhgia'> <?php echo count($star_count);?> đánh giá</span>
					</div>
					<div class='thuonghieu-diachi'>
						<span><img src='./images/diadiem_th.png' title='<?php echo $places[$i]['ten'] ?>' alt='<?php echo $places[$i]['ten'] ?>' /></span> 
						<?php echo $places[$i]['diadiem'] ?>
					</div>
					<div class='thuonghieu-mota'>
						<span class='thuonghieu-mota-concept'>
						<?php echo $places[$i]['mota'] ?>
						</span>
						<a href='place/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$places[$i]['id_tinh']);?>/<?php echo $places[$i]['tenkhongdau'];?>-<?php echo $places[$i]['id'];?>.html'>xem thêm</a>
					</div>
					<div class='thuonghieu-thamquan'>
						<a href='place/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$places[$i]['id_tinh']);?>/<?php echo $places[$i]['tenkhongdau'];?>-<?php echo $places[$i]['id'];?>.html'>Tham quan và mua sắm</a>
					</div>
				</div>
				
			</div>
			<?php $dem_concept++;}?>
			<div class='col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1' style='border-top:1px solid #e1e1e1;'>
				<div class="text-left">
					<div class="text-left pagination">
						<div class="phantrang" ><?php echo $paging['paging']?></div>
					</div> 
				</div>  
			</div>
		</div>
	
	</div>
</div>
<script type="text/javascript">
var shortenP = function(options) {
    options = $.extend({
        length: 400,
        ellipsis: '...',
        moreClass: '',
        moreText: ''
    }, options);

    $('.thuonghieu-mota-concept').each(function() {

        var $p = $(this);
        var text = $p.text();
        var shortString = text.substring(0, options.length) + options.ellipsis;
        $p.data('shorttext', shortString);
        $p.data('fulltext', text);
        $p.text(shortString);
        $p.addClass('shortened');
        /*$('<a/>').attr({
            href: '#',
            'class': options.moreClass
        }).text(options.moreText).
        insertAfter($p);*/
        $p.next().click(function(e) {
            if($p.hasClass('shortened')) {
                $p.text($p.data('fulltext'));
                $p.removeClass('shortened');
            } else {
                $p.text($p.data('shorttext'));
                $p.addClass('shortened');
            }
            e.preventDefault();
        });

    });

};

$(function() {
    shortenP();
});
</script>