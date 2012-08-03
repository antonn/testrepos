<?php

function display_menu( $value ) {   ?>


<li <?php if ($value == "food") { echo "id=current";} ?>><a href="food.php">Restaurants</a></li>
<li <?php if ($value == "pub") { echo "id=current";} ?>><a href="pub.php">Pubs</a></li>
<li <?php if ($value == "brand") { echo "id=current";} ?>><a href="brand.php">Brand Outlets</a></li>

<!--
<li <?php //if ($value == "real") { echo "id=current";} ?>><a href="realestate.php">Real Estate</a></li>
<li <?php //if ($value == "auto") { echo "id=current";} ?>><a href="automobile.php">Automobile</a></li>
-->		
			
<?php } ?>			
					