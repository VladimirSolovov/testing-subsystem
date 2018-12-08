<?php
    include '/templates/header.php';
?>
    <form action="enter.php?action=registration" method="post">
        <div class="row">
            <label for="name">Логин:</label>
            <input type="name" class="text" name="name" id="name" />
        </div>
        <div class="row">
            <label for="password">Пароль:</label>
            <input type="password" class="text" name="password" id="password"/>
        </div>  
        <div class="row">
            <input type="submit" name="submit" id="btn-submit" value="Зарегистрироваться" />
        </div>
    </form>
<?php
    include '/templates/footer.php';
?>