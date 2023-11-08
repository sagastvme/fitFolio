// @ts-nocheck
import { error, json } from '@sveltejs/kit';

/** @param {Parameters<import('./$types').PageLoad>[0]} event */
export function load({ params }) {
	const id = params.id;
    console.log('the id I got ', id);

		return {
			title: 'Hello world!',
			content: 'Welcome to our blog. Lorem ipsum dolor sit amet...',
            image:'Here goes the image lol'
        };
	

	throw error(404, 'The quote you were looking for doesnt exist');
}