<script>
	let options = ['Loose weight', 'Gain muscle', 'Get In shape'];


	async function register(event) {
		event.preventDefault();
		const formElement = event.target;
		const formData = new FormData(formElement);
		console.log('form data = ', formData);
		console.log(formData.get('email'));
		if (checkForm(formData)) {
			alert('sorry but you theres a missing field you havent submitted');
			formElement.reset();
			return null;
		}
		if (!confirmPassword(formData)) {
			alert('sorry your passwords dont match');
			formElement.reset();
			return null;
		}

        const res = await fetch('/signup', {
            method:'POST',
            body: formData
        })
        if (res.ok) {
        const data = await res.json();
        
        if(data.error){
            alert(data.message)
            formElement.reset();
        }else{
			localStorage.setItem(
				'loggedIn',
				JSON.stringify({
					email: data.email,
					loggedIn: true
				})
			);
			location.href = '/';
        }
    } else {
        // Handle the error response here, e.g., display an error message
        alert('Error: ' + res.status + ' ' + res.statusText);
    }
	}
	function checkForm(formData) {
		const formDataArray = Array.from(formData);
		const hasEmptyField = formDataArray.some((item) => {
			return item[1].toString().trim().length === 0;
		});
		return hasEmptyField;
	}
	function confirmPassword(formData) {
		const password = formData.get('password');
		const repeated_password = formData.get('repeated_password');
		return password === repeated_password;
	}
</script>

<div class="w-full max-w-md mx-auto p-6">
	<h2 class="text-2xl font-semibold mb-4">Creating an Account is Simple</h2>
	<p class="text-white mb-6">Just complete this form.</p>

	<form on:submit={register} action="" class="flex flex-col text-white space-y-4">
		<div>
			<label for="email" class="text-sm font-medium">Email</label>
			<input
				type="email"
				autocomplete="email"
				name="email"
				id="email"
				required
				class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500"
			/>
		</div>

		<div>
			<label for="password" class="text-sm font-medium">Password</label>
			<input
				type="password"
				required
				name="password"
				id="password"
				class="w-full border text-black rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500"
			/>
		</div>

		<div>
			<label for="repeated_password" class="text-sm font-medium">Confirm Password</label>
			<input
				type="password"
				required
				name="repeated_password"
				id="repeated_password"
				class="w-full text-black border rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500"
			/>
		</div>

		<div>
			<label for="weight" class="text-sm font-medium">Initial Weight (kg)</label>
			<input
				type="number"
				required
				name="weight"
				id="weight"
				class="w-full text-black border rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500"
			/>
		</div>

		<div>
			<label for="height" class="text-sm font-medium">Height (cm)</label>
			<input
				type="number"
				required
				name="height"
				id="height"
				class="w-full text-black border rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500"
			/>
		</div>

		<div>
			<label for="objective" class="text-sm font-medium">Your Objective</label>
			<select
				name="objective"
				required
				id="objective"
				class="text-black w-full border rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500"
			>
				{#each options as option}
					<option value={option}>{option}</option>
				{/each}
			</select>
		</div>

		<button
			type="submit"
			class="bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 focus:outline-none"
		>
			Sign Up
		</button>
	</form>
</div>
