<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-danger" onclick="this.classList.add('hidden')">
  <span class="glyphicon glyphicon-pushpin" ></span> <strong><?= " ".$message ?></strong>
</div>
