<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>

    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/styleSignUp.css">
</head>

<body>
    <div class="model-container">
        <script type="importmap">
            {
            "imports": {
                "three": "/node_modules/three/build/three.module.js",
                "GLTFLoader": "/node_modules/three/examples/jsm/loaders/GLTFLoader.js",
                "OrbitControls": "/node_modules/three/examples/jsm/controls/OrbitControls.js"
        }
    }
        </script>
        <script type="module" src="/js/stars.js"></script>
        <!-- <script type="module" src="/js/signUpBlackhole.js"></script> -->
    </div>
    <div class="signup-container">
        <div class="signup-container-top">
            <div class="signup-return-back">
                <a href="/">
                    <div class="signup-return-back-icon"></div>
                </a>
            </div>
        </div>
        <form class="signup-form" action="" method="post">
            <div class="signup-wrapper">
                <div class="signup-errors">
                    <span><?= $errors['login']; ?></span>
                </div>
                <div class="signup-login">
                    <input class="input-primary signup-input signup-login-field" type="text" name="login" placeholder="login" value="<?= $input['login']; ?>">
                </div>
                <div class="signup-errors">
                    <span><?= $errors['name']; ?></span>
                </div>
                <div class="signup-name">
                    <input class="input-primary signup-input signup-name-field" type="text" name="name" placeholder="name" value="<?= $input['name']; ?>">
                </div>
                <div class="signup-errors">
                    <span><?= $errors['surname']; ?></span>
                </div>
                <div class="signup-surname">
                    <input class="input-primary signup-input signup-surname-field" type="text" name="surname" placeholder="surname" value="<?= $input['surname']; ?>">
                </div>
                <div class="signup-errors">
                    <span><?= $errors['birthdate']; ?></span>
                </div>
                <div class="signup-birthdate">
                    <input class="input-primary signup-input signup-birthdate-field" type="date" name="birthdate" placeholder="birthdate" value="<?= $input['birthdate']; ?>">
                </div>
                <div class="signup-errors">
                    <span><?= $errors['email']; ?></span>
                </div>
                <div class="signup-email">
                    <input class="input-primary signup-input signup-email-field" type="text" name="email" placeholder="email" value="<?= $input['email']; ?>" title="Пример: email@email.com">
                </div>
                <div class="signup-errors">
                    <span><?= $errors['password1']; ?></span>
                </div>
                <div class="signup-password">
                    <input class="input-primary signup-input signup-password-field" type="password" name="password1" placeholder="password" title="Пароль должен содержать не менее 8 знаков, включая буквы в верхнем и нижнем регистрах, символы, цифры">
                    <!-- <div class="show-password-icon">show pass</div> -->
                </div>
                <div class="signup-errors">
                    <span><?= $errors['password2']; ?></span>
                </div>
                <div class="signup-password">
                    <input class="input-primary signup-input signup-password-field" type="password" name="password2" placeholder="repeat password" title="Пароль должен содержать не менее 8 знаков, включая буквы в верхнем и нижнем регистрах, символы, цифры">
                    <!-- <div class="show-password-icon">show pass</div> -->
                </div>
            </div>
            <div class="sign-up-legal">
                <span>Регистрируясь, вы принимаете условия
                    <a href="/legal">Пользовательского соглашения</a>
                    и
                    <a href="/legal">Политики конфиденциальности</a>
                </span>
            </div>
            <div class="btn-wrapper">
                <button class="btn-primary signup-btn" type="submit">
                    <span class="btn-content">ENLIST</span>
                </button>
            </div>
        </form>
    </div>
</body>

</html>