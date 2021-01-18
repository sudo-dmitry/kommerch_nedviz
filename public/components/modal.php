<?php include 'form-data-processing.php'?>



<div id="simpleModal" class="modal">
    <div class="modal__content">
        <span class="closeBtn">&times;</span>
        <div class="modal-header">
            <div class="modal-title">Оставьте свои контактные данные и&nbspнаш менеджер свяжется с вами</div>
        </div>
        <form method="post" action="" id="theForm">
            <div class="modal-body">
                <?php if($msg != ''): ?>
                <div class="alert <?php echo $msgClass; ?>">
                    <?php echo $msg ?>
                </div>
                <?php endif; ?>
                <div class="form-group">
                    <label>Имя:</label>
                    <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
                </div>
                <div class="form-group">
                    <label>Телефон:</label>
                    <input type="tel" name="tel" class="form-control" pattern='^\+?\d{0,13}' value="<?php echo isset($_POST['tel']) ? $tel : ''; ?>">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn">Отправить</button>
            </div>
        </form>
    </div>
</div>