import Elysia from "elysia";
import { auth as Auth } from "./lucia";
import { html } from '@elysiajs/html'
const app = new Elysia()
app.use(express.urlencoded()); // for application/x-www-form-urlencoded (forms)
app.use(express.json()); // for application/json
app.use(html());

app.get('/', () => (
    <html lang="en">
        <head>
            <title>Hello World</title>
        </head>
        <body>
            <h1>Hello World</h1>
        </body>
    </html>
))
.listen(8080)

app.get("/signup", async () => {
	return Bun.file("./views/signup.html"); // example
});

app.post("/signup", async (req, res) => {
	const { username, password } = req.body;
	// basic check
	if (
		typeof username !== "string" ||
		username.length < 4 ||
		username.length > 31
	) {
		return res.status(400).send("Invalid username");
	}
	if (
		typeof password !== "string" ||
		password.length < 6 ||
		password.length > 255
	) {
		return res.status(400).send("Invalid password");
	}
	try {
		const user = await auth.createUser({
			key: {
				providerId: "username", // auth method
				providerUserId: username.toLowerCase(), // unique id when using "username" auth method
				password // hashed by Lucia
			},
			attributes: {
				username
			}
		});
		const session = await auth.createSession({
			userId: user.userId,
			attributes: {}
		});
		const authRequest = auth.handleRequest(req, res);
		authRequest.setSession(session);
		// redirect to profile page
		return res.status(302).setHeader("Location", "/").end();
	} catch (e) {
		// this part depends on the database you're using
		// check for unique constraint error in user table
		if (
			e instanceof SomeDatabaseError &&
			e.message === USER_TABLE_UNIQUE_CONSTRAINT_ERROR
		) {
			return res.status(400).send("Username already taken");
		}

		return res.status(500).send("An unknown error occurred");
	}
});

app.listen(8080);

