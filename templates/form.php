<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Оставьте отзыв</title>
</head>
<body>
    <h1>Оцените качество обслуживания</h1>

    <?php if (!empty($errors)): ?>
        <ul style="color: red;">
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="post">
        <p>
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <label>
                    <input type="radio" name="rating" value="<?= $i ?>" <?= (isset($rating) && $rating == $i) ? 'checked' : '' ?>>
                    <?= $i ?>
                </label>
            <?php endfor; ?>
        </p>
        <p>
            <textarea name="comment" placeholder="Оставьте комментарий (необязательно)" rows="4" cols="50"><?= htmlspecialchars($comment ?? '') ?></textarea>
        </p>
        <button type="submit">Отправить</button>
    </form>
</body>
</html>
