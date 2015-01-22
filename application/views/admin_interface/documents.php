<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("admin_interface/includes/head");?>
</head>
<body>
<?php $this->load->view("admin_interface/includes/header");?>
<div class="container">
    <div class="row">
        <div class="span19">
            <div class="navbar">
                <div class="navbar-inner">
                    <a class="brand none" href="">Documents</a>
                </div>
            </div>
            <?php $this->load->view("alert_messages/alert-error");?>
            <?php $this->load->view("alert_messages/alert-success");?>
            <div>
                <table class="opt-table">
                    <thead>
                    <tr>
                        <th>User name</th>
                        <th>Document</th>
                        <th>Size</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                <?php if(count($documents)):?>
                    <?php $this->load->helper('date');?>
                    <?php foreach($documents as $account_id => $account_documents): ?>
                        <?php foreach($account_documents as $document): ?>
                        <tr>
                            <td width="100px"><a href="<?=$this->baseURL.'admin-panel/actions/users/edit/id/'.$account_id;?>" target="_blank"><?=$document['name']?></a></td>
                            <td width="100px"><a href="<?=$this->baseURL.$document['path'];?>" target="_blank"><?=$document['original_name']?></a></td>
                            <td width="150px"><?=round($document['filesize']/1024);?> Кb</td>
                            <td width="150px"><?=swap_dot_date_without_time($document['date']);?></td>
                            <td width="150px">
                                <a class="js-confirm" href="<?=$this->baseURL.'admin-panel/documents/approve/'.$document['document_id']?>">Approve</a> /
                                <a href="#rejectModal" role="button" class="js-confirm-modal" data-toggle="modal">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                <?php else:?>
                        <tr>
                            <td colspan="5"><?=$this->localization->getLocalButton('user_documents','empty_list')?></td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="rejectModal" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <form style="margin: 0;" action="<?=$this->baseURL.'admin-panel/documents/delete/'.$document['document_id']?>" method="post">
                <div class="modal-header">
                    <h3 id="myModalLabel">Delete document</h3>
                </div>
                <div class="modal-body">
                    <p>Specify reason for rejection.</p>
                    <textarea style="width: 500px; height: 100px;" name="content"></textarea>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </div>
            </form>
        </div>


        <?php $this->load->view("admin_interface/includes/rightbar");?>
    </div>
</div>
<?php $this->load->view("admin_interface/includes/scripts");?>
</body>
</html>