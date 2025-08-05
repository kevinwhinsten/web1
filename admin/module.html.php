<a href="add_module.php">add_module</a> <a href="edit_module.php">edit_module</a> <a href="delete_module.php">delete_module</a><br>
<select>
    <?php foreach($modules as $module): ?>
    <option><?=htmlspecialchars($module['name'])?></option>
    <?php endforeach;?>
</select>
