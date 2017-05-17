<?php
/**
 * Created by PhpStorm.
 * User: LesuisseJens
 * Date: 17/05/2017
 * Time: 0:35
 * Display Messages
*/
 if($this->session->flashdata('registered')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('registered') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('logged_out')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('logged_out') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('login_failed')) : ?>
    <?php echo '<p class="text-error">' .$this->session->flashdata('login_failed') . '</p>'; ?>
<?php endif; ?>

<h2>Welcome</h2>
<p>To Monkey Busines</p>

<?php if($this->session->userdata('logged_in')) : ?>
    <!--alle shit-->
<?php endif; ?>
