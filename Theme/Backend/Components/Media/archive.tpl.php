<?php declare(strict_types=1);

?>
<section id="mediaFile" class="portlet">
    <div class="portlet-body">
        <div id="media" class="tabview tab-2 m-editor">
        <ul class="tab-links">
            <li><label tabindex="0" for="media-c-tab-1"><?= $this->getHtml('Preview', 'Media'); ?></label>
            <li><label tabindex="0" for="media-c-tab-2"><?= $this->getHtml('Edit', 'Media'); ?></label>
        </ul>
        <div class="tab-content">
            <input type="radio" id="media-c-tab-1" name="tabular-1" checked>
            <div class="tab">
                <table class="default">
                <?php
                    $archive = new ZipArchive();
                    $archive->open(($this->media->isAbsolute ? '' : __DIR__ . '/../../../../../../') . $this->media->getPath());

                    for($i = 0; $i < $archive->numFiles; ++$i) {
                        $stat = $archive->statIndex($i);
                        echo '<tr>';
                        echo '<td>'
                            . \str_repeat('&nbsp;', (\substr_count(\trim($stat['name'], '/'), '/')) * 8)
                            . ($stat['name'][\strlen($stat['name']) - 1] === '/' ? '<i class="fa fa-folder-open-o"></i> ' : '<i class="fa fa-file-o"></i> ')
                            . $stat['name'];
                    }
                ?>
                </table>
            </div>
            <input type="radio" id="media-c-tab-2" name="tabular-1">
            <div class="tab">
            </div>
        </div>
    </div>
</section>
