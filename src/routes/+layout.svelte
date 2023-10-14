<nav>
    {#each data.sections as section (section.slug)}
      <a href={section.slug}>{section.title}</a>
    {/each}
  </nav>
  
  <slot></slot>
  
  <script>
    /** @type {import('./$types').PageData} */
    export let data;
  </script>
  <style>

    a{
        margin:4px
    }
  </style>