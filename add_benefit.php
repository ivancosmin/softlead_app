<div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">

            </div>
            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
						<span class="m-portlet__head-icon m--hide">
						<i class="la la-gear"></i>
						</span>
                            <h3 class="m-portlet__head-text">
                                Add Benefit
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="m-form m-form--fit m-form--label-align-right" method="post">

                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <label class="col-2 col-form-label">Name:</label>
                            <div class="col-10">
                                <input class="form-control m-input" type="text" placeholder="Name" id="name_of_benefit">
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <label class="col-2 col-form-label">Description:</label>
                            <div class="col-10">
                                <input class="form-control m-input" type="text" placeholder="Description" id="description_of_benefit">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-2 col-form-label">Color:</label>
                            <div class="col-10">
                                <div class="m-checkbox-inline">
                                    <label class="m-checkbox m-checkbox--solid m-checkbox--state-success">
                                        <input class="check" name="color" value="m-accordion__item m-accordion__item--success" type="checkbox"> Success state
                                        <span></span>
                                    </label>
                                    <label class="m-checkbox m-checkbox--solid m-checkbox--state-brand">
                                        <input class="check" name="color" value=" m-accordion__item m-accordion__item--brand" type="checkbox"> Brand state
                                        <span></span>
                                    </label>
                                    <label  class="m-checkbox m-checkbox--solid m-checkbox--state-warning">
                                        <input class="check" name="color" value="m-accordion__item m-accordion__item--warning" type="checkbox"> Warning state
                                        <span></span>
                                    </label>
                                    <label class="m-checkbox m-checkbox--solid m-checkbox--state-danger">
                                        <input class="check" name="color" value="m-accordion__item m-accordion__item--danger" type="checkbox"> Danger state
                                        <span></span>
                                    </label>
                                    <label class="m-checkbox m-checkbox--solid m-checkbox--state-info">
                                        <input class="check" name="color" value="m-accordion__item m-accordion__item--info" type="checkbox"> Info state
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions">
                            <div class="row">
                                <div class="col-2">
                                </div>
                                <div class="col-10">
                                    <input type="submit" value="Submit" name="add_benefits" class="btn btn-success" id="add_benefits" />
                                    <button id="cancel_form" type="reset" class="btn btn-secondary">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
