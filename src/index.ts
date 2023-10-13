import { Elysia } from "elysia";
const app = new Elysia()


app.get('/', () => ({
  'vtuber': [
      'Shirakami Fubuki',
      'Inugami Korone'
  ]
}))


app.listen(8080);
console.log(`🦊 Elysia is running at ${app.server?.hostname}:${app.server?.port}`);
