import { MongoClient } from 'mongodb';
import { MONGO_URL } from '$env/static/private'
import UserSchema from './schema/userSchema';
import bcrypt from "bcrypt";
const saltRounds = 10;

const client = new MongoClient(MONGO_URL)


export function start_mongo() {
    return client.connect()
}

export async function logIn(credentials) {
    const email = credentials.get('email');
    const password = credentials.get('password');
    const hashedPassword = await hashPassword(password);
    console.log('regular password = ', password);
    console.log('hashed passs = ', hashedPassword)
    const rememberMe = credentials?.get('remember') ? true : false;

    //check if guy exists in db

    //insert one for testing


    //check if hashed === the pass in db
//     bcrypt
//   .hash(password, saltRounds)
//   .then(hash => {
//           userHash = hash 
//     console.log('Hash ', hash)
//     validateUser(hash)
//   })
//   .catch(err => console.error(err.message))

// function validateUser(hash) {
//     bcrypt
//       .compare(password, hash)
//       .then(res => {
//         console.log(res) // return true
//       })
//       .catch(err => console.error(err.message))        
// }

    let users = await client.db().collection('users').find({}).toArray();
    console.log('users = ', users)
}

async function hashPassword(password) {
    try {
        const hash = await bcrypt.hash(password, saltRounds);
        return hash;
    } catch (error) {
        return null;
    }
}

 export function validEmail(email) {
    const emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
    return emailRegex.test(email);
}




export default client.db();
