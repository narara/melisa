<div class="row" id="row-message">
    <div class="message-dialog bg-color-yellow fg-color-black" style="display: none;" id="confirm-template" >
        <p id="message-confirm">Content for message dialog</p>
        <button class="place-right" id="cancel-confirm-message">Batal</button>
        <button class="place-right" id="accept-confirm-message" data-id="">Ya</button>
    </div>
</div>
<div class="row" id="row-message1">
    <div class="message-dialog bg-color-yellow fg-color-black" style="display: none;" id="confirm-template1" >
        <p id="message-confirm1">Content for message dialog</p>
        <button class="place-right" id="cancel-confirm-message1">Batal</button>
    </div>
</div>
<table class="striped" id="my-table">
    <thead>
            <th><h3>Daftar Berita</h3></th>
    </thead>
<tbody>
    <?php foreach ($news as $row): ?>
        <tr style="background: rgb(247,247,247);padding-bottom: 0px;margin-bottom: 0px;">
            <td style="border: 1px solid white;padding: 0px;margin: 0px;width: 140px;height: 79px;">
                <img src="<?php echo base_url() . 'attachment/' . $row->header ?>" style="width: 140px;height: 100%;vertical-align: middle;"/>
            </td>
            <td style="border: 1px solid white;width: 450px;vertical-align: top;">
                <a style="font-family: sofiapro-medium,Arial,sans-serif;color: #095b97;font-size: 18px;line-height: 1.5em;"><?php echo $row->title ?></a>
            </td>
            <td style="border: 1px solid white;vertical-align: top;">
                <?php echo nicetime(dtm2timestamp($row->date)) ?>
                <a id="selected_news" class="button bg-color-yellow" style="cursor: pointer;" data-id="<?php echo $row->id_news; ?>"><i class="icon-enter"></i> Lihat </a>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>
<script type="text/javascript">
    $('a#selected_news').click(function(){
        $('#message').html('Loading Informasi');
        $('#loading-template').show();
        var id_news = $(this).attr('data-id');
        $('#content-right').load("<?php echo site_url('news/select_news') ?>/"+id_news,function(){
            $('#loading-template').fadeOut("slow");
        });
    });
    $('table#my-table').each(function() {
        var currentPage = 0;
        var numPerPage = 5;
        var $table = $(this);
        $table.bind('repaginate', function() {
            $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
        });
        $table.trigger('repaginate');
        var numRows = $table.find('tbody tr').length;
        var numPages = Math.ceil(numRows / numPerPage);
        var $pager = $('<div class="toolbar"></div>');
        for (var page = 0; page < numPages; page++) {
            $('<a class="button page-number" style="cursor:pointer;margin-right:4px;"></a>').text(page + 1).bind('click', {
                newPage: page
            }, function(event) {
                currentPage = event.data['newPage'];
                $table.trigger('repaginate');
                $(this).addClass('active').siblings().removeClass('active');
            }).appendTo($pager).addClass('clickable');
        }
        $pager.insertBefore($table).find('span.page-number:first').addClass('active');
    });
</script>