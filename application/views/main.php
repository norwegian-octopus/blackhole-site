<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Black Hole</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <?php include(ROOT . '/application/views/header.php') ?>
    <div class="wrapper-container">
        <a class="main-logo-1" href="/">
            <div class="logo">
                <span>BLACK</span>
            </div>
        </a>
        <a class="main-logo-2" href="/">
            <div class="logo">
                <span>HOLE</span>
            </div>
        </a>
        <div class="model-container">
            <script type="importmap">
                {
            "imports": {
                "three": "/node_modules/three/build/three.module.js",
                "GLTFLoader": "/node_modules/three/examples/jsm/loaders/GLTFLoader.js",
                "OrbitControls": "/node_modules/three/examples/jsm/controls/OrbitControls.js",
                "legendary-cursor": "/node_modules/legendary-cursor/dist/main.js"
        }
    }
        </script>
            <script type="module" src="/js/stars.js"></script>
            <!-- <script type="module" src="/js/starsExtra.js"></script> -->
            <script type="module" src="/js/blackhole.js"></script>
            <script defer type="module" src="/node_modules/legendary-cursor/dist/main.js"></script>
        </div>
    </div>
    <?php include(ROOT . '/application/views/footer.php') ?>
</body>

</html>