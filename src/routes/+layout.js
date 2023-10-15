/** @type {import('./$types').LayoutLoad} */
export function load() {

    const routes = ['Home', 'Motivation', 'Test', 'Sign up', 'Log in'];

    const sections = routes.map((item) => {
        if (item.trim().toLowerCase() === 'home') {
            return {slug: '/', title: item};
        } else {
            return {slug: item.toLowerCase().replace(' ',''), title: item};
        }
    });


    return {sections}


}