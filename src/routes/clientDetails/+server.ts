import { json } from "@sveltejs/kit";
import {register, validEmail} from "../../db/mongo";
import db from '../../db/mongo';
// server.ts
export async function POST({ request }: { request: Request }) {
   
  const body = await request.json();
const email = body.email;

const user =await  db.collection('users').findOne({email})
if(user){
delete user?._id;
delete user?.password
delete user?.email

if (user.updated_weight === null) {
  user.updated_weight = user.initial_weight;
}

return json(user);
  }else{
    return json(null);
  }
}
  


 