<?php
	
	$d->reset();
	$sql_product_danhmuc="select ten$lang as ten,tenkhongdau,id from #_product_danhmuc where hienthi=1 order by stt,id desc";
	$d->query($sql_product_danhmuc);
	$product_danhmuc=$d->result_array();
	
	$d->reset();
	$sql="select ten$lang,tenkhongdau,id from #_news where hienthi=1  and type='gioithieu' order by stt,id desc";
	$d->query($sql);
	$tintuc_danhmuc=$d->result_array();
	
?>
<!--Hover menu-->
<script language="javascript" type="text/javascript">
	$(document).ready(function() { 
		$("#menu ul li").hover(function(){
			$(this).find('ul:first').css({visibility: "visible",display: "none"}).show(300); 
			},function(){ 
			$(this).find('ul:first').css({visibility: "hidden"});
			}); 
		$("#menu ul li").hover(function(){
				$(this).find('>a').addClass('active2'); 
			},function(){ 
				$(this).find('>a').removeClass('active2'); 
			}); 
	});  
</script>
<!--Hover menu-->
<div class="main_page">
<ul>	
    <li><a class="<?php if((!isset($_REQUEST['com'])) or ($_REQUEST['com']==NULL) or $_REQUEST['com']=='index') echo 'active'; ?>" href="index.html"><?=_trangchu?></a></li>
    <li class="line"></li>
    <li><a class="<?php if($_REQUEST['com'] == 'gioi-thieu') echo 'active'; ?>" href="gioi-thieu.html"><?=_gioithieu?></a>
		<ul>
			<?php for($i = 0, $count_tintuc_danhmuc = count($tintuc_danhmuc); $i < $count_tintuc_danhmuc; $i++){ ?>
				<li><a href="gioi-thieu/<?=$tintuc_danhmuc[$i]['tenkhongdau']?>-<?=$tintuc_danhmuc[$i]['id']?>.html"><?=$tintuc_danhmuc[$i]['ten'.$lang]?></a></li>
            <?php } ?>
        </ul>
	</li>
    <li class="line"></li>
    <li><a class="<?php if($_REQUEST['com'] == 'san-pham') echo 'active'; ?>" href="san-pham.html"><?=_sanpham?></a>
    	<ul>
			<?php for($i = 0, $count_product_danhmuc = count($product_danhmuc); $i < $count_product_danhmuc; $i++){ ?>
            <li><a href="san-pham/<?=$product_danhmuc[$i]['tenkhongdau']?>-<?=$product_danhmuc[$i]['id']?>"><?=$product_danhmuc[$i]['ten']?></a>
                <ul>
                        <?php	
                            $d->reset();
                            $sql_product_list="select ten$lang as ten,tenkhongdau,id from #_product where hienthi=1 and id_danhmuc='".$product_danhmuc[$i]['id']."' order by stt,id desc";
                            $d->query($sql_product_list);
                            $product_list=$d->result_array();															
                        ?>
                         <?php for($j = 0, $count_product_list = count($product_list); $j < $count_product_list; $j++){ ?>
                                <li><a href="san-pham/<?=$product_list[$j]['tenkhongdau']?>-<?=$product_list[$j]['id']?>.html"><?=$product_list[$j]['ten']?></a>
                                    
                                </li>
                         <?php } ?>
                 </ul>
                </li>
                <?php } ?>
            </ul>	
    </li>
    <li class="line"></li>
    <li><a class="<?php if($_REQUEST['com'] == 'tin-tuc') echo 'active'; ?>" href="tin-tuc.html"><?=_tintuc?></a></li>
    <li class="line"></li>
    <li><a class="<?php if($_REQUEST['com'] == 'ho-tro') echo 'active'; ?>" href="ho-tro.html"><?=_hotrotructuyen?></a></li>
    <li class="line"></li>
    <li><a class="<?php if($_REQUEST['com'] == 'lien-he') echo 'active'; ?>" href="lien-he.html"><?=_lienhe?></a></li>
</ul>
</div>
<div id="search">
    <input type="text" name="keyword" id="keyword" onKeyPress="doEnter(event,'keyword');" value="<?=_nhaptukhoatimkiem?>..." onclick="if(this.value=='<?=_nhaptukhoatimkiem?>...'){this.value=''}" onblur="if(this.value==''){this.value='<?=_nhaptukhoatimkiem?>...'}">
    <img src="images/i_search.png" alt="<?=_timkiem?>" style="cursor:pointer;" onclick="onSearch(event,'keyword');" />
</div><!--END #search-->