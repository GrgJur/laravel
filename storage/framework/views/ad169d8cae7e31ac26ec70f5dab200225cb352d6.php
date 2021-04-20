<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

	<style>

		body{
			background-color: #f2f7fc;
		}

		#container{
			width: 350px;
			padding: 10px;
			border: 2px solid black;
			position: absolute;
			left: 50%;
			top: 50%;
			-webkit-transform: translate(-50%, -50%);
			transform: translate(-50%, -50%);
		}

		input{
			margin: 2px;
		}

	</style>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>


</head>
<body>

	<div id="container">

		<h3>LOGIN</h3>

		<?php echo $__env->make('layouts.partials.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<form method="POST" id="form">
			<?php echo csrf_field(); ?>
			<input type="text" name="email" id="email" placeholder="email"><br>
			<input type="password" name="password" id="password" placeholder="password"><br><br>
			<input type="submit" value="Login"><br>
		</form>
	</div>


	<script>
		window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
		window.axios.defaults.withCredentials = true;

		document.getElementById('form').addEventListener('submit', function(event) {
			event.preventDefault()

			axios.post('/admin/login', {
				email: document.getElementById('email').value,
				password: document.getElementById('password').value,
			})
			  .then(function (response) {

			    window.location.replace('/admin/home')

			  })
			  .catch(function (error) {
			  	alert('Le credenziali inserite sono sbagliate.')
			  	console.log(error)
			  })
		});
	</script>

</body>
</html>
<?php /**PATH /Users/damir/Projects/larajure/resources/views/admin/authentication/login.blade.php ENDPATH**/ ?>