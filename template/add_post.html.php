
<form action="module" method="post" enctype="multipart/form-data" class="p-4">
    <div class="form-group">
        <label for="module">Select Module</label>
        <select name="module" id="module" class="form-control" required>
            <?php foreach ($modules as $module): ?>
                <option value="<?php echo htmlspecialchars($module['id']); ?>">
                    <?php echo htmlspecialchars($module['name']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="title">Title</label>
        <textarea id="title" name="title" class="form-control" placeholder="Type something..." required rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="img" class="form-label">Attach Image</label>
        <input type="file" class="form-control-file" name="img" id="img" accept="image/*">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>