<!-- file path View/SubSectors/get_by_sector_id.ctp -->
<?php foreach ($json_array as $key => $value): ?>
<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
<?php endforeach; ?>