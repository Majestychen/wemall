<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
梦云智工作室
-->
<form id="originForm" class="form-horizontal" name="originForm" method="post" action="<?php echo ($url); ?>" />
<fieldset>
   <legend>修改状态</legend>
        <div class="control-group">
            <label class="control-label" for="title">国际物流单号</label>
            <div class="controls">
            <input type="text" name='international_orderid' id="international_orderId">
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">保存</button>
            <input type="button"  onclick="javascript:history.back(-1);" value="返回" class="btn">
        </div>
</fieldset>
</form>