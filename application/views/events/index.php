<h1>Events</h1>
<?php if($this->session->flashdata('event_created')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('event_created') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('event_deleted')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('event_deleted') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('event_updated')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('event_updated') . '</p>'; ?>
<?php endif; ?>
<p>These are your events</p>
<ul class="list_items">
    <?php foreach ($events as $event) : ?>
        <li>
            <div class="list_name"><a href="<?php echo base_url(); ?>lists/show/<?php echo $event->id; ?>"><?php echo $event->list_name; ?></a></div>
            <div class="list_body"><?php echo $event->event_body; ?></div>
        </li>
    <?php endforeach; ?>
</ul>
<br />
<p>To create a new event - <a href="<?php echo base_url(); ?>lists/add">Click here</a>