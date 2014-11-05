<?php include('header.php'); ?>

<h1 id="tittle">Login ADMIN panel</h1>

<div id="container">
        <?php echo form_open('form'); ?>
        <table style="padding:15px;" border="0" cellpadding="0" cellspacing="0">
            <th align="center" colspan="2">
            </th>
            <tr>
                <td>
                    <p align="left">
                        Username: 
                    </p>
                </td>
                <td>
                    <input type="text" name="username"/>
                </td>
            </tr>
            <tr>
                <td>
                    <p align="left">
                        Password: 
                    </p>
                </td>
                <td>
                    <input type="password" name="password"/>
                </td>
            </tr>
            <tr>
                <td align="right" colspan="2">
                    <input type="submit" name="login_form" value="Login"/>
                </td>
            </tr>
        </table>
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

<?php include ('footer.php');?>