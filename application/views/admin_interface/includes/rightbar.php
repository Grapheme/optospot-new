<div class="span5">
	<div class="well sidebar-nav">
		<ul class="nav nav-pills nav-stacked">
			<li class="nav-header">Navigation</li>
			<li num="home"><?=anchor('','Home page');?></li>
			<li num="users-list"><?=anchor('admin-panel/actions/users-list','Accounts');?></li>
			<li num="withdraw"><?=anchor('admin-panel/withdraw','Withdraw');?></li>
			<li num="pages"><?=anchor('admin-panel/actions/pages','Content');?></li>
			<li num="settings"><?=anchor('admin-panel/actions/settings','Settings');?></li>
			<li num="log"><?=anchor('admin-panel/log','Logs List');?></li>
			<li class="nav-header">Actions</li>
			<li><?=anchor('logoff','Logout');?></li>
		</ul>
	</div>
</div>