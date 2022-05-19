<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="main-menu-content">

    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
      <li class=" nav-item"><a href="index.php"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span></a>
        <ul class="menu-content">
          <!--START-->
          <li class=" nav-item"><a href="#"><i class="la la-user"></i><span class="menu-title" data-i18n="nav.templates.main">Admin</span> </a>
            <ul class="menu-content">
              <li><a class="menu-item" href="../view/show_admin.php" data-i18n="nav.templates.vert.main"><i class="la la-street-view"></i>Visitor</a>
              </li>
              <li><a class="menu-item" href="../view/add_admin.php" data-i18n="nav.templates.horz.main"><i class="la la-user-plus"></i>Creat New Admin</a>
              </li>
            </ul>
          </li>
          <!-- --- -->
          <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.templates.main">Shops</span>
              <span class="badge badge badge-info badge-pill float-right mr-2">
                <?php
                require_once '../model/Store.php';
                echo (new Store())->select()->count();
                ?>
              </span>
            </a>
            <ul class="menu-content">
              <li><a class="menu-item" href="../view/add_store.php" data-i18n="nav.templates.vert.main">Add New Store</a>
              </li>
              <li><a class="menu-item" href="../view/show_store.php" data-i18n="nav.templates.vert.main">Show Store</a>
              </li>
            </ul>
          </li>
          <!-- --- -->
          <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.templates.main">Category</span>
              <span class="badge badge badge-info badge-pill float-right mr-2">
                <?php
                require_once '../model/Category.php';
                echo (new Category())->select()->count();
                ?>
              </span>
            </a>
            <ul class="menu-content">
              <li><a class="menu-item" href="../view/add_category.php" data-i18n="nav.templates.vert.main">Add New Category</a>
              </li>
              <li><a class="menu-item" href="../view/show_category.php" data-i18n="nav.templates.horz.main">Show Category</a>
              </li>
            </ul>
          </li>

        </ul>
        <!--END-->
      </li>
    </ul>
  </div>
</div>