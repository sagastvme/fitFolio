import db from "../../../db/mongo";
import {json} from "@sveltejs/kit";

export async function POST({ request }) {
    console.log('the request I got was ', await request.formData());
    // const formData = await request.formData()
    const collection = db.collection('quotes');
    const quote = await collection.findOne({ title: 'My first typescript' });

    if (quote) {
        quote._id='mesuda la polla '+ Date.now()
        // If the quote is found, return a JSON response
        return json(quote);
    } else {
        // If the quote is not found, return a 404 Not Found response
        return new Response('Quote not found', {
            status: 404,
            headers: {
                'Content-Type': 'text/plain',
            },
        });
    }
}


// export async function DELETE({ request }) {
//     const formData = await request.formData()
//     const todoId = Number(formData.get('id'))
//
//     removeTodo(todoId)
//
//     return json({ success: true })
// }
