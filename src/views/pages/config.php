<?=$render('header', ['loggedUser' => $loggedUser]);?>
    <section class="container main">
        <?=$render('sidebar', ['activeMenu' => 'config']);?>
        <section class="feed mt-10">            
            
            <div class="row">
                <div class="column pr-5">

                    <h1 style="color:#555;">Configurações</h1>

                    <?php if(!empty($_SESSION['flash'])): ?>
                        <div class="alert"><?php echo $_SESSION['flash']; ?></div>
                    <?php endif; ?>

                    <?php if(!empty($_SESSION['success'])): ?>
                        <div class="success"><?php echo $_SESSION['success']; ?></div>
                    <?php endif; ?>

                    <form action="<?=$base;?>/config/<?=$loggedUser->id;?>/edit" method="post">

                        <div class="up-files-area">
                            <label for="avatar">Novo Avatar: <br>
                                <input type="file" name="avatar" id="avatar" value="<?=$loggedUser->avatar?>">
                            </label>

                            <label for="cover">Nova Capa: <br>
                                <input type="file" name="cover" id="cover" value="<?=$loggedUser->cover?>">
                            </label>
                        </div>

                        <div class="user-data-area">

                            <label for="email">E-mail:</label><br>
                            <input type="email" name="email" id="email" value="<?=$loggedUser->email?>" disabled ><br><br>

                            <label for="name">Nome Completo:</label><br>
                            <input type="text" name="name" id="name" value="<?=$loggedUser->name?>" required><br><br>
                            
                            <label for="birthdate">Data de Nascimento:</label><br>
                            <input type="date" name="birthdate" id="birthdate" value="<?=$loggedUser->birthdate?>" required><br><br>
                                                        
                            <label for="city">Cidade:</label><br>
                            <input type="text" name="city" id="city" value="<?=$loggedUser->city?>"><br><br>
                            
                            <label for="work">Trabalho:</label><br>
                            <input type="text" name="work" id="work" value="<?=$loggedUser->work?>"><br><br>

                        </div>

                        <div class="password-area">

                            <label for="new_password">Nova Senha:</label><br>
                            <input type="text" name="new_password" id="new_password"><br><br>

                            <label for="confirm_new_password">Confirmar Nova Senha:</label><br>
                            <input type="text" name="confirm_new_password" id="confirm_new_password"><br><br>

                        </div>

                        <br>

                        <button class="button" type="submit">Salvar</button>

                    </form>

                </div>
                <div class="column side pl-5">
                    <?=$render('right-side');?>
                </div>
            </div>

        </section>
    </section>
<?=$render('footer');