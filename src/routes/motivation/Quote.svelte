<!-- Quote.svelte -->
<script lang="ts">
  import { page } from '$app/stores';
  import type QuoteSchema from "../../db/schema/quoteSchema";
  export let quote: QuoteSchema;
</script>

<div>
  <h2>{quote.title}</h2>
  <a href={`${$page.url.pathname}/${quote.hashed_id}`}>Link Text</a>
  <p>{quote.body}</p>
  <!-- Use import.meta.env.VITE_APP_BASE_URL to specify the base URL for assets -->
  <img alt="test" src='/quoteImages/favicon.png'>
</div>
