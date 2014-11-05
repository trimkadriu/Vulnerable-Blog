<?php include('header.php'); ?>

<h1 id="tittle">Contact Us</h1>

<div id="container">
	<h1>Contact Form</h1>
	<div id="body">
        <?php echo form_open('form'); ?>
            <label>*Email: </label><input name='email' type='text' /><br />
            <label>*Subject: </label><input name='subject' type='text' /><br />
            <label>*Message:</label><br />
            <textarea name='message' rows='10' cols='50'>
            </textarea><br />
            <input type='submit' name="contact"/>
            </form>
		<div style="color:red; margin:10px;">
			<?php 
				echo validation_errors(); 
				if(isset($_GET['message']))
				{
					echo htmlspecialchars($_GET['message'], ENT_QUOTES, 'UTF-8');
				}
			?>
        </div>
	</div>
</div>

<?php include ('footer.php');?>