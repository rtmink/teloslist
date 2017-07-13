<?php 
include 'djajamarsum/has_ie_ratu/hasieratu.php';

$page_title = 'Search &bull; Teloslist';

include 'djajamarsum/template/header.php';
?>

<div id="mainSearch">
	<?php
    if (!isset($_GET['f']) || empty($_GET['f'])) {
        header('Location: /');
        exit();
    }
    // People
    if (isset($_GET['f']) && !empty($_GET['f']) && isset($_GET['or']) && !empty($_GET['or']) && $_GET['or'] == 'people') { 
		$x = check_values2($_GET['f']);	
		$terms = explode(" ", $x);
		$term = searchPeople($terms);       
    ?>
        <ul class="dlm">
            <div id="dlmLine">
                <li><a href="<?php echo str_replace('&or=people','',curPgURL());?>">Posts</a></li>
                <li class="dlm_last-child"><a id="dlmCurrent" href="<?php echo curPgURL();?>">People</a></li>
                <div class="clear"></div>
            </div>
        </ul> 
        <div class="boxShadow" id="mainSearchPpl">
            <?php
            if (empty($term)) {
            ?>
                <p class="noResults">No results for <?php echo $x; ?></p>
            <?php	
            } else {
            ?>	
                <ul>
                    <?php
                    foreach ($term as $kw) {
                        $imgs = show_profile_imgs($kw['id']); 
                        $image_file = '<img src="/xxx/';
                        if (empty($imgs)) {
                            $image_file .= 'img/prof.gif" />';			
                        } else {
                            foreach ($imgs as $img) {
                                $image_file .= 'uploads/p_img/pro/'.$img['name'].'.'.$img['ext'].'" alt="" />'; 
                            }
                        }
                        ?>
                        <li id="searchPeople">
                            <a href="u/<?php echo $kw['username']; ?>"><?php echo $image_file; ?></a>
                            <h3><a href="u/<?php echo $kw['username']; ?>"><?php echo $kw['fullname']; ?></a></h3>
                            <div class="clear"></div>
                        </li>            
                        <?php
                    }
                    ?>
                </ul>
                <?php
            }
            ?>
        </div>
    <?php
    // DGA	
    } else if (isset($_GET['f']) && !empty($_GET['f']) && !isset($_GET['or']) && empty($_GET['or'])) {  
        $x = check_values2($_GET['f']);
		$terms = explode(" ", $x);
        $term = search($terms);
    ?>	
        <ul class="dlm">
            <div id="dlmLine">
                <li><a id="dlmCurrent" href="<?php echo str_replace('&or=people','',curPgURL());?>">Posts</a></li>
                <li class="dlm_last-child"><a href="<?php echo curPgURL().'&or=people';?>">People</a></li>
                <div class="clear"></div>
            </div>
        </ul>
    	<?php	
        if (empty($term)) {
		?>
            <p class="noResults">No results for <?php echo $x; ?></p>
        <?php
        } else { 
        ?>
            <ul class="dga_post" id="dga_search">
				<?php
                foreach ($term as $kw) {    
                    $show_dga_imgs = show_dga_imgs($kw['id'], $kw['user_id']);
                    if (empty($show_dga_imgs)) { 
                        $classes = 'smDGAImg1';
                        $image = '';    
                    } else {  
                        foreach ($show_dga_imgs as $show_dga_img) {
                        
                            $image_file = 'xxx/uploads/dga_img/sm/'.$show_dga_img['name'].'.'.$show_dga_img['ext'];
                            $image = '<span><a href="/'.$kw['type'].'?x='.$kw['id'].'"><img src="'.$image_file.'" /></a></span>';
                            
                            if ($show_dga_img['width'] < 222) {
                                $classes = 'smDGAImg2';                
                            } else {
                                $classes = 'smDGAImg3';   
                            }                            				
                        }
                    }
                    $classes .= ' dgaLifted dgaDropShadow';
                    ?>
                    <li class="<?php echo $classes; ?>">
                        <p><a href="/<?php echo $kw['type']; ?>?x=<?php echo $kw['id']; ?>"><?php echo $kw['dga']; ?></a></p>
                        <?php echo $image; ?>
                    </li>
                    <?php
                }	
                ?>
            </ul>    
            <?php
        }
    } else {
        header('Location: /');
        exit();	
    }
    ?>
</div>

<?php
include 'djajamarsum/template/footer.php';
?>