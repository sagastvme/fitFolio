<!-- Motivation.svelte -->
<script>
  /** @type {import('./$types').PageData} */
  export let data;
  import Quote from './Quote.svelte'; // Import the QuoteSchema component
  let test = ''; // Initialize with an empty string
  import { writable } from 'svelte/store';

  const quotes = writable(data.serializedQuotes);

  const handleSubmit = async (event) => {
    event.preventDefault();

    // Create a FormData object to send form data
    const formData = new FormData();
    formData.append('id', test);

    try {
      const response = await fetch('/motivation/add', {
        method: 'POST',
        body: formData,
      });

      if (response.ok) {
        const addedQuote = await response.json();
        quotes.update((currentQuotes) => [...currentQuotes, addedQuote]);
        console.log('the qritab;e cuotes = ', quotes)
        // Push the added quote to data.serializedQuotes

        // Clear the input field
        test = '';

        console.log(data); // Print the updated data
        console.log('Quote added successfully!');
      } else {
        // Handle errors (e.g., show an error message)
        console.error('Failed to add quote.');
      }
    } catch (error) {
      // Handle network errors
      console.error('Network error:', error);
    }
  };
</script>

<svelte:head>
  <title>Motivation</title>
</svelte:head>

<h1>Here you will find the best quotes for staying disciplined</h1>
<form on:submit={handleSubmit}>
  <label for="test">Quote:</label>
  <input type="text" name="test" id="test" bind:value={test}>
  <button type="submit">Add new quote</button>
</form>
{#each $quotes as quote (quote._id)}
  <Quote {quote} />
{/each}

