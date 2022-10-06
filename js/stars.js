import * as THREE from 'three';
import { GLTFLoader } from 'GLTFLoader';

let scene = new THREE.Scene();
let camera = new THREE.PerspectiveCamera(90, window.innerWidth / window.innerHeight, 0.1, 1000);
camera.position.z = -150;
camera.position.x = 150;
camera.position.y = 150;

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

loader.load('/components/3Dmodels/galactic_incident.glb', function (gltf) {
    obj = gltf;
    obj.scene.scale.set(1.3, 1.3, 1.3);
    scene.add(obj.scene);
});

// TEST TEXTURES


function animate() {
    requestAnimationFrame(animate);
    if (obj) {
        // obj.scene.rotation.x += 0.0001;
        // obj.scene.rotation.y += (Math.PI * 0.0001);;
        obj.scene.position.z += 0.01;

        if (obj.scene.position.z > 50) {
            obj.scene.position.z = 0;
        }
       
        // console.log(obj.scene.position.z);
    }
    renderer.render(scene, camera);
}


animate();