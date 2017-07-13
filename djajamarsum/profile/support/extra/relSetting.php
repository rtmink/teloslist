<ul>
    <li class="userMenu" id="ab_<?php echo $user_ab['id'];?>">
        
        <span id="relIcon"></span><span id="relDownMenu"></span>				
        <ul>
            <?php
                
                if (rel_check($user_ab['id'], 'block') === false) {
                        
                    echo '<li>';
                    
                    if (rel_check($user_ab['id'], 'uB') === false) {

                        echo '<a class="rel_button rb_', $user_ab['id'],'" id="rel_sup_', $user_ab['id'],'" href="">Support';
                            
                    } else {
                            
                        echo '<a class="rel_button rb_', $user_ab['id'],'" id="rel_sup_', $user_ab['id'],'" href="">Unsupport';
                            
                    }
                
                    echo '</a></li>';
                    
                    echo '<li><a class="rel_button rb_', $user_ab['id'],'" id="rel_block" href="">Block</a></li>';
                        
                } else {
                
                    echo '<li><a class="rel_button rb_', $user_ab['id'],'" id="rel_block" href="">Unblock</a></li>';
                    
                    echo '<li class="hide_rb" id="hrb_', $user_ab['id'],'"><a class="rel_button rb_', $user_ab['id'],'" id="rel_sup_', $user_ab['id'],'" href="">Support</a></li>';
                    
                }
                
            ?>
                                        
        </ul>
    </li>
</ul>