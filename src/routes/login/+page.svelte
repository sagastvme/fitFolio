<script lang="ts">
    import type { PageData } from './$types';
    export let data;
   async  function sendForm(){
        const res = await fetch('/login', {
			method: 'POST',
			body: JSON.stringify({
				'hola':'hola'
			})
		})
		
		const json = await res.json()
		let result = JSON.stringify(json)
    }
    // export let data: PageData;
</script>


<h1 class="text-5xl text-center">Welcome back</h1>

<div class="flex mt-6 items-center justify-center ">
    <form on:submit={sendForm} class="flex text-black flex-col gap-8 items-center justify-center py-10">
<label class="text-white text-xl" for="email">Email</label>
        <input type="email"  name="email" class="rounded-lg h-8 focus:border-yellow-400" required id="email">
        <label for="password" class="text-white text-xl">Password</label>
        <input type="password" name="password" required class="rounded-lg h-8" id="password">
        <label class="text-white text-xl flex gap-2 items-center justify-center" for="remember">Remember me
            <input type="checkbox" class="w-8 h-6 accent-red-500" name="remember" id="remember">
        </label>
        <input type="submit" class="text-white font-bold text-3xl  border-8 p-4 rounded-lg hover:border-red-500 cursor-pointer" value="Log In">
    </form>
</div>