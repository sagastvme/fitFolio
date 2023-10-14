<!-- Quote.svelte -->
<script lang="ts">
    import { page } from '$app/stores';
    interface Quote {
    name: string;
    body: string;
  }
    export let quote: Quote;
  </script>
  
  <h2>{quote.name}</h2>
  <a href={`${$page.url.pathname}/${quote.name}`}>Link Text</a>
  <p>{quote.body}</p>
  