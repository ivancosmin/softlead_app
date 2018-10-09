<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form id="add_event">
            <input type="hidden" name="event" value="addEvent" />
            <div class="form-group">
                <label for="recipient-name" class="form-control-label">Title:</label>
                <input name="title" type="text" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
                <label for="message-text" class="form-control-label">Start:</label>
                <input name="start" type="date" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
                <label for="recipient-name" class="form-control-label">End:</label>
                <input name="end" type="date" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
                <label for="message-text" class="form-control-label">Description:</label>
                <input name="description" type="text" class="form-control" id="recipient-name">
            </div>
            <div class="m-form__group form-group">
                <label>Color:</label>
                <div class="m-checkbox-list" >
                    <label class="m-checkbox m-checkbox--solid m-checkbox--state-success">
                        <input class="check" name="className" value="m-fc-event--danger m-fc-event--solid-success" type="checkbox"> Success state
                        <span></span>
                    </label>
                    <label class="m-checkbox m-checkbox--solid m-checkbox--state-brand">
                        <input class="check" name="className" value=" m-fc-event--danger m-fc-event--solid-brand" type="checkbox"> Brand state
                        <span></span>
                    </label>
                    <label  class="m-checkbox m-checkbox--solid m-checkbox--state-warning">
                        <input class="check" name="className" value="m-fc-event--danger m-fc-event--solid-warning" type="checkbox"> Warning state
                        <span></span>
                    </label>
                    <label class="m-checkbox m-checkbox--solid m-checkbox--state-danger">
                        <input class="check" name="className" value="m-fc-event--succes m-fc-event--solid-danger" type="checkbox"> Danger state
                        <span></span>
                    </label>
                    <label class="m-checkbox m-checkbox--solid m-checkbox--state-info">
                        <input class="check" name="className" value="m-fc-event--danger m-fc-event--solid-info" type="checkbox"> Info state
                        <span></span>
                    </label>
                    <label class="m-checkbox m-checkbox--solid m-checkbox--state-metal">
                        <input class="check" name="className" value="m-fc-event--danger m-fc-event--solid-metal" type="checkbox"> Metal state
                        <span></span>
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" value="Add event" class="btn btn-primary" />
            </div>
        </form>
    </div>

</div>

