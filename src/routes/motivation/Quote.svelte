<!-- Quote.svelte -->
<script lang="ts">
  import { page } from '$app/stores';
  import type QuoteSchema from "../../db/schema/quoteSchema";
  export let quote: QuoteSchema;
</script>


<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
 
      <img class="rounded-t-lg" src={quote.imgPath} alt="Icon of the quote" />
  
  <div class="p-5">
      
          <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{quote.title}</h5>
      
      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{quote.body}</p>
     
  </div>
</div>
