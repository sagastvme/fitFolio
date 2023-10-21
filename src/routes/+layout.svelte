<script>
  import '../app.css';
  import { page } from '$app/stores';
  import { setContext } from 'svelte';
  import { getContext } from 'svelte';
  import { onMount, afterUpdate } from 'svelte';
  import { writable,get } from "svelte/store";
  export let data;
  let isLoggedIn = false;

  let showMenu = false;

  function openMobileMenu() {
    showMenu = !showMenu;
  }

  onMount(() => {
  if (typeof window !== 'undefined') {
    try {
      if(localStorage.getItem('loggedIn')){
      const storedData = JSON.parse(localStorage.getItem('loggedIn'));
      isLoggedIn= storedData.loggedIn;
    }
   } catch (error) {
      console.error('Error parsing data from localStorage:', error);
      isLoggedIn = false; // Set a default value if parsing fails.
    }
  }
});


function logOut(){
  localStorage.removeItem('loggedIn');
    location.href = '/';
}

</script>

<h1 class="text-white">{isLoggedIn} value should be here</h1>
{#if isLoggedIn}
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
  <form class="cursor-pointer" on:submit={logOut}>
  <input type="submit" class="cursor-pointer w-full text-center mb-4 text-3xl" value="Log out">
  </form>
</div>

{:else}
    <!-- Render content for non-logged-in users -->
    <p class="text-white">Welcome to the application. Please log in to access your account.</p>
    <ul class="">
      {#each data.sections as section (section.slug)}
        <li class="w-full text-center mb-4">
          <a on:click={openMobileMenu} href={section.slug} class="text-3xl w-full text-white">{section.title}</a>
        </li>
      {/each}
    </ul>
  {/if}
  
<div class="bg-gradient-to-r from-black to-red-950 text-white">
  <slot />


</div>




