<?php 
if ($dga_type == 'g') { 
?>

    <div class="boxShadow" id="smart">
    	<div id="smart_heading"><h5><a rel="tooltip" title="Learn more about S.M.A.R.T. goals." href="/about/smart" target="_blank">S.M.A.R.T. Vote</a></h5></div>
        <div id="smart_body">  
            <div id="smart_query">
                <h5><a rel="tooltip" title="Is this goal clear, concise, and precise?"><span class="greenL">S</span>pecific?</a></h5>
                <h5><a rel="tooltip" title="Can the progress of this goal be tracked?"><span class="greenL">M</span>easurable?</a></h5>
                <h5><a rel="tooltip" title="Does this person have the abilities to accomplish this goal?"><span class="greenL">A</span>chievable?</a></h5>
                <h5><a rel="tooltip" title="Is this person the right person to accomplish this goal?"><span class="greenL">R</span>ealistic?</a></h5>
                <h5><a rel="tooltip" title="Does this person set a specific time or date when to accomplish it?"><span class="greenL">T</span>imely?</a></h5>
            </div>
            
            <?php       
            if (logged_in()) { 
                if ($user_id != logged_in() && acc_goal_check($dga_id) === false && rel_check($user_id, 'iBlocked') === false && rel_check($user_id, 'block') === false) {
                    include 'body/smart_body.php';
                } 	
            }
            ?>
            
            <div id="smart_bars">
                <div class="bar_type">
                    <div class="bar" id="barS">
                        <div id="barS2">
                        <?php 
                            $barType = 'S';
                            include 'bar/bar.php';
                        ?>
                        </div>
                    </div>
                    <?php include 'bar/no_val_bar.php';?>
                </div>
                <div class="bar_type">    
                    <div class="bar" id="barM">
                        <div id="barM2">
                        <?php 
                            $barType = 'M';
                            include 'bar/bar.php';
                        ?>    
                        </div>
                    </div>
                    <?php include 'bar/no_val_bar.php';?>
                </div>  
                <div class="bar_type">    
                    <div class="bar" id="barA">
                        <div id="barA2">
                        <?php 
                            $barType = 'A';
                            include 'bar/bar.php';
                        ?>
                        </div>
                    </div>
                    <?php include 'bar/no_val_bar.php';?>
                </div>
                <div class="bar_type">    
                    <div class="bar" id="barR">
                        <div id="barR2">
                        <?php 
                            $barType = 'R';
                            include 'bar/bar.php';
                        ?>    
                        </div>
                    </div>
                    <?php include 'bar/no_val_bar.php';?>
                </div>
                <div class="bar_type">    
                    <div class="bar" id="barT">
                        <div id="barT2">
                        <?php 
                            $barType = 'T';
                            include 'bar/bar.php';
                        ?>
                        </div>
                    </div>
                    <?php include 'bar/no_val_bar.php';?>
                </div>
            </div>
		</div>            
    </div>

<?php 
}
?>