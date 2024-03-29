<?php  
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	$this->set_css($this->default_theme_path.'/datatables/css/datatables.css');
	$this->set_js($this->default_theme_path.'/flexigrid/js/jquery.form.js');	
	$this->set_js($this->default_theme_path.'/datatables/js/datatables-edit.js');
	$this->set_css($this->default_css_path.'/ui/simple/jquery-ui-1.8.10.custom.css');
	$this->set_js($this->default_javascript_path.'/jquery_plugins/jquery-ui-1.8.10.custom.min.js');	
?>
<script type='text/javascript'>
	var base_url = '<?php echo base_url();?>';
	
	var upload_a_file_string = '<?php echo $this->l('form_upload_a_file');?>';	
</script>
<div class='ui-widget-content ui-corner-all datatables'>
	<h3 class="ui-accordion-header ui-helper-reset ui-state-default form-title">
		<div class='floatL form-title-left'>
			<a href="#"><?php echo $this->l('form_view'); ?> <?php echo $subject?></a>
		</div> 
<?php 	if(!$this->unset_back_to_list) { ?>
		<div class='floatR'>
			<a href='<?php echo $list_url?>' onclick='javascript: return goToList()' class='gotoListButton' >
				<?php echo $this->l('form_back_to_list'); ?>
			</a>
		</div>
<?php 	} ?>		
		<div class='clear'></div>
	</h3>
<div class='form-content form-div'>
	<form action='<?php echo $update_url?>' method='post' id='crudForm' autocomplete='off' enctype="multipart/form-data">
		<div>
		<?php
			$counter = 0; 
			foreach($fields as $field)
			{
				$even_odd = $counter % 2 == 0 ? 'odd' : 'even';
				$counter++;
		?>
			<div class='form-field-box <?php echo $even_odd?>' id="<?php echo $field->field_name; ?>_field_box">
				<div class='form-display-as-box' id="<?php echo $field->field_name; ?>_display_as_box">
					<?php echo $input_fields[$field->field_name]->display_as?><?php echo ($input_fields[$field->field_name]->required)? "<span class='required'>*</span> " : ""?> :
				</div>
				<div class='form-input-box' id="<?php echo $field->field_name; ?>_field_box">
					<?php echo $input_fields[$field->field_name]->input?>
				</div>
				<div class='clear'></div>	
			</div>
		<?php }?>
			<!-- Start of hidden inputs -->
            <?php if(!empty($hidden_fields)){?>
				<?php 
					foreach($hidden_fields as $hidden_field){
						echo $hidden_field->input;
					}
				?>
            <?php }?>	    
			<!-- End of hidden inputs -->								
		</div>	
	</form>	
</div>
</div>
<script>
	var validation_url = '<?php echo $validation_url?>';
	var list_url = '<?php echo $list_url?>';

	var message_update_error = "<?php echo $this->l('update_error')?>";	
</script>