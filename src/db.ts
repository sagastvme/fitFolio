import { lucia } from "lucia";
import { mongoose } from "@lucia-auth/adapter-mongoose";
import mongodb from "mongoose";
import User from "./entities/user";
import  Key from "./entities/key";
import Session from "./entities/session";
// see next section for schema
console.log(User, Session, Key)
const mongoUri = "mongodb://localhost:27017/gym";
const options = {
    useNewUrlParser: true,
    useUnifiedTopology: true,
    // ... any other options
};


const auth = lucia({
	adapter: mongoose({
		User,
		Key,
		Session
	})
	// ...
});

// handle connection
mongodb.connect(mongoUri, options)
    .then(() => {
        console.log('Connected to MongoDB');
    })
    .catch(error => {
        console.error('Error connecting to MongoDB:', error);
    });

	// docker run --name mongoDatabase -p "27017:27017" -d mongo
