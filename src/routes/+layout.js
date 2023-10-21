/** @type {import('./$types').LayoutLoad} */
export function load() {
    let isLoggedIn = false;

    if (import.meta.env.SSR === false) {
       
        if (localStorage.getItem('loggedIn')) {
            const storedData = JSON.parse(localStorage.getItem('loggedIn'));
            isLoggedIn = storedData.loggedIn;
        }
    }

    let routes = ['Home', 'Motivation', 'Test', 'Sign up', 'Log in'];
    
    if (isLoggedIn) {
        routes = ['Home', 'Motivation', 'Test'];
    }

    const sections = routes.map((item) => {
        if (item.trim().toLowerCase() === 'home') {
            return { slug: '/', title: item };
        } else {
            return { slug: item.toLowerCase().replace(' ', ''), title: item };
        }
    });

    return { sections }
}
