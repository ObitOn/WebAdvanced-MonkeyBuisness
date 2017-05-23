<!--Display Messages-->
<?php if($this->session->flashdata('registered')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('registered') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('logged_out')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('logged_out') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('need_login')) : ?>
    <?php echo '<p class="text-error">' .$this->session->flashdata('need_login') . '</p>'; ?>
<?php endif; ?>

<h1>Welcome to Monkey Business!</h1>
<p>Monkey Business is a business to do monkey stuff.</p>
<?php if($this->session->userdata('logged_in')) : ?>
    <br />
    <!--Display Errors-->
    <?php echo validation_errors('<p class="text-error">'); ?>
    <p>
        <?php echo form_open('events/quickadd'); ?>
        <?php $data = array("placeholder" => "Add a New Event",
            "name" => "event_name"); ?>
        <?php echo form_input($data); ?>
        <!--Submit Buttons-->
        <?php $data = array("value" => "Login",
            "name" => "submit",
            "style"=> "vertical-align:top;",
            "class" => "btn btn-primary"); ?>
        <?php echo form_submit($data); ?>
        <?php echo form_close(); ?>
    </p>
    <br />
    <h3>My Event</h3>
    <table class="table table-striped" width="50%" cellspacing="5" cellpadding="5">
        <tr>
            <th>List Name</th>
            <th>Created On</th>
            <th>View</th>
        </tr>
        <?php if(isset($events)) : ?>
            <?php foreach($events as $event) : ?>
                <tr>
                    <td><?php echo $event->event_name; ?></td>
                    <td><?php echo $event->create_date; ?></td>
                    <td><a href="<?php echo base_url(); ?>events/show/<?php echo $event->id; ?>">View Event</a></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>


<?php endif; ?>