import { elysia } from "lucia/middleware";

new Elysia().get("/", async (context) => {
	const authRequest = auth.handleRequest(context);
});