  <nav class="bg-gradient-to-r from-black to-red-950">
    <a href="">

      <img src="/favicon.png" class="rounded-full h-12 md:h-20 ml-5" alt="Fit Folio logo">
    </a>
  </nav>
  
  <slot></slot>
  
  <script>
    /** @type {import('./$types').PageData} */
  import "../app.css";
  import { page } from '$app/stores';
    export let data;
  </script>
  <style>

    a{
        margin:4px
    }
  </style>

