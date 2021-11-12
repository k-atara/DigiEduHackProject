import * as THREE from 'https://unpkg.com/three/build/three.module.js';
import {OrbitControls} from "https://unpkg.com/three@0.119.0/examples/jsm/controls/OrbitControls.js";
import Stats from "https://unpkg.com/three/examples/jsm/libs/stats.module.js";

"use strict";

let renderer, scene, camera, mesh, cameraControls, gui;

function init() {
  let container = document.getElementById('container');
  // RENDERER ENGINE
  renderer = new THREE.WebGLRenderer({antialias: true});
  renderer.setClearColor(new THREE.Color(255, 255, 255));
  renderer.setSize(window.innerWidth, window.innerHeight);
  document.body.appendChild(renderer.domElement);

  // SCENE
  scene = new THREE.Scene();

  // CAMERA
  let fovy = 60.0;    // Field ov view
  let aspectRatio = window.innerWidth / window.innerHeight;
  let nearPlane = 0.1;
  let farPlane = 10000.0;
  camera = new THREE.PerspectiveCamera(fovy, aspectRatio, nearPlane, farPlane);
  camera.position.set(0, 0, 3);
  cameraControls = new OrbitControls(camera, renderer.domElement);
          
  // MODEL
  // SPHERE
  let geometry = new THREE.SphereGeometry(1, 50, 50);

  let n = geometry.attributes.position.count; //vertices number 
  console.log(n)
  let colors = new Float32Array(3*n);
  for(let i =0; i<3*n; i++){
      colors[i]=Math.random();
  }
  geometry.setAttribute("colors", new THREE.BufferAttribute(colors, 3))

  // MATERIAL
  let material = new THREE.ShaderMaterial( {
      uniforms: {
          color: {
            value: new THREE.Color(0,1,0)
          },
          alpha: {
            value: 1
          }
      },
      vertexShader:   document.getElementById('vertexshader').textContent,
      fragmentShader: document.getElementById('fragmentshader').textContent,
      transparent: true
  });

  // MESH
  mesh = new THREE.Mesh(geometry, material);

  // SCENE HIERARCHY
  scene.add(mesh);

  // GUI
  gui = new dat.GUI();
  gui.close();

  // DRAW SCENE IN A RENDER LOOP (ANIMATION)
  renderLoop();
  container.appendChild(renderer.domElement);
  
}

function renderLoop() {
    renderer.render(scene, camera); // DRAW SCENE
    updateScene();
    requestAnimationFrame(renderLoop);
}

function updateScene() {
   //mesh.material.uniforms["color"].value = new THREE.Color(Math.random(), Math.random(), Math.random())
   //mesh.material.uniforms["alpha"].value = Math.random();
   let colors = mesh.geometry.attributes.colors;
   let n = colors.count;
   for(let i = 0; i<3*n; i++){
     colors.array[i] = colors.array[i] * 0.95;
     if(colors.array[i]< 0.001)
      colors.array[i] = 1.0;
   }
   colors.needsUpdate = true;
}

// EVENT LISTENERS & HANDLERS

document.addEventListener("DOMContentLoaded", init);

window.addEventListener("resize", () => {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    cameraControls.update();
    renderer.setSize(window.innerWidth, window.innerHeight);
}, false);