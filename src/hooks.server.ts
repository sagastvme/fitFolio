import {start_mongo} from "./db/mongo";

start_mongo().then(() => {
    console.log('Mongo database running')
}).catch((error) => {
    console.error('There was an error trying to connect to the mongoDB database ' + error)
});