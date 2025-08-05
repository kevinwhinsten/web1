<form action="edit_author.php" method="post" class="mb-4">
    <div class="mb-3">
        <label for="author_id" class="form-label">Select User</label>
        <select name="author_id" id="author_id" class="form-select" required>
            <?php
            include '../include/DatabaseConnection.php';
            $stmt = $pdo->query("SELECT * FROM author");
            $authors = $stmt->fetchAll();
            foreach ($authors as $author): ?>
                <option value="<?= htmlspecialchars($author['id']) ?>">
                    <?= htmlspecialchars($author['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div class="mb-3">
        <label for="new_user_name" class="form-label">New User</label>
        <input type="text" name="new_user_name" id="new_user_name" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary" onclick="return confirm('Xác nhận thay đổi?')">Edit User</button>
    <a href="manage_user_module.php" class="btn btn-secondary">⬅️ Quay lại</a>
</form>