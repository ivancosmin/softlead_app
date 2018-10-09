<?php
$benefits = Connection::selectData("benefits");
?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">


    <?php
    include ("home.php");
    ?>


<div class="m-content">
    <div class="row">
    <div class="col-lg-12">
        <!--begin::Portlet-->
        <div class="m-portlet m-portlet--full-height">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            List of benefits
                        </h3>
                    </div>

                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li  class="m-portlet__nav-item">
                            <a id="add_benefit_btn" href="#" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
														<span>
															<i class="la la-plus"></i>
															<span>Add benefit</span>
														</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="m-portlet__body">

                <!--begin::Section-->
                <div class="m-accordion m-accordion--default m-accordion--toggle-arrow" id="m_accordion_5" role="tablist">
                    <?php
                    $i = 1;
                    foreach($benefits as $benefit){
                        if($_SESSION['permission'] != 1){
                            $search= array_search($benefit['id_benefits'], array_column($data, 'benefits_id_benefits'));
                            if ( gettype($search) == "integer"){
                                $class = $benefit['className'];
                            }
                            else{
                                $class = "m-accordion__item";
                            }
                        }
                        else{
                            $class = $benefit['className'];
                        }
                        $html_section = ' <!--begin::Item-->              
                    <div class="'. $class .'">
                        <div class="m-accordion__item-head collapsed" srole="tab" id="m_accordion_5_item_'.$i.'_head" data-toggle="collapse" href="#m_accordion_5_item_'.$i.'_body" aria-expanded="false">
                            <span class="m-accordion__item-icon"><i class="fa flaticon-user-ok"></i></span>
                            <span class="m-accordion__item-title">'. $benefit['benefit'] .'</span>
                                 
                            <span class="m-accordion__item-mode"></span>     
                        </div>

                        <div class="m-accordion__item-body collapse" id="m_accordion_5_item_'.$i.'_body" role="tabpanel" aria-labelledby="m_accordion_5_item_'.$i.'_head" data-parent="#m_accordion_5" style=""> 
                            <div class="m-accordion__item-content">
                                <p>'. $benefit['description'] .'</p>
                            </div>
                        </div>
                    </div>
                    <!--end::Item--> ';
                        echo $html_section;
                        $i++;
                    }
                    ?>
                </div>
                <!--end::Section-->
            </div>
        </div>
        <!--end::Portlet-->
    </div>
</div>
</div>
</div>
