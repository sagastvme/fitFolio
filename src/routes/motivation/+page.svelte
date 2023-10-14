<!-- Motivation.svelte -->
<script>
  /** @type {import('./$types').PageData} */
  export let data;
  import Quote from './Quote.svelte'; // Import the Quote component


</script>

<svelte:head>
  <title>Motivation</title>
</svelte:head>

<h1>Here you will find the best quotes for staying disciplined</h1>

{#each data.quotesList as quote (quote.name)}
  <Quote {quote} />
{/each}

