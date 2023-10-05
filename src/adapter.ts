import { lucia } from "lucia";
import { mongoose } from "@lucia-auth/adapter-mongoose";
import mongodb from "mongoose";
import Key from "./entities/key";
import Session from "./entities/session";
import User from "./entities/user";

export const authAdapter = mongoose({
	User,
	Key,
	Session
});

export const auth = lucia({
	adapter: authAdapter
	// ... (any other lucia configuration as needed)
});

const mongoUri = "mongodb://localhost:27017/gym";
const options = {
    useNewUrlParser: true,
    useUnifiedTopology: true,
};

// handle connection
mongodb.connect(mongoUri, options);
