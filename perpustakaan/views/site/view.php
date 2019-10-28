<?php<?php echo CHtml::beginForm(array('site/exportExcel')); ?>
    
    $model = new Buku();
        $model->attributes = $_POST['Buku'];

        $this->widget('ext.EExcelView', array(
            'title'=>'Daftar Buku',
            'dataProvider' => $model->search(),
            'filter'=>$model,
            'grid_mode'=>'export',
             'columns' => array(
                'id',
                'nama',
                'tahun_terbit',
                'nama.pengarang',
                'id_penulis',
                'id_penerbit',
                'id_kategori',
                'sinopsis',
                'sampul',
                'berkas',
                ),
));
<?php echo CHtml::submitButton('Export'); ?>
<?php echo CHtml::endForm(); ?>
