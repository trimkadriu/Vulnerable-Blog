<?php
if ($this->session->userdata('username'))
{
	echo form_open('form').'<input type="hidden" value="'.$row->ID.'" name="post_id">'.
		'<input type="submit" name="delete_entries_form" value="[DELETE]"></form>';
}
?>