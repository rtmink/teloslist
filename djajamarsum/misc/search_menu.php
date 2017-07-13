<form action="/s" method="get">

<input type="text" name="f" class="left" id="search" placeholder="Search for Posts or People" value="<?php if (isset($_GET['f']) && !empty($_GET['f'])) {echo check_values2($_GET['f']);};?>" >
<button class="left" id="searchButton"><span class="searchIcon3"></span></button>

</form>