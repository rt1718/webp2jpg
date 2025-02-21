<?php
include_once '../vendor/autoload.php';
include_once '../src/header.php';

?>

<form action="convert.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <input type="file" class="form-control" name="file" id="file" accept="image/webp, image/png" required>
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" name="title" id="title"
               placeholder="Название для картинки">
    </div>
    <div class="mb-3 form-floating">
        <input type="number" class="form-control" id="quality"
               value="90">
        <label for="quality">Качество</label>
    </div>
    <div class="mb-3 d-flex justify-content-end">
        <button type="submit" class="btn btn-secondary">Конвертировать</button>
    </div>
</form>

<script>
    document.getElementById('convertForm').addEventListener('submit', async function (event) {
        event.preventDefault();

        const form = document.getElementById('convertForm');
        const formData = new FormData(form);

        try {
            const response = await fetch('convert.php', {
                method: 'POST',
                body: formData,
            });

            if (response.ok) {
                const blob = await response.blob();
                const downloadLink = document.createElement('a');
                downloadLink.href = URL.createObjectURL(blob);
                downloadLink.download = formData.get('title') + '.jpg';
                downloadLink.click();
            } else {
                const errorText = await response.text();
                alert('Ошибка: ' + errorText);
            }
        } catch (error) {
            alert('Ошибка отправки: ' + error.message);
        }
    });
</script>

<?php include_once '../src/footer.php'; ?>
