<div class="portlet">
    <div class="portlet-head"><?= $this->getHtml('Media'); ?></div>
    <form id="<?= $this->form; ?>-upload">
        <div class="portlet-body">
            <table class="layout wf-100">
                <tbody>
                <tr><td><label for="iMedia"><?= $this->getHtml('Media'); ?></label>
                <tr><td>
                    <div class="ipt-wrap">
                        <div class="ipt-first">
                            <div class="advancedInput wf-100" id="iMediaInput">
                                <input autocomplete="off" class="input" id="mediaInput" name="mediaFile" type="text"
                                    data-emptyAfter="true"
                                    data-autocomplete="off"
                                    data-src="api/media/find?search={!#mediaInput}">
                                <div id="iMediaInput-popup" class="popup" data-active="true">
                                    <table id="iMediaInput-table" class="default">
                                        <thead>
                                            <tr>
                                                <td>ID<i class="sort-asc fa fa-chevron-up"></i><i class="sort-desc fa fa-chevron-down"></i>
                                                <td>Name<i class="sort-asc fa fa-chevron-up"></i><i class="sort-desc fa fa-chevron-down"></i>
                                                <td>Extension<i class="sort-asc fa fa-chevron-up"></i><i class="sort-desc fa fa-chevron-down"></i>
                                        <tbody>
                                            <template id="iMediaInput-rowElement" class="rowTemplate">
                                                <tr tabindex="-1">
                                                    <td data-tpl-text="/id" data-tpl-value="/id" data-value=""></td>
                                                    <td data-tpl-text="/name" data-tpl-value="/name" data-value=""></td>
                                                    <td data-tpl-text="/extension"></td>
                                                </tr>
                                            </template>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="ipt-second"><button><?= $this->getHtml('Select', 'Media'); ?></button></div>
                    </div>
                <tr><td><label for="iUpload"><?= $this->getHtml('Upload', 'Media'); ?></label>
                <tr><td>
                    <input type="hidden" name="virtualPath" form="<?= $this->form; ?>" value="<?= $this->virtualPath; ?>">
                    <input type="file" id="iUpload" name="upload" form="<?= $this->form; ?>" multiple>
            </table>
        </div>
    </form>
</div>

<div class="box wf-100">
    <table class="default">
        <thead>
            <tr>
                <td>ID<i class="sort-asc fa fa-chevron-up"></i><i class="sort-desc fa fa-chevron-down"></i>
                <td>Name<i class="sort-asc fa fa-chevron-up"></i><i class="sort-desc fa fa-chevron-down"></i>
                <td>Extension<i class="sort-asc fa fa-chevron-up"></i><i class="sort-desc fa fa-chevron-down"></i>
        <tbody id="iMediaInput-tags" class="tags" data-limit="0" data-active="true" data-form="<?= $this->form; ?>">
            <template id="iMediaInput-tagTemplate">
                <tr data-tpl-value="/id" data-value="" data-uuid="" data-name="media-list">
                    <td data-tpl-text="/id" data-tpl-value="/id" data-value=""></td>
                    <td data-tpl-text="/name" data-tpl-value="/name" data-value=""></td>
                    <td data-tpl-text="/extension"></td>
                </tr>
            </template>
    </table>
</div>