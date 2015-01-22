<form action="<?=site_url('cabinet/documents/upload');?>" enctype="multipart/form-data" method="post">
    <input type="file" name="file" />
    <button type="submit" class="btn btn-action btn-upload" name="submit"><?=$this->localization->getLocalButton('user_documents','upload_submit')?></button>
</form>