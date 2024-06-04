<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-success" onclick="this.classList.add('hidden')">
  <span class="glyphicon glyphicon-ok" ></span> <strong><?= " ".$message ?></strong>
</div>
