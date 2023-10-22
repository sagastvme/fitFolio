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

    //check if guy exists in db
    const userInDatabase =await  client.db().collection('users').findOne({'email':email});
    if(userInDatabase===null){
        return json({'error':true, 'message': 'User not found please check the email'})
    }
   
   const correctCredentials = await validateUser(password, userInDatabase.password)

   if (correctCredentials){
    return json({'error':false, 'email': userInDatabase.email, 'id':userInDatabase._id.toString()})
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
  

  export async function register(formData) {
    const email = formData.get('email');
    const password = formData.get('password');
    const weight = formData.get('weight');
    const height = formData.get('height');
    const objective = formData.get('objective');
    const userInDatabase =await  client.db().collection('users').findOne({'email':email});
    if(userInDatabase!==null){
        return json({'error':true, 'message': 'Email already taken'});
    }
const hashedPassword =await hashPassword(password)
    const newUser = new UserSchema(email, hashedPassword, new ObjectId(), new Date(), weight, height, objective, null)
    await  client.db().collection('users').insertOne(newUser);

console.log('the user im about to insert = ', newUser);
    return json({'error':false, 'email':newUser.email})

   
}



export default client.db();
