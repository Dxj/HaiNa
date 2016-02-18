<?php /* Smarty version 2.6.19, created on 2010-12-08 08:39:16
         compiled from allpub.tpl */ ?>
<table width="400" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2" height="25" align="center" valign="middle" class="first">全部公告</td>
  </tr>
<?php unset($this->_sections['arr_id']);
$this->_sections['arr_id']['name'] = 'arr_id';
$this->_sections['arr_id']['loop'] = is_array($_loop=$this->_tpl_vars['arr']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['arr_id']['show'] = true;
$this->_sections['arr_id']['max'] = $this->_sections['arr_id']['loop'];
$this->_sections['arr_id']['step'] = 1;
$this->_sections['arr_id']['start'] = $this->_sections['arr_id']['step'] > 0 ? 0 : $this->_sections['arr_id']['loop']-1;
if ($this->_sections['arr_id']['show']) {
    $this->_sections['arr_id']['total'] = $this->_sections['arr_id']['loop'];
    if ($this->_sections['arr_id']['total'] == 0)
        $this->_sections['arr_id']['show'] = false;
} else
    $this->_sections['arr_id']['total'] = 0;
if ($this->_sections['arr_id']['show']):

            for ($this->_sections['arr_id']['index'] = $this->_sections['arr_id']['start'], $this->_sections['arr_id']['iteration'] = 1;
                 $this->_sections['arr_id']['iteration'] <= $this->_sections['arr_id']['total'];
                 $this->_sections['arr_id']['index'] += $this->_sections['arr_id']['step'], $this->_sections['arr_id']['iteration']++):
$this->_sections['arr_id']['rownum'] = $this->_sections['arr_id']['iteration'];
$this->_sections['arr_id']['index_prev'] = $this->_sections['arr_id']['index'] - $this->_sections['arr_id']['step'];
$this->_sections['arr_id']['index_next'] = $this->_sections['arr_id']['index'] + $this->_sections['arr_id']['step'];
$this->_sections['arr_id']['first']      = ($this->_sections['arr_id']['iteration'] == 1);
$this->_sections['arr_id']['last']       = ($this->_sections['arr_id']['iteration'] == $this->_sections['arr_id']['total']);
?>
  <tr>
    <td width="70%" height="25" align="right" valign="middle" class="left">标题：<a href="#" onclick="return showme(<?php echo $this->_tpl_vars['arr'][$this->_sections['arr_id']['index']]['id']; ?>
,'showpub.php')"><?php echo $this->_tpl_vars['arr'][$this->_sections['arr_id']['index']]['title']; ?>
</a></td>
    <td width="30%" height="25" align="center" valign="middle" class="right">&nbsp;<?php echo $this->_tpl_vars['arr'][$this->_sections['arr_id']['index']]['addtime']; ?>
</td>
    </tr>
<?php endfor; endif; ?>
</table>