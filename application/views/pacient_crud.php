
    <?php $this->load->view('templates/menu'); ?>

    <?php 
    	if($state == 'list'){
    		echo("<div id='pacient_crud_container_list'  >");
    	}else{
    		echo("<div id='pacient_crud_container'  >");
    	}
    ?>
    	<?php $this->load->view('templates/crud'); ?>
	</div>
	<?php if ($state == 'edit'): ?>
		<script type="text/javascript" src="<?php echo base_url("assets/js/pacient_edit.js"); ?>"></script>

		<?php $this->load->view('templates/history'); ?>
	<?php endif; ?>

        <?php if ($state == 'add'): ?>
        <script type="text/javascript" src="<?php echo base_url("assets/js/pacient_edit.js"); ?>"></script>

    <?php endif; ?>

