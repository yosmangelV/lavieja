<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="La vieja" />
	<meta name="author" content="" />
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="icon" href="/images/favicon.ico">

	<title>La vieja</title>


	<!-- header -- CSS -->	
	<link rel="stylesheet" href="/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="/css/font-icons/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="/css/bootstrap.css">
	<link rel="stylesheet" href="/css/neon-core.css">
	<link rel="stylesheet" href="/css/neon-theme.css">
	<link rel="stylesheet" href="/css/neon-forms.css">
	<link rel="stylesheet" href="/css/custom.css">
	
	@yield('extracss')

	<!-- header -- JS -->
	
	<script src="/js/jquery-1.11.3.min.js"></script>
	
	@yield('extrajs')


</head>

<body class="page-body" >
	<div class="page-container">
	
		@yield('menu')

		<div class="main-content">
			@yield('banner')

			<hr /><!-- Línea de separacion -->

			@yield('content')

			@yield('footer')
			<div class="cargando" ></div>
		</div>	
	</div>


	@yield('modales')

	<script>
		//Cerrar un modal y abrir uno nuevo
		var modalUniqueClass = ".modal";
		$('.modal').on('show.bs.modal', function(e) {
			var $element = $(this);
			var $uniques = $(modalUniqueClass + ':visible').not($(this));
			if ($uniques.length) {
				$uniques.modal('hide');
				$uniques.one('hidden.bs.modal', function(e) {
					$element.modal('show');
				});
				return false;
			}
		});
	</script>

	<!-- Bottom scripts (common) -->
	<script src="/js/gsap/TweenMax.min.js"></script>
	<script src="/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="/js/bootstrap.js"></script>
	<script src="/js/joinable.js"></script>
	<script src="/js/resizeable.js"></script>
	<script src="/js/neon-api.js"></script>
	<script src="/js/jquery.bootstrap.wizard.min.js"></script>
	<script src="/js/bootstrap-switch.min.js"></script>

	<!-- JavaScripts initializations and stuff -->
	<script src="/js/neon-custom.js"></script>
	<script src="/js/neon-demo.js"></script>
	<!-- Imported styles on this page -->
	@yield('extracssfooter')

	<!-- Imported scripts on this page -->
	@yield('extrajsfooter')
</body>

</html>