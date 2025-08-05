<form action="edit_module.php" method="post">
       <label for="module_id"></label>
       <select name="module_id" required>
       <?php
       include '../include/DatabaseConnection.php';
       $stmt =$pdo->query("SELECT * FROM module");
       $modules =$stmt->fetchAll();
       foreach($modules as $module):?>
       <option value="<?= htmlspecialchars($module['id']) ?>">
    <?= htmlspecialchars($module['name']) ?>
</option>
        <?php endforeach;?>
       </select>
       <label for ="new_module_name" class="form-label">New Module Name</label>
       <input type="text" name="new_module_name" class="form-control"required>

     <button type="submit" onclick="return confirm('xác nhận thay đổi?')">Edit Module</button>
     <a href="manage_user_module.php" class="btn btn-secondary">⬅️ Quay lại</a>
</form>