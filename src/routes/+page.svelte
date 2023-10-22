<script>
	import { onMount } from 'svelte';
	let isLoggedIn = false;
	let email = '';
	let nameWithoutDomain = '';
	let randomIcon = '';
	let userData = null;
	onMount(async () => {
		if (typeof window !== 'undefined') {
			try {
				if (localStorage.getItem('loggedIn')) {
					const storedData = JSON.parse(localStorage.getItem('loggedIn'));
					isLoggedIn = storedData.loggedIn;
					email = storedData.email;
					nameWithoutDomain = email.substring(0, email.indexOf('@'));
					nameWithoutDomain = nameWithoutDomain[0].toUpperCase() + nameWithoutDomain.substring(1);
					let randomNumber = Math.floor(Math.random() * 9);
					randomIcon = '/icons/icon_' + randomNumber + '.svg';
					const response = await fetch('/clientDetails', {
						method: 'POST',
						body: JSON.stringify({
							email
						})
					});
					userData = await response.json();

					console.log(userData);
					// Handle the response here if needed
				}
			} catch (error) {
				console.error('Error parsing data from localStorage:', error);
				isLoggedIn = false; // Set a default value if parsing fails.
			}
		}
	});
	function calculateBMI(weightInKg, heightInMeters){
		heightInMeters = heightInMeters/100
		console.log(weightInKg, heightInMeters)
		const bmi = weightInKg / (heightInMeters * heightInMeters);
  return Math.round(bmi);
	}
	function averageWeight(height) {
		height= height/100
  const idealBMI = 21.7;
  const averageWeight = idealBMI * height * height;
  return Math.round(averageWeight);
}


function formatDate(date){
	const originalDate = new Date(date);

const month = (originalDate.getUTCMonth() + 1).toString().padStart(2, '0'); // Months are 0-based, so add 1
const day = originalDate.getUTCDate().toString().padStart(2, '0');
const year = originalDate.getUTCFullYear();

const formattedDate = `${day}/${month}/${year}`;
return formattedDate;
}
function daysSinceCreation(date) {
  // Parse the input date
  date = new Date(date);

  // Get the current date
  const currentDate = new Date();

  // Calculate the time difference in milliseconds
  const timeDifference = currentDate - date;

  // Convert the time difference to days
  const daysDifference = Math.floor(timeDifference / (1000 * 60 * 60 * 24));

  return daysDifference;
}


</script>

<svelte:head>
	<title>Fit Folio</title>
</svelte:head>
{#if !isLoggedIn}
	<div class="mt-24 md:mt-44 w-screen flex items-center justify-center">
		<div class="text-center flex flex-col items-center justify-center">
			<h1 class="text-5xl font-bold text-white">Do you have what it takes?</h1>
			<p class="text-lg text-gray-300 mt-10 w-1/2">
				"If you are afraid to die, embrace the journey of life with unwavering courage, for the very
				act of being born is an epic adventure, and within it, lies the true essence of
				fearlessness."
			</p>
			<div class="flex flex-row gap-8">
				<a
					href="login"
					class="bg-red-600 text-white font-semibold py-2 px-4 mt-8 rounded-lg hover:bg-red-700"
					>Log in</a
				>
				<a
					href="signup"
					class="bg-red-600 text-white font-semibold py-2 px-4 mt-8 rounded-lg hover:bg-red-700"
					>Sign up</a
				>
			</div>
		</div>
	</div>
{:else}
	<div class=" text-white gap-4 flex flex-col items-center justify-center">
		<h2>Welcome to your portal {nameWithoutDomain}</h2>
		<div class="bg-red-700 rounded-full">
			<img src={randomIcon} class="h-32 p-4" alt="icon" />
		</div>
		<div class="flex items-center justify-center flex-col">
			<h3>Your stats</h3>
			{#if userData}
				<p>Your objective as of right now: {userData.objective}</p>
				<p>Your height: {userData.height} cm</p>
				<p>Your initial weight: {userData.initial_weight} kg</p>
				<p>Your updated weight: {userData.updated_weight} kg</p>
				<p>Created at: {formatDate(userData.created_at)}</p>
				<p>Days since you started this journey: {daysSinceCreation(userData.created_at)}</p>
				<p>Weight progression: {userData.initial_weight - userData.updated_weight} kg</p>
				<p>Your ideal weight should be around : {averageWeight(userData.height)} kg</p>
				<p>Your recommended BMI: {calculateBMI(userData.updated_weight, userData.height)}</p>
				<p>Your exercise for today is : Upper body</p>
			{/if}
		</div>
	</div>
{/if}
