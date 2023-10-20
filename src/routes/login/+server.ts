import { json } from "@sveltejs/kit";
import {logIn, validEmail} from "../../db/mongo";
export async function POST({ request }) {
   const formData = await request.formData();
   let message={
      incompleteForm: 'Missing fields in the login form',
      wrongCredentials: 'Wrong password or user doesnt exist'
   };
   let isEmail = validEmail(formData.get('email'));

   if(checkLogInForm(formData) || !isEmail){
      return json({ 'error':true, 'message':  message.incompleteForm});
   }

   //db login
   //if not right credentials 
   const response =await logIn((formData))
   const responseJson = await response.json();
   console.log('final response = ', responseJson)
   return json(responseJson)
   return json({
      'error':true,'message': message.wrongCredentials
   });

   //else refresh the page and change the entire ui

}


function checkLogInForm(formData: FormData) {
   const formDataArray = Array.from(formData);
   const hasEmptyField = formDataArray.some((item) => {
     return item[1].toString().trim().length === 0;
   });
   return hasEmptyField ;
 }
 