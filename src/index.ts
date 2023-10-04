import { Elysia } from 'elysia'
import { html } from '@elysiajs/html'
import { mongoose } from "@lucia-auth/adapter-mongoose";
new Elysia()
    .use(html())
    .get(
        '/',
        () => console.log(mongoose)
    )
    .get('/jsx', () => (`
        <html lang="en">
            <head>
                <title>Hello World</title>
            </head>f
            <body>
                <h1>Hello World</h1>
            </body>
        </html>`
    ))
    .listen(8080)