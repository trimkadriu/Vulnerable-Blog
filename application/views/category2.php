<?php include('header.php'); ?>

<h1 id="tittle">All articles for CATEGORY 2</h1>
<?php foreach($cat2->result() as $row){?>

<div id="container">
	<h1><?php echo $row->tittle; ?></h1>
	<div id="body">
		<p>
        <?php echo $row->content; ?>
        </p>
	</div>

	<p class="footer">
    <div style="float:left">
    	<?php
    		include ('delete_post.php');
		?>
    </div>
    <div align="right">
    Created date:
    <?php echo $row->date; ?>
    </div>
    </p>
</div>

<?php } include ('footer.php');?>