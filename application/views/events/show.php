<h4>List Actions</h4>
<ul id="actions">
    <li> <a href="<?php echo base_url(); ?>events/edit/<?php echo $event->id; ?>">Edit Event</a></li>
    <li> <a onclick="return confirm('Are you sure?')" href="<?php echo base_url(); ?>event/delete/<?php echo $event->id; ?>">Delete Event</a></li>
</ul>
<h1><?php echo $event->event_name; ?></h1>
Created on:  <strong><?php echo date("n-j-Y",strtotime($event->create_date)); ?></strong>
<br /><br />
<div style="max-width:500px;"><?php echo $event->event_body; ?></div>
<br /><br />
<hr />
<a href="<?php echo base_url(); ?>lists"><- Go Back to Event</a>