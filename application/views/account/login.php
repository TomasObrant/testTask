<div class="container">
    <h1 class="mt-4 mb-3">Вход</h1>
    <div class="row">
        <div class="col-lg-8 mb-4">
            <form action="/account/login" method="post">
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Логин:</label>
                        <input type="text" class="form-control" name="login">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Пароль</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>
                <button type="submit" class="btn btnTheme btnShop text-white md-round py-md-3 px-md-4 py-2 px-3">Login</button>
            </form>
        </div>
    </div>
</div>