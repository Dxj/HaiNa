<?php /* Smarty version 2.6.19, created on 2012-03-07 10:24:45
         compiled from searchrst.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_tpl_vars['title']; ?>
</title>
<link rel="stylesheet" href="css/nominate.css" />
<link rel="stylesheet" href="css/table.css" />
</head>
<script language="javascript" src="js/createxmlhttp.js"></script>
<script language="javascript" src="js/showcommo.js"></script>
<body>
<?php if ($this->_tpl_vars['result'] == 'FALSE'): ?>
<table width="540" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
   	  <td colspan="5" align="center" valign="middle" height="30" class="first">没有找到相关商品信息</td>
    </tr>
</table>
<?php else: ?>
<table width="540" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
   	  <td colspan="5" align="center" valign="middle" height="30" class="first">商品信息</td>
    </tr>
<?php unset($this->_sections['sea_id']);
$this->_sections['sea_id']['name'] = 'sea_id';
$this->_sections['sea_id']['loop'] = is_array($_loop=$this->_tpl_vars['searcharr']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['sea_id']['show'] = true;
$this->_sections['sea_id']['max'] = $this->_sections['sea_id']['loop'];
$this->_sections['sea_id']['step'] = 1;
$this->_sections['sea_id']['start'] = $this->_sections['sea_id']['step'] > 0 ? 0 : $this->_sections['sea_id']['loop']-1;
if ($this->_sections['sea_id']['show']) {
    $this->_sections['sea_id']['total'] = $this->_sections['sea_id']['loop'];
    if ($this->_sections['sea_id']['total'] == 0)
        $this->_sections['sea_id']['show'] = false;
} else
    $this->_sections['sea_id']['total'] = 0;
if ($this->_sections['sea_id']['show']):

            for ($this->_sections['sea_id']['index'] = $this->_sections['sea_id']['start'], $this->_sections['sea_id']['iteration'] = 1;
                 $this->_sections['sea_id']['iteration'] <= $this->_sections['sea_id']['total'];
                 $this->_sections['sea_id']['index'] += $this->_sections['sea_id']['step'], $this->_sections['sea_id']['iteration']++):
$this->_sections['sea_id']['rownum'] = $this->_sections['sea_id']['iteration'];
$this->_sections['sea_id']['index_prev'] = $this->_sections['sea_id']['index'] - $this->_sections['sea_id']['step'];
$this->_sections['sea_id']['index_next'] = $this->_sections['sea_id']['index'] + $this->_sections['sea_id']['step'];
$this->_sections['sea_id']['first']      = ($this->_sections['sea_id']['iteration'] == 1);
$this->_sections['sea_id']['last']       = ($this->_sections['sea_id']['iteration'] == $this->_sections['sea_id']['total']);
?> 
  <tr>
    <td width="140" height="100" rowspan="4" align="center" valign="middle" class="left"><img src="<?php echo $this->_tpl_vars['searcharr'][$this->_sections['sea_id']['index']]['pics']; ?>
" width="100" height="80" alt="<?php echo $this->_tpl_vars['searcharr'][$this->_sections['sea_id']['index']]['name']; ?>
" style="border: 1px solid #f0f0f0;"></td>
    <td width="100" height="25" align="center" valign="middle" class="center">商品名称：</td>
    <td width="100" height="25" align="left" valign="middle" class="center">&nbsp;<?php echo $this->_tpl_vars['searcharr'][$this->_sections['sea_id']['index']]['name']; ?>
</td>
    <td width="100" height="25" align="center" valign="middle" class="center">商品类别：</td>
    <td width="100" height="25" align="left" valign="middle" class="right">&nbsp;<?php echo $this->_tpl_vars['searcharr'][$this->_sections['sea_id']['index']]['class']; ?>
</td>
  </tr>
  <tr>
    <td height="25" align="center" valign="middle" class="center">商品品牌：</td>
    <td height="25" align="left" valign="middle" class="center">&nbsp;<?php echo $this->_tpl_vars['searcharr'][$this->_sections['sea_id']['index']]['brand']; ?>
</td>
    <td height="25" align="center" valign="middle" class="center">商品型号：</td>
    <td height="25" align="left" valign="middle" class="right">&nbsp;<?php echo $this->_tpl_vars['searcharr'][$this->_sections['sea_id']['index']]['model']; ?>
</td>
  </tr>
  <tr>
    <td height="25" align="center" valign="middle" class="center">商品产地：</td>
    <td height="25" align="left" valign="middle" class="center">&nbsp;<?php echo $this->_tpl_vars['searcharr'][$this->_sections['sea_id']['index']]['area']; ?>
</td>
    <td height="25" align="center" valign="middle" class="center">商品库存：</td>
    <td height="25" align="left" valign="middle" class="right">&nbsp;<?php echo $this->_tpl_vars['searcharr'][$this->_sections['sea_id']['index']]['stocks']; ?>
</td>
  </tr>
  <tr>
    <td height="25" align="center" valign="middle" class="center">市场价格：</td>
    <td height="25" align="left" valign="middle" class="center">&nbsp;<?php echo $this->_tpl_vars['searcharr'][$this->_sections['sea_id']['index']]['m_price']; ?>
</td>
    <td height="25" align="center" valign="middle" class="center">会员价格：</td>
    <td height="25" align="left" valign="middle" class="right">&nbsp;<?php echo $this->_tpl_vars['searcharr'][$this->_sections['sea_id']['index']]['v_price']; ?>
</td>
  </tr>
  <tr>
    <td height="50" align="center" valign="middle" class="left">商品简介：</td>
    <td colspan="3" class="center">&nbsp;<?php echo $this->_tpl_vars['searcharr'][$this->_sections['sea_id']['index']]['info']; ?>
</td>
    <td align="center" valign="middle" class="right"><input id="buy" name="buy" type="button" value="" class="buy" onclick="return subbuycommo(<?php echo $this->_tpl_vars['searcharr'][$this->_sections['sea_id']['index']]['id']; ?>
)" ></td>
  </tr>
<?php endfor; endif; ?>
</table>
<?php endif; ?>
</body>
</html>