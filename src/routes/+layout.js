/** @type {import('./$types').LayoutLoad} */
export function load() {

    const routes = ['Home','Motivation'];

    const mappedRoutes = routes.map((item) => {
      if (item.trim().toLowerCase() === 'home') {
        return { slug: '/', title: item };
      } else {
        return { slug: item.toLowerCase(), title: item };
      }
    });
    
   
    
return {sections: mappedRoutes}

	
}