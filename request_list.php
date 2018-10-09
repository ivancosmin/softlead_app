<?php
//session_start();
//include ("classes/Connection.php");
//Connection::getConnection();
//?>





        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title m-subheader__title--separator">Request list</h3>
                        <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                            <li class="m-nav__item m-nav__item--home">
                                <a href="#" class="m-nav__link m-nav__link--icon">
                                    <i class="m-nav__link-icon la la-home"></i>
                                </a>
                            </li>
                            <li class="m-nav__separator">-</li>
                            <li class="m-nav__item">
                                <a href="" class="m-nav__link">
                                    <span class="m-nav__link-text">DataTables</span>
                                </a>
                            </li>
                            <li class="m-nav__separator">-</li>
                            <li class="m-nav__item">
                                <a href="" class="m-nav__link">
                                    <span class="m-nav__link-text">Data sources</span>
                                </a>
                            </li>
                            <li class="m-nav__separator">-</li>
                            <li class="m-nav__item">
                                <a href="" class="m-nav__link">
                                    <span class="m-nav__link-text">HTML</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- END: Subheader -->
            <div class="m-content">
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Request table
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">

                        <!--begin: Datatable -->
                        <table class="table table-striped table-bordered table-hover table-checkable" id="m_table_1" style="text-align: center;">
                            <thead>
                            <tr>
                                <th>Record ID</th>
                                <th>Reason</th>
                                <th>Start date</th>
                                <th>End date</th>
                                <th>Days_number</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                $data = array();
                                if($_SESSION['permission'] != 1) {
                                    $data = Connection::selectData("requirements", "users_id_users", $_SESSION['id_user'], "DESC");
                                }
                                else{
                                    $data = Connection::selectData("requirements", false, false, "DESC");
                                }
                                $i = 1;
                                foreach($data as $value){
                                    echo "<tr>";
                                        echo "<td>" . $i . "</td>";
                                        echo "<td>" . $value['reason'] . "</td>";
                                        echo "<td>" . $value['start'] . "</td>";
                                        echo "<td>" . $value['end'] . "</td>";
                                        echo "<td>" . $value['days_number'] . "</td>";
                                        echo "<td>" . $value['status'] . "</td>";
                                        echo "<td>";
                                        if ($value['status'] == 2) {
                                            echo '<button value="' . $value['id_requirements'] . '" id="update_request" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">';
                                            echo '<i class="fa flaticon-edit"></i>';
                                            echo '</button>';
                                        }
                    	                    echo '<button value="' . $value['id_requirements'] . '" id="delete_request" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">';
//						                    echo '<i class="la la-close"></i>';
						                    echo '<i class="fa flaticon-delete"></i>';
                                            echo '</button>';
                                            if($value['status'] == 2 && $_SESSION['permission'] == 1){
                                                echo '<button value="' . $value['id_requirements'] . '" id="accepted" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Accept">';
                                                echo '<i class="fa 	fa-check"></i>';
                                                echo '</button>';

                                                echo '<button value="' . $value['id_requirements'] . '" id="declined" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Decline">';
                                                echo '<i class="fa 	fa-times"></i>';
                                                echo '</button>';
                                            }
                                        echo "</td>";
                                    echo "</tr>";
                                    $i++;
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>


