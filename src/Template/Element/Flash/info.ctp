<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-info" onclick="this.classList.add('hidden')">
  <span class="glyphicon glyphicon glyphicon-hand-right" ></span> <?= $message ?>
</div>
