import {
    rest
} from "msw";
import {
    setupServer
} from "msw/node";

const server = setupServer(
    rest.get(
        "http://localhost:8000/api/product",
        (req, res, ctx) => {
            return res(
                ctx.json({
                    products: [{
                            id: 3,
                            name: 'Rick Sanchez',
                            price: '20',
                            quantity: "70",
                            image: 'https://rickandmortyapi.com/api/character/avatar/1.jpeg'
                        }
                    ]
                }))
        })
);
beforeAll(() => server.listen());
afterEach(() => server.resetHandlers());
afterAll(() => server.close());
