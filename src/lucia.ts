// lucia.ts
import { lucia } from "lucia";
import { elysia } from "lucia/middleware";
import { authAdapter} from "./adapter"
// expect error (see next section)
export const auth = lucia({
	env: "DEV",
    middleware: elysia(),
    adapter: authAdapter 

    getUserAttributes: (data) => {
		return {
			username: data.username
		};


});

export type Auth = typeof auth;