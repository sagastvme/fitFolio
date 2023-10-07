import Elysia from "elysia";
import dotenv from 'dotenv';
import { html } from "@elysiajs/html";
import { dirname } from "path";
const path = require('path');
// Load environment variables from .env file
dotenv.config();

const app = new Elysia();

// Retrieve SERVER_PORT from environment variables or set a default value
const SERVER_PORT = process.env.SERVER_PORT || 3000;

app.use(html())

app.get('/', async() => new Response(await Bun.file("src/views/index.html") ));

app.listen(SERVER_PORT, () => {
    console.log(`Server is running on port ${SERVER_PORT}`);
});
