
import db from '../../db/mongo';

const collection = db.collection('quotes');

const allQuotes = await collection.find({}).toArray();

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

