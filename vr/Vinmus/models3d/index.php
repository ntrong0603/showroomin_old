<?php 
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	session_start ();

	@define('_idShowroom',1);

	@define ( '_source' , './../sources/');
	@define ( '_lib' , './../quanly/lib/');

	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."class.database.php";
	include_once _lib."functions.php";
	include_once _lib."functions_giohang.php";
	include_once _lib."file_requick.php";
	include_once _source."counter.php";
	include_once _source."contact.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title>Models 3D</title>
	<style type="text/css" media="screen">
		body{
			margin: 0px;
		}
		canvas{width: 100%; height: 100%;}
	</style>
</head>
<body>
	<script src="js/three.js"></script>
	<script src="js/OrbitControls.js"></script>
	
	<script src="js/ColladaLoader.js"></script>

	<script src="js/Detector.js"></script>
	<script src="js/stats.min.js"></script>
	<script>

			if ( ! Detector.webgl ) Detector.addGetWebGLMessage();

			var container, stats, controls;
			var camera, scene, renderer, light;

			var clock = new THREE.Clock();

			var mixers = [];

			init();
			animate();

			function init() {

				container = document.createElement( 'div' );
				document.body.appendChild( container );

				camera = new THREE.PerspectiveCamera( 45, window.innerWidth / window.innerHeight, 0.1, 2000 );
				camera.position.set(1,1,4);


				controls = new THREE.OrbitControls( camera );
				controls.target.set( 0, 1, 0 );
				controls.update();

				scene = new THREE.Scene();
				scene.background = new THREE.Color( 0xa0a0a0 );
				scene.fog = new THREE.Fog( 0xa0a0a0, 200, 1000 );

				light = new THREE.HemisphereLight( 0xffffff, 0x444444 );
				light.position.set( 0, 200, 0 );
				scene.add( light );

				light = new THREE.DirectionalLight( 0xffffff );
				light.position.set( 0, 200, 100 );
				light.castShadow = true;
				light.shadow.camera.top = 180;
				light.shadow.camera.bottom = -100;
				light.shadow.camera.left = -120;
				light.shadow.camera.right = 120;
				scene.add( light );

				// scene.add( new THREE.CameraHelper( light.shadow.camera ) );

				// model
				var elf;
				var loadingManager=new THREE.LoadingManager(function(){
					scene.add(elf);
				});
				var loader = new THREE.ColladaLoader(loadingManager);
				loader.load( '<?php echo '../upload/models3d/giuong.dae' ?>', function ( object ) {

					console.log(object);

					elf= object.scene;
					
				} );

				renderer = new THREE.WebGLRenderer();
				renderer.setPixelRatio( window.devicePixelRatio );
				renderer.setSize( window.innerWidth, window.innerHeight);
				renderer.shadowMap.enabled = true;
				container.appendChild( renderer.domElement );

				window.addEventListener( 'resize', onWindowResize, false );

			}

			function onWindowResize() {

				camera.aspect = window.innerWidth / window.innerHeight;
				camera.updateProjectionMatrix();


				renderer.setSize( window.innerWidth, window.innerHeight );

			}

			//

			function animate() {

				requestAnimationFrame( animate );

				if ( mixers.length > 0 ) {

					for ( var i = 0; i < mixers.length; i ++ ) {

						mixers[ i ].update( clock.getDelta() );

					}

				}

				renderer.render( scene, camera );

				

			}

		</script>
</body>
</html>