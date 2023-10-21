<script lang="ts">
	import type { PageData } from './$types';
	import { setContext, getContext } from 'svelte';
	export let data;
	import { writable, get } from 'svelte/store';
	async function sendForm(event) {
		event.preventDefault();
		const form = event.target;
		const formData = new FormData(form);
		const res = await fetch('/login', {
			method: 'POST',
			body: formData
		});

		const json = await res.json();
		if (json.error) {
			alert(json.message);
			form.reset();
		} else {
			console.log('the response = ', json);
			localStorage.setItem(
				'loggedIn',
				JSON.stringify({
					email: json.email,
					loggedIn: true
				})
			);
			location.href = '/';
		}
	} // export let data: PageData;
</script>

<h1 class="text-5xl text-center">Welcome back</h1>

<div class="flex mt-6 items-center justify-center">
	<form
		on:submit={sendForm}
		class="flex text-black flex-col gap-8 items-center justify-center py-10"
	>
		<label class="text-white text-xl" for="email">Email</label>
		<input
			type="email"
			name="email"
			class="rounded-lg h-8 focus:border-yellow-400"
			required
			id="email"
		/>
		<label for="password" class="text-white text-xl">Password</label>
		<input type="password" name="password" required class="rounded-lg h-8" id="password" />
		<input
			type="submit"
			class="text-white font-bold text-3xl border-8 p-4 rounded-lg hover:border-red-500 cursor-pointer"
			value="Log In"
		/>
	</form>
</div>
