// Import necessary modules and create the Mongoose model
import db from '../../db/mongo';
// import QuoteSchema from '../../db/schema/quoteSchema';
// import {ObjectId} from "mongodb";
// import { v4 as uuidv4 } from "uuid";
const collection = db.collection('quotes');

// const newQuote = new QuoteSchema(
//     'My first typescript',
//     '/jpeg/hola.jpg',
//     'This is the body of the quote where I explain how everything happened',
//     new ObjectId(),
//     uuidv4()
// );

// await collection.insertOne(newQuote);
const allQuotes = await collection.find({}).toArray();

// Convert _id to a string in each document
const serializedQuotes = allQuotes.map((quote) => {
    return {
        ...quote,
        _id: quote._id.toString(),
    };
});

export const load = function () {
    return {
        serializedQuotes
    };
};
