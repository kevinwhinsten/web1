<form action="delete_module.php" method="post">
    <label for="module_id">Chọn môn học để xóa:</label>
    <select name="module_id" id="module_id" required>
        <?php
        include '../include/DatabaseConnection.php';
        $stmt = $pdo->query("SELECT * FROM module");
        $modules = $stmt->fetchAll();
        foreach ($modules as $module): ?>
            <option value="<?= htmlspecialchars($module['id']) ?>">
                <?= htmlspecialchars($module['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit">🗑️ Xóa môn học</button>
    <a href="manage_user_module.php" class="btn btn-secondary">⬅️ Quay lại</a>
</form>