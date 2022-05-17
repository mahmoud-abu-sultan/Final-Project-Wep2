<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <?php
                require_once 'controller/CategoryController.php';
                $data = (new CategoryController())->index();
                foreach ($data as $item) {
                    # code...
                    $id = $item->getId();
                    echo "<li><a href='show_category.php?id=$id'>" . $item->getName() . "<a></li>";
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
