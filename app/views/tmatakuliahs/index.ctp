<?php $paginator->options(array("url"=>$params));?>
<div class="tmatakuliahs index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Mata Kuliah');?></span></h2>
<?php echo $form->create('Filter', array('url'=>'/tmatakuliahs/index', 'class'=>'filter'))?>
<table class="filter">
	<tr>
		<td>
			<?php echo $form->input('FAKULTAS', array("empty"=>"Semua",'label'=>'Fakultas', "type"=>"select","options"=>$tfakultases,"onchange"=>"this.form.submit()", 'div'=>'filter', 'fieldset'=>false))?>
 		</td>
		<td>
			<?php echo $form->input('program_studi_id', array("empty"=>"Semua",'label'=>'Program Studi',"type"=>"select","options"=>$jenjang_studi,"onchange"=>"this.form.submit()", 'div'=>'filter', 'fieldset'=>false))?>
		</td>
		<td>
			<?php 
				if($lblforeignkey=="Jurusan"){
				echo $form->input('JURUSAN', array("empty"=>"Semua",'label'=>'Jurusan',"type"=>"select","options"=>$tjurusans, 'div'=>'filter', 'fieldset'=>false));
				//echo $form->input('JURUSAN', array('label'=>'JURUSAN'))
				}
			?>
		</td>
		<td>
			<?php echo $form->input('tkurikulum_id', array("empty"=>"Semua",'label'=>'Tahun Kurikulum',"type"=>"select","options"=>$tkurikulums,"onchange"=>"this.form.submit()", 'div'=>'filter', 'fieldset'=>false))?>
		</td>
		<td>
			<?php echo $form->input('IS_BUKA',array("empty"=>"Semua",'label'=>'Status',"type"=>"select","options"=>array('0'=>'ditutup','1'=>'dibuka'), 'div'=>'filter', 'fieldset'=>false))?>
		 </td>
		<td>
			<label>&nbsp;</label>
			<?php echo $form->submit('Filter') ?>
		</td>
	</tr>
</table>
</form>

		 
<table cellpadding="0" cellspacing="0" class="Design">
<thead>
<tr>
	<th><?php echo $paginator->sort('Kode','KD_KULIAH');?></th>
	<th><?php echo $paginator->sort('Nama','NAMA_KULIAH');?></th>
	<th><?php echo $paginator->sort('Fakultas','FAKULTAS');?></th>
	<th><?php echo $paginator->sort('Program Studi','PROGRAM_STUDI');?></th>
	<th><?php echo $paginator->sort('Jurusan','JURUSAN');?></th>
	<th><?php echo $paginator->sort('Sifat','SIFAT');?></th>
	<th><?php echo $paginator->sort('SKS');?></th>
	<th>STATUS</th>
	<th class="actions"><?php __('Aksi');?></th>
</tr>
</thead>
<?php foreach ($tmatakuliahs as $tmatakuliah): ?>
<tbody>
	<tr>
		<td>
			<?php echo $tmatakuliah['Tmatakuliah']['KD_KULIAH']; ?>
		</td>
		<td>
			<?php echo $tmatakuliah['Tmatakuliah']['NAMA_KULIAH']; ?>
		</td>
			
		<td>
			<?php echo $tmatakuliah['Tfakultase']['nama']; ?>
		</td>
		<td>
			<?php echo $tmatakuliah['JenjangStudi']['value']; ?>
		</td>
		<td>
			<?php echo $tmatakuliah['Tjurusan']['namaJurusan']; ?>
		</td>
		<td>
			<?php echo $tmatakuliah['Tmatakuliah']['SIFAT']; ?>
		</td>
		<td>
			<?php echo $tmatakuliah['Tmatakuliah']['SKS']; ?>
		</td>
		<td>
			<?php echo $tmatakuliah['Tmatakuliah']['IS_BUKA']?"dibuka":"ditutup"; ?>
		</td>
		<td class="actions">
			<?php
			if($tmatakuliah['Tmatakuliah']['IS_BUKA']){
				echo $html->link(__('Tutup', true), array('action'=>'dotutup', $tmatakuliah['Tmatakuliah']['KD_KULIAH']));
			} else {
				echo $html->link(__('Buka', true), array('action'=>'dobuka', $tmatakuliah['Tmatakuliah']['KD_KULIAH']));
			}
			?>
			<?php echo $html->link($html->image('page_16.png'), array('action'=>'view', $tmatakuliah['Tmatakuliah']['KD_KULIAH']), array('title'=>'Lihat data lengkap'),false,false); ?>
			<?php echo $html->link($html->image('pencil_16.png'), array('action'=>'edit', $tmatakuliah['Tmatakuliah']['KD_KULIAH']), array('title'=>'edit'),false,false); ?>
			<?php echo $html->link($html->image('del_16.png'), array('action'=>'delete', $tmatakuliah['Tmatakuliah']['KD_KULIAH']), array('title'=>'hapus'), sprintf(__('Are you sure you want to delete # %s?', true), $tmatakuliah['Tmatakuliah']['KD_KULIAH']),false); ?>
		</td>
	</tr>
</tbody>
<?php endforeach; ?>
</table>
<div class="pagination">
	<div class="paging">
		<?php echo $paginator->prev('&laquo; '.__('Sebelumnya', true), array('escape'=>false, 'class'=>'prev'), null, array('class'=>'disabled_prev'));?>
		<?php echo $paginator->numbers(array('separator'=>''));?>
		<?php echo $paginator->next(__('Selanjutnya', true).' &raquo;', array('escape'=>false, 'class'=>'next'), null, array('class'=>'disabled_next'));?>
	</div>
	<div class="clear"></div>
</div>

</div>

</div>

<div class="grid_4 omega" id="sidebar">
	<div class="sidebox special">
		<ul>
			<li><?php echo $html->link($html->image('add_16.png'). __('Tambah Mata Kuliah', true), array('action'=>'add'), array('class'=>'tombol'), null, false); ?></li>
		</ul>
	</div>
</div>
