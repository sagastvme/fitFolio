import { error } from '@sveltejs/kit';

/** @type {import('./$types').PageLoad} */
export function load() {
	let array =[];


	let ob1 = {name:'Eduardo', body:'Eduardo Gomara Sagastume'}
	let ob2 = {name:"Pepe", body:'Pepe Botero'};

	array.push(ob1, ob2);

	console.log('the pushed array = ', array)
	
	return {
			quotesList:array
		};
	 

	throw error(404, 'Testing');
}