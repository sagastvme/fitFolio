<script>
	/** @type {import('./$types').PageData} */
	import '../app.css';
	import { page } from '$app/stores';
	export let data;
  let showMenu=false;
  function openMobileMenu(){
      showMenu=!showMenu
  }
</script>

<nav class="bg-gradient-to-r from-black to-red-950 text-white h-20">
  <!-- <img src="/favicon.png" class="rounded-full h-12 md:h-20 ml-5" alt="Fit Folio logo" /> -->
  <div id="mobileMenu" class="md:hidden flex flex-row items-center h-full w-full justify-center">
    <a href="/">
      <img src="/favicon.png" class="rounded-full h-12 md:h-20 ml-5" alt="Fit Folio logo" />
    </a>
    <h1 class="text-3xl font-extrabold">Fit Folio</h1>
    <button on:click={openMobileMenu} type="button" >
    
      <img src="/svg/menu.svg" class="h-10 " alt="Open menu icon" />

    </button>
    
  </div>
</nav>
<div class="bg-gradient-to-r from-black {showMenu ? 'py-1' : 'hidden'} md:hidden to-red-950  text-white">
   <ul class="{showMenu ? 'block ' : 'hidden'}">
    {#each data.sections as section (section.slug)}
      <li class="w-full text-center mb-4">
        <a on:click={openMobileMenu} href={section.slug} class="text-3xl w-full text-white">{section.title}</a>
      </li>
    {/each}
  </ul>
</div>

<div class="bg-gradient-to-r from-black to-red-950 text-white">
  <slot />


</div>




