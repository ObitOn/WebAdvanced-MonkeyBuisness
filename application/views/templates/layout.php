<!DOCTYPE >
<html>
<head>
    <title>Monkey Busines</title>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://bootswatch.com/united/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">monkey_busines</a>
        </div>
        <div id="navbar">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo base_url(); ?>templates/layout">Home</a></li>
                <li><a href="<?php echo base_url(); ?>pages/login">Login</a></li>
                <?php if($this->session->userdata('logged_in')) : ?>
                Welcome,  <?php echo $this->session->userdata('username'); ?>
                <?php else : ?>
                <a href="pages/register">Register</a>
                <?php endif; ?>
                <li><a href="/about">About</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span3">
            <div class="well sidebar-nav">
                <div style="margin:0 0 10px 10px;">
                    <!--SIDEBAR CONTENT-->
                    <?php $this->load->view('pages/login'); ?>
                </div>
            </div><!--/.well -->
        </div><!--/span-->

        <div class="span9">
            <!--MAIN CONTENT-->
            <?php $this->load->view($main_content); ?>
        </div><!--/span-->
    </div><!--/row-->
    <hr>

    <footer>
        <p>&copy; Copyright 2017</p>
    </footer>
</div><!--/.fluid-container-->
</body>
</html>