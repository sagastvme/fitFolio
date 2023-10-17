<!-- Motivation.svelte -->
<script>
	/** @type {import('./$types').PageData} */
	export let data;
	import Quote from './Quote.svelte'; 
	import { checkForm } from './commonFunctions';
  const quotes = data.serializedQuotes;
  let success= null;

  async function newQuote(event) {
  event.preventDefault(); 
  const form = event.target; 
  const formData = new FormData(form); 
  if(checkForm(formData)){
    try {
    const response = await fetch('/motivation/add', {
      method: 'POST',
      body: formData,
      headers: {
    'enctype': 'multipart/form-data', // Set the enctype in the headers
  },
    });

    if (response.ok) {
      const data = await response.json();
      success = data.success;
    } else {
      // Handle error - e.g., show an error message
      console.error('Error adding quote:', response.statusText);
    }
  } catch (error) {
    // Handle network or other errors
    console.error('Network error:', error);
  }
  }else{
    alert("The form misses some required fields");
  }
  
}

</script>

<svelte:head>
	<title>Motivation</title>
</svelte:head>

<h2 class="text-center text-3xl my-4">
	Here you will find the best quotes for staying disciplined
</h2>


<form on:submit={newQuote}
	class="my-4 bg-gray-800 border-gray-600 border-4 p-6 rounded-lg shadow-md max-w-md mx-auto text-white"
>
<div id="toast-success" class="{success ? 'block flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800' : 'hidden'}" role="alert">
  <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
    </svg>
    <span class="sr-only">Check icon</span>
  </div>
  <div class="ml-3 text-white text-sm font-normal">Quote created successfully</div>
</div>
<div id="toast-danger" class="{success===false ? 'flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800' : 'hidden'}" role="alert">
  <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark-text-red-200">
    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
    </svg>
    <span class="sr-only">Error icon</span>
  </div>
  <div class="ml-3 text-sm font-normal">Could not create your quote.</div>
</div>
 
	<div class="mb-4">
		<label for="title" class="block text-sm font-bold mb-2">Title of the quote</label>
		<input
			required
			type="text"
			id="title"
			name="title"
			class="text-black w-full py-2 px-3 border rounded-lg focus:outline-none focus:ring focus:ring-blue-400"
			placeholder="Enter the title"
		/>
	</div>

	<div class="mb-4">
		<label for="body" class="block text-sm font-bold mb-2">Body of the quote</label>
		<input
			required
			type="text"
			id="body"
			name="body"
			class=" text-black w-full py-2 px-3 border rounded-lg focus:outline-none focus:ring focus:ring-blue-400"
			placeholder="Enter the quote body"
		/>
	</div>

	<label
		for="fileInput"
		class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-red-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 cursor-pointer"
	>
		<span
			class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0"
		>
			Image for the quote
		</span>
		<input  required type="file" name="fileInput" id="fileInput" class="hidden" accept="image/*" />
	</label>

	<button
		type="submit"
		class="mt-2 w-full text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
		>Create a new quote</button
	>
</form>

<div class="flex flex-col justify-center gap-10 md:flex-row md:flex-wrap ">
	{#each quotes as quote (quote._id)}
	  <Quote {quote} />
	{/each}
  </div>
  
