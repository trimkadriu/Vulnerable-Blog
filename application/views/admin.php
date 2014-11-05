<?php 
//ADMIN PAGE PROTECTION
if (!$this->session->userdata('username'))
{
	redirect('blog/pages/login', 'refresh');
}
?>
<?php include('header.php'); ?>
<div id="container" style="color:red; padding-left:10px;">
    <?php echo validation_errors(); ?>
</div>
<div id="container">
    <h1>Admin Users</h1>
    <div id="body">
		<p>
        <h4>List/Delete Admin Users</h4>
        <table style="border:solid 1px #888">
        	<tr style="background-color:#BBB">
            	<td>User ID</td>
                <td>Username</td>
                <td></td>
            </tr>
        <?php 
			$query = $this->data->select_data('users');
			foreach($query->result() as $row)
			{
				echo '<tr>';
                echo '<td>'.$row->id.'</td><td>'.$row->username.'</td>'.
				'<td>'.form_open('form').'<input type="hidden" value="'.$row->id.'" name="id">'.
				'<input type="submit" name="delete_admin_form" value="[DELETE]"></form></td>';
				echo '</tr>';
			}
		?>
        </table>
        </p>
        <p>
        <h4>Insert Admin Users</h4>
        <?php echo form_open('form'); ?>
        	<label>Username:</label><input type="text" name="username"><br/>
            <label>Password:</label><input type="password" name="password"><br/>
            <input type="submit" name="admin_form" value="Insert">
        </form>
        </p>
	</div>
</div><br/>
<div id="container">
    <h1>Post entries</h1>
    <div id="body">
        <h4>Add new post by category</h4>
        <p>
        <?php echo form_open('form'); ?>
        	<label>Category:</label>
            <select name="id">
            <?php 
				$query = $this->data->select_data('categories');
            	foreach($query->result() as $row){ 
			?>
            	<option value="<?php echo $row->id; ?>" <?php if($row->id=='2'){echo 'selected="yes"';} ?> ><?php echo $row->category; ?></option>
            <?php } ?>
            </select><br/>
        	<label>Tittle:</label><input type="text" name="tittle"><br/>
            <label>Content:</label><br/>
            <textarea rows='20' cols='70' name="content"></textarea><br/>
            <input type="submit" name="post_form" value="Insert">
        </form>
        </p>
    </div>
</div><br/>
<div id="container">
    <h1>Categories</h1>
    <div id="body">
        <h4>Category List</h4>
        <p>
        <table style="border:solid 1px #888">
        	<tr style="background-color:#BBB">
            	<td>Category ID</td>
                <td>Category Name</td>
                <td></td>
            </tr>
			<?php 
            $query = $this->data->select_data('categories');
            foreach($query->result() as $row)
            {
				echo '<tr>';
                echo '<td>'.$row->id.'</td><td>'.$row->category.'</td>'.
				'<td>'.form_open('form').'<input type="hidden" value="'.$row->id.'" name="category_id">'.
				'<input type="submit" name="delete_category" value="[DELETE]"></form></td>';
				echo '</tr>';
            }
            ?>
        </table>
        <h4>Add new category</h4>
		<?php echo form_open('form'); ?>
        	<label>Category Name:</label><input type="text" name="category_name"><br/>
            <input type="submit" name="category_form" value="Insert">
        </form>
        </p>
    </div>
</div>

<?php include ('footer.php');?>