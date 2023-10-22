import { json } from "@sveltejs/kit";
import {register, validEmail} from "../../db/mongo";

export async function POST({ request }) {
   const formData = await request.formData();
   let message='Missing fields in the login form';
   let isEmail = validEmail(formData.get('email'));

   if(checkLogInForm(formData) || !isEmail){
      return json({ 'error':true, 'message':  message});
   }

   const response =await register((formData));
   const responseJson = await response.json();
   return json(responseJson)
}


function checkLogInForm(formData: FormData) {
   const formDataArray = Array.from(formData);
   const hasEmptyField = formDataArray.some((item) => {
     return item[1].toString().trim().length === 0;
   });
   return hasEmptyField ;
 }
 