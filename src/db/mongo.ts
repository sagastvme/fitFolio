import { MongoClient, ObjectId } from 'mongodb';
import { MONGO_URL } from '$env/static/private'
import UserSchema from './schema/userSchema';
import bcrypt from "bcrypt";
import { json } from '@sveltejs/kit';
const saltRounds = 10;

const client = new MongoClient(MONGO_URL)


export function start_mongo() {
    return client.connect()
}

export async function logIn(credentials) {
    const email = credentials.get('email');
    const password = credentials.get('password');
    const hashedPassword = await hashPassword(password);
    const rememberMe = credentials?.get('remember') ? true : false;

    //check if guy exists in db
    const userInDatabase =await  client.db().collection('users').findOne({'email':email});
    if(userInDatabase===null){
        return json({'error':true, 'message': 'User not found please check the email'})
    }
   
   const correctCredentials = await validateUser(password, userInDatabase.password)

   if (correctCredentials){

        if(rememberMe){
            //set a cookie or a localStorage so we can remember the guy I have to check if the value already exists in store
        }

    return json({'error':false})
   }else{
    return json({'error':true, 'message':'Wrong password'});
   }


   //add test user and index for unique emails
    // client.db().collection('users').createIndex({email: 1 },{unique:true})
    // const testUser = new UserSchema('eduardo@gmail.com', '$2b$10$TAWRr7xAdTw59T45Ss2f0eNPRD9NNr.0wpU3Q8NNvbAEN7zyp6.yy', new ObjectId(), 'lb');
    // client.db().collection('users').insertOne(testUser);
}

export async function registerUser(params:FormData) {

    
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

async function validateUser(password, hash) {
    try {
      const res = await bcrypt.compare(password, hash);
      return res;
    } catch (error) {
      return null;
    }
  }
  



export default client.db();
