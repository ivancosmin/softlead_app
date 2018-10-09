<div class="m-grid__item m-grid__item--fluid m-wrapper">

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">Users</h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
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
                            Users
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a id="add_user" href="#" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
														<span>
															<i class="la la-plus"></i>
															<span>Add User</span>
														</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="m-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped table-bordered table-hover table-checkable" id="m_table_1" style="text-align: center;">
                    <thead>
                    <tr>
                        <th>Nr. Crt.</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $data = array();

                    $data = Connection::selectData("users");
                    $i = 1;
                    foreach($data as $value){ ?>
                        <tr>
                            <td><?=$i?></td>
                            <td><?=$value['first_name']?></td>
                            <td><?=$value['last_name']?></td>
                            <td><?=$value['email']?></td>
                            <td> <?=$value['phone_number']?> </td>
                            <td>
                                <a href="index.php?page=add_user&edit_user=edit&uid=<?=$value['uid']?>" id="edit_user" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">
                                    <i class="fa flaticon-edit"></i>
                                </a>
                                <button value="<?=$value['uid']?>" id="delete_user" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
                                    <i class="la la-close"></i>
                                    <i class="fa flaticon-delete"></i>
                                </button>
                            </td>
                        </tr>
                    <?php
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