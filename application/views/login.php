<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>

    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/styleLogin.css">

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
        <script type="module" src="/js/loginBlackhole.js"></script>
        <script type="module" src="/js/loginAstronaut.js"></script>
    </div>
    <div class="login-container">
        <div class="login-return-back">
            <a href="/">
                <div class="login-return-back-icon"></div>
            </a>
        </div>
        <form class="login-form" action="" method="post">
            <div class="login-errors">
                <span class="login-errors-content"><?= $errors['email'] . ' ' . $errors['password']; ?></span>
            </div>
            <div class="login-wrapper">
                <div class="login-email">
                    <div class="email-icon">

                    </div>
                    <input class="input-primary login-input login-email-field" type="text" name="email" placeholder="email" value="<?= $input['email']; ?>">
                </div>
                <div class="login-password">
                    <div class="password-icon">

                    </div>
                    <input class="input-primary login-input login-password-field" type="password" name="password" placeholder="password">
                    <div class="show-password-icon"></div>
                </div>
            </div>
            <div class="btn-wrapper">
                <button class="btn-primary login-btn" type="submit">
                    <span class="btn-content">INTO HOLE</span>
                </button>
            </div>

        </form>
        <div class="signup">
            <span>If you don't have an account</span>
            <div class="btn-wrapper btn-primary signup-btn">
                <a class="signup-btn-link" href="/signup">
                    <div class="btn-content">SIGN UP</div>
                </a>
            </div>
        </div>
    </div>
</body>

</html>