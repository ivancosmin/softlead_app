
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-light ">

    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-light m-aside-menu--submenu-skin-light "
         m-menu-vertical="1" m-menu-scrollable="0" m-menu-dropdown-timeout="500">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__section m-menu__section--first">
                <h4 class="m-menu__section-text">Sidebar</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>

            <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
                <a class="m-menu__link "><i class="m-menu__link-icon flaticon-light"></i>
                    <span class="m-menu__link-text" id="calendar">Calendar</span></a></li>


            <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
                <a class="m-menu__link "><i class="m-menu__link-icon flaticon-light"></i>
                    <span class="m-menu__link-text" id="list_of_benefits">List of benefits</span></a></li>

            <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
                <a class="m-menu__link "><i class="m-menu__link-icon flaticon-light"></i>
                    <span class="m-menu__link-text" id="list_users">Users</span></a></li>
            <?php
            if ($_SESSION['permission'] == 1){
                $html = '<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
                <a class="m-menu__link "><i class="m-menu__link-icon flaticon-light"></i>
                    <span class="m-menu__link-text" id="select_benefits">Select benefits for users</span></a></li>';
                echo $html;
            }
            ?>
        </ul>

    </div>

    <!-- END: Aside Menu -->
</div>


