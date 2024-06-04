<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-danger" onclick="this.classList.add('hidden')">
  <span class="glyphicon glyphicon-remove-sign" ></span><strong><?= " ".$message ?></strong>
</div>
