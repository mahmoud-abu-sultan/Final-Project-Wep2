
<!-- HEADER -->
	<header>
	    <!-- TOP HEADER -->
	    <div id="top-header">
	        <div class="container">

	            <ul class="header-links pull-right">
                    <?php
                    if(!empty($_SESSION['user'])){

                    echo '<li><a href="logout.php"><i class="fa fa-user-o"></i> Logout</a></li>';
                    }else{
                        echo '<li><a href="login.php"><i class="fa fa-user-o"></i> Login</a></li>';
                    }
                    ?>

	            </ul>
	        </div>
	    </div>
	    <!-- /TOP HEADER -->

	    <!-- MAIN HEADER -->
	    <div id="header">
	        <!-- container -->
	        <div class="container">
	            <!-- row -->
	            <div class="row">
	                <!-- LOGO -->
	                <div class="col-md-3">
	                    <div class="header-logo">
	                        <a href="#" class="logo">
	                            <img src="./img/logo.png" alt="">
	                        </a>
	                    </div>
	                </div>
	                <!-- /LOGO -->

	                <!-- SEARCH BAR -->
	                <div class="col-md-6">
	                    <div class="header-search">
	                        <form action="search.php" method="get">

	                            <input class="input" placeholder="Search here" type="text" name="s">
	                            <button class="search-btn">Search</button>
	                        </form>
	                    </div>
	                </div>
	                <!-- /SEARCH BAR -->


	            </div>
	            <!-- row -->
	        </div>
	        <!-- container -->
	    </div>
	    <!-- /MAIN HEADER -->
	</header>
	<!-- /HEADER -->