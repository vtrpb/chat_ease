<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-warning" onclick="this.classList.add('hidden')">
  <span class="glyphicon glyphicon-exclamation-sign" ></span><strong><?= " ".$message ?></strong>
</div>
