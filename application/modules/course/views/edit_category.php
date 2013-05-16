<script type="text/javascript" src="<?php echo base_url(); ?>asset/metro/js/modern/input-control.js"></script>
<h3 style="margin-top: 0px; padding-top: 0px;">Formulir Edit Kategori</h3>
<form id="do-input-category" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
    <h4 style="margin-top: 0px; padding-top: 0px;">Kategori</h4>
    <div class="input-control text span4 clearfix">
        <input name="category" id="category" type="text" placeholder="category" value="<?php echo $category->category;?>"/>
        
    </div>
    
    <div class="clearfix"></div>
    <input type="submit" value="Submit"/>
</form>
<script type="text/javascript">
    var id=<?php echo $id ;?>;
    $('#do-input-category').submit(function(){        
        $('#loading-template').show();
        $('#message').html("Loading Data");
        $.ajax({
            type:'POST',
            url:"<?php echo site_url('course/category_update');?>/"+id,
            data:$(this).serialize(),
            success:function (data) {
                $('#content-right').load("<?php echo site_url('course/all_category') ?>");
                $('#loading-template').fadeOut("slow");
            },
            error:function (data){
                $('#loading-template').fadeOut("slow");
                $('#error-template').show();
                $('#message-error').html("Koneksi / Sistem Error");
            }
        });
        return false;
    });
</script>