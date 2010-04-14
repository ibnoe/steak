<?php
$options_save = array(
					'id'=>'btnSubmit',
					'div'=>FALSE,
					'url'=>array('action'=>'delete.json'),
					'before'=>'$("btnSubmit").disable()',
					'complete'=>'$("btnSubmit").enable(); checkForm($("frm"), json, "data[TsksMinimal][#{field}]", $("msg"));'
				);
?>

<h2 class="section_name"><span class="section_name_span"><?php __('Hapus Jumlah Sks');?></span></h2>
<?php echo $form->create('TsksMinimal', array('id'=>'frm'));?>
	<div id="msg"></div>
	<fieldset>
		<div class='box'>
			<?php echo $form->hidden('id') ?>
			<p><?php __("Yakin untuk menghapus Jurusan {$this->data['Tjurusan']['namaJurusan']}?") ?></p>
		</div>
	</fieldset>
	<div class='submit'>
		<?php echo $ajax->submit(__('Hapus', true), $options_save); ?>
		<?php echo $html->link(__('Batal', true), '#cancel', array('class'=>'cancel fb_cancel')); ?>
	</div>
<?php echo $form->end();?>


<script type='text/javascript'>
Event.observe($$('.fb_cancel').first(), 'click', function(e){
	Event.stop(e);
	facebox.close()
});
</script>
