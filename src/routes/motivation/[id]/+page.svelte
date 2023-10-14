<script>
	/** @type {import('./$types').PageData} */
	export let data;

</script>
<svelte:head>
    <title>{data.title}</title>
   
</svelte:head>

<h1>{data.title}</h1>
<div>{data.content}</div>
