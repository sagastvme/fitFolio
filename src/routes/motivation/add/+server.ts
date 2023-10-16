import db from "../../../db/mongo";
import { json } from "@sveltejs/kit";
import { checkForm } from "../commonFunctions";
import QuoteSchema from "../../../db/schema/quoteSchema";
import { ObjectId, UUID } from "mongodb";
import { writeFile } from 'node:fs/promises';
import { extname } from 'path';


export async function POST({ request }) {
    const formData = await request.formData();
    let validForm = checkForm(formData);
    if (validForm) {
        console.log(formData)
        const title = formData.get('title')?.toString();
        const body = formData.get('body')?.toString();
        const imageFile = formData.get('fileInput') ;
        const imgPath = await processImage(imageFile);
        const _id = new ObjectId();
        const hashed_id = new UUID().toString();
        console.log('the hashed id equals ', hashed_id)
        const newQuote = new QuoteSchema(title, imgPath, body, hashed_id, _id)
     let success=false
        try{
        await db.collection('quotes').insertOne(newQuote)
        success= true;
       }catch(error){
            console.log(error)
       } 
        return json({ success });
    } else {
        // Return a response indicating failure
        return new Response('Invalid form ', { status: 400 });
    }
}


async function processImage(image) {
    console.log('buffer = ', await image?.arrayBuffer())
    const filename = `static/quoteImages/${crypto.randomUUID()}${extname(image?.name)}`;
    await writeFile(filename, Buffer.from(await image?.arrayBuffer()));
    return filename.replace('static/', '');
}
