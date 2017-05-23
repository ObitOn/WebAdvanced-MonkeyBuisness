<h1>Edit Event</h1>
<!--Display Errors-->
<?php echo validation_errors('<p class="text-error">'); ?>
<?php echo form_open('events/edit/'.$this_event->id.''); ?>
<!--Field: First Name-->
<p>
    <?php echo form_label('Event Name:'); ?>
    <?php
    $data = array(
        'name'        => 'event_name',
        'value'       => $this_event->event_name
    );
    ?>
    <?php echo form_input($data); ?>
</p>
<!--Field: Last Name-->
<p>
    <?php echo form_label('Event Body:'); ?>
    <?php
    $data = array(
        'name'        => 'event_body',
        'value'       => $this_event->event_body
    );
    ?>
    <?php echo form_textarea($data); ?>
</p>

<!--Submit Buttons-->
<?php $data = array("value" => "Update List",
    "name" => "submit",
    "class" => "btn btn-primary"); ?>
<p>
    <?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>