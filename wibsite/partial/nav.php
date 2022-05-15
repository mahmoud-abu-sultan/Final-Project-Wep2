	<!-- NAVIGATION -->
	<nav id="navigation">
	    <!-- container -->
	    <div class="container">
	        <!-- responsive-nav -->
	        <div id="responsive-nav">
	            <!-- NAV -->
	            <ul class="main-nav nav navbar-nav">
	                <li class="active"><a href="#">Home</a></li>
	                <?php
                    include_once '../Dashborde/DB_connection.php';
                    $query = "SELECT * FROM category";
                    $result = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        # code...
                        $id = $row['id'];
                        echo "<li><a href='show_product.php?categoriy_id=$id'>" . $row['name'] . "<a></li>";
                    }
                    ?>
	            </ul>
	            <!-- /NAV -->
	        </div>
	        <!-- /responsive-nav -->
	    </div>
	    <!-- /container -->
	</nav>
	<!-- /NAVIGATION -->