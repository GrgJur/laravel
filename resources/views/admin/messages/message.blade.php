<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<style>

		body {
		  margin: 0 auto;
		  max-width: 800px;
		  padding: 0 20px;
		}

		.container {
		  border: 2px solid #1976d2;
		  background-color: #31ccec;
		  border-radius: 5px;
		  padding: 10px;
		  margin: 10px 0;
		}

		.darker {
		  border-color: #26a69a;
		  background-color: #21ba45;
		}

		.container::after {
		  content: "";
		  clear: both;
		  display: table;
		}

		.container img {
		  float: left;
		  max-width: 60px;
		  width: 100%;
		  margin-right: 20px;
		  border-radius: 50%;
		}

		.container img.right {
		  float: right;
		  margin-left: 20px;
		  margin-right:0;
		}

		.time-right {
		  float: right;
		  color: #aaa;
		}

		.time-left {
		  float: left;
		  color: #fff;
		}
		.title-message {
		  color: #fff;
		}

		#container{
			width: 80%;
			padding: 10px;
			border: 2px solid black
		}

		input{
			margin: 2px;
		}

	</style>

	<script src="https://unpkg.com/vue@next"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>


</head>
<body>

    <div style="float: left; margin: 4px"><a href="{{route('homepage.index')}}">HOME</a></div>

    <div style="float: left; margin: 4px"><a href="{{route('admin.logout')}}">LOGOUT</a></div>

	<div id="container">

		<h3>Messaggi per {{ auth()->user()->firstname }} ({{ auth()->user()->email }})</h3>

		<div id="app">

			<form @submit.prevent="onSubmit">

				<select v-model="member_id" style="width: 100%">
					<option
						v-for="member in members"
						:key="member.id"
						:value="member.id"
						v-text="member.firstname" />
				</select>



				<textarea v-model="message" style="width: 100%"></textarea>

				<br>
				<button>Invia</button>
			</form>

			<hr>

			<div
				v-for="(message, index) in messages"
				:key="message.id"
				class="container"
				:class="{ 'darker': message.sent == 'instructor' }"
			>
				<small class="title-message">@{{ message.title }}</small>
				<p>@{{ message.text }}</p>
				<span class="time-left">@{{ message.created }}</span>
			</div>
		</div>

	</div>


	<script>

		window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
		window.axios.defaults.withCredentials = true;

		var app = Vue.createApp({
		    data() {
		      return {
		      	page: 1,
		        messages: [],
		        message: '',
		        member_id: null,
		        members: []
		      };
		    },

			mounted() {
		      console.log('mounted!')

				axios.get('/admin/messages/chat', {
					params: {
						page: this.page
					}
				})
				  .then((response) => {

				   this.messages = response.data.message

				   console.log(this.messages)

				   this.page++

				  })
				  .catch(function (error) {
				  	console.log(error)
				  })

				axios.get('/admin/members')
					.then((response) => {
						console.log(response.data)
						this.members = response.data
					})
		    },

		    methods: {
		    	onSubmit() {
		    		if (!this.member_id) {
		    			alert('Seleziona un allievo prima di inviare');
		    			return;
		    		}

		    		if (this.message === '') {
		    			alert('Inserisci un messaggio prima di inviare');
		    			return;
		    		}

		    		const membro = this.members.find((member) => member.id == this.member_id)

		    		const titolo = 'Messaggio inviato da {{ auth()->user()->firstname }} a ' + membro.firstname;

			    	axios.post('/admin/messages/store', {
						title: titolo,
						text: this.message,
						member_id: this.member_id
					})
					  .then((response) => {
					   this.messages.unshift(response.data.message);
					   this.message = ''
					  })
					  .catch(function (error) {
					  	console.log(error)
					  })
		    	}
		    }

		  });

			const vm = app.mount('#app')
	</script>

</body>
</html>
