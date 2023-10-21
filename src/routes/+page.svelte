<script>
	  import { onMount, afterUpdate } from 'svelte';
	  let isLoggedIn = false;
	  let email =''
	 let nameWithoutDomain = ''; 
	 let randomIcon = ''
	  onMount(() => {
  if (typeof window !== 'undefined') {
    try {
      if(localStorage.getItem('loggedIn')){
      const storedData = JSON.parse(localStorage.getItem('loggedIn'));
      isLoggedIn= storedData.loggedIn;
	  email = storedData.email;
		nameWithoutDomain = email.substring(0, email.indexOf('@'));
		nameWithoutDomain = nameWithoutDomain[0].toUpperCase() + nameWithoutDomain.substring(1)
		let randomNumber = Math.floor(Math.random() * 9);

		randomIcon = '/icons/icon_'+randomNumber+'.svg'
	}
   } catch (error) {
      console.error('Error parsing data from localStorage:', error);
      isLoggedIn = false; // Set a default value if parsing fails.
    }
  }
});
  </script>
  
  <svelte:head>
	<title>Fit Folio</title>
  </svelte:head>
  {#if !isLoggedIn}
  <div class="mt-24 md:mt-44 w-screen flex items-center justify-center">
	<div class="text-center flex flex-col items-center justify-center">
	  <h1 class="text-5xl font-bold text-white">Do you have what it takes?</h1>
	  <p class="text-lg text-gray-300 mt-10 w-1/2 ">"If you are afraid to die, embrace the journey of life with unwavering courage, for the very act of being born is an epic adventure, and within it, lies the true essence of fearlessness."</p>
	 <div class="flex flex-row gap-8">

	  <a href="login" class="bg-red-600 text-white font-semibold py-2 px-4 mt-8 rounded-lg hover:bg-red-700">Log in</a>
	  <a href="signup" class="bg-red-600 text-white font-semibold py-2 px-4 mt-8 rounded-lg hover:bg-red-700">Sign up</a>
	</div> 

	</div>
  </div>
  {:else}
  <div class=" text-white gap-4 flex flex-col items-center justify-center">
	<h2>Welcome to your portal {nameWithoutDomain}</h2>
	<div class="bg-red-700 rounded-full">
		<img src={randomIcon} class="h-32 p-4" alt="icon">
	</div>
	<div class="flex items-center justify-center flex-col">
		<h3>Your stats</h3>
		<p>Your objective as of right now: Lose weight</p>
		<p>Your height: 184cm</p>
		<p>Your initial weight</p>
		<p>Your weight: 200lbs</p>
		<p>Days since you started this journey: 84 days</p>
		<p>Weight progression: +8kg</p>
		<p>Your BMI: 8 points?</p>
		<p>Your recommended BMI: 20 points</p>
		<p>Your exercise for today is : Upper body</p>
	</div>
  </div>
  {/if}
  