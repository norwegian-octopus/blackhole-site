import * as THREE from 'three';
import { GLTFLoader } from 'GLTFLoader';

let scene = new THREE.Scene();
let camera = new THREE.PerspectiveCamera(90, window.innerWidth / window.innerHeight, 0.01, 1000);
camera.position.z = 3.8;
camera.position.x = 0;
camera.position.y = 0;

let renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
renderer.setClearColor(0x000000, 0);
// renderer.setSize(1280, 720);
renderer.setSize(window.innerWidth, window.innerHeight);
renderer.domElement.setAttribute('id', 'animated-obj');
let insert = document.querySelector('.model-container');
insert.insertAdjacentElement('afterbegin', renderer.domElement);

const aLight = new THREE.AmbientLight(0x404040, 1);
scene.add(aLight);

const pLight = new THREE.PointLight(0x404040, 1.7);
pLight.position.set(0, -3, 7);
scene.add(pLight);

// const helper = new THREE.PointLighterHelper(pLight);
// scene.add(helper);

let loader = new GLTFLoader();
let obj = null;

loader.load('/components/3Dmodels/blackhole.glb', function (gltf) {
    obj = gltf;
    obj.scene.scale.set(1.3, 1.3, 1.3);
    obj.scene.rotation.x = 0.015;
    obj.scene.position.z = 0;
    scene.add(obj.scene);
});

// TEST TEXTURES


function animate() {
    requestAnimationFrame(animate);
    if (obj) {
        obj.scene.rotation.y += 0.001;
    }
    renderer.render(scene, camera);
}

animate();

// let count = 0;
// let run;

// function countRun() {
//     if (run) return;
//     // или 
//     // if (run) clearInterval(run);
//     run = setInterval(function () {
//         count++;
//     }, 1000)
// }

// function countStop() {
//     count = 0;
//     clearInterval(run);
//     run = false;
// }





// Функции для события - приближение/отдаление черной дыры при наведении на кнопку ВХОД.


function animateEventTo() {
   
    if (obj.scene.rotation.x) {
        obj.scene.rotation.x = 0;
    }

    if (obj.scene.position.z <= 2.6) {
        obj.scene.position.z += 0.01;
        obj.scene.rotation.x -= 0.0015;
        requestAnimationFrame(animateEventTo);
    }
    console.log(`TO position Z ${obj.scene.position.z}`);
    console.log(`TO rotation X ${obj.scene.rotation.x}`);

    renderer.render(scene, camera);
}

function animateEventFrom() {

    if (obj.scene.rotation.x >= 0.015) {
        obj.scene.rotation.x = 0.015;
    }

    if (obj.scene.position.z >= 0) {
        obj.scene.position.z -= 0.01;
        obj.scene.rotation.x += 0.0015;
        requestAnimationFrame(animateEventFrom);
    }

    console.log(`FROM position Z ${obj.scene.position.z}`);
    console.log(`FROM rotation X ${obj.scene.rotation.x}`);

    renderer.render(scene, camera);
}

// запуск

let flag = true;

let login = document.querySelector('.main-login');
login.addEventListener('mouseover', () => animateEventTo());
login.addEventListener('mouseout', () => animateEventFrom());
