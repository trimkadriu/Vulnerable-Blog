<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css').'/'; ?>style.css">
</head>
<body>
<?php
	if ($this->session->userdata('username'))
	{
		echo '<h2 style="float:left;">Welcome '.strtoupper($this->session->userdata('username')).
		'&nbsp;&nbsp;&nbsp;<a href="'.site_url('blog/pages/logout').'">[LOGOUT]</a>&nbsp;&nbsp;&nbsp'.
		'<a href="'.site_url('blog/pages/admin').'">[ADMIN PANEL]</a></h2>'; 
	}
	else
	{
		echo '<h2 style="float:left;"><a href="'.site_url('blog/pages/login').'">[LOGIN]</a></h2>';
	}
?>
<h1 style="text-align:center; font-size:36px; margin-bottom:25px;">My Blog Tittle</h1>
<ul style="text-align:center;">
<?php
	$query_categories = $this->data->select_data('categories');
	foreach($query_categories->result() as $row){
?>
	<li><a href="<?php echo site_url('blog/pages/'.$row->category); ?>"><?php echo $row->category; ?></a></li>
<?php } ?> 
</ul>
