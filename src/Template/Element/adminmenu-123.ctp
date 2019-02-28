&nbsp;&nbsp;Hello <strong><?php if(isset($_SESSION['USERNAME'])){echo $_SESSION['NAME'];}?>
</strong>&nbsp;&nbsp;<? echo  $this->Html->link(__('Logout', true),array('controller' => 'users','action'=>'logout'))?>
<?php /*?><div class="menu_bg"><div class="submenu_right">
<? if($sessionval['type']=='regular' and !empty($sessionval['mainmenu'])){ 
if (in_array($this->request->params['controller'].":".$this->request->params['action'], $sessionval['mainmenu'])) { } else { $this->requestAction(array('controller' => 'users', 'action' => 'checkRestriction',$sessionval['mainmenu'][1]));}
echo $sessionval['menus']; } else if($sessionval['type']=='admin') { ?>
<ul id="nav" class="dropdown dropdown-horizontal">
<? $adminmenu=$this->requestAction(array('controller' => 'menuheaders', 'action' => 'menu')); foreach($adminmenu as $key=>$value) {?>
<? $menu=$this->requestAction(array('controller' => 'menus', 'action' => 'menu',$adminmenu[$key]["mh"]["id"])); if(!empty($menu))  {?> <li><span class="dir"><?php echo $adminmenu[$key]["mh"]["name"]; ?></span> <ul><? foreach($menu as $key=>$value) {?>
<li><? echo $this->Html->link(__($menu[$key]["m"]["name"]), array('controller' => $menu[$key]["m"]["controller"],'action' => $menu[$key]["m"]["action"]));?></li><? } ?></ul><? } else { ?><li><?php echo $this->Html->link(__($adminmenu[$key]["mh"]["name"]), array('controller' => $adminmenu[$key]["mh"]["action"],'action' => 'index'));  }  ?>
</li><? } ?>
</ul>
<? } else if($sessionval['type']=='regular' and empty($sessionval['mainmenu'])) {  $this->requestAction(array('controller' => 'users', 'action' => 'checkSession','YOU ARE NOT ACTIVE USER NOW.PLEASE TRY AFTER SOMETIME'));} else { }?>
</div><div class="submenu_heading">NCR PROPERTY PANEL</div></div><?php */?>