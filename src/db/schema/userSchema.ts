class UserSchema{
    email: string;
    password: string;
    _id: string;
    preferred_units: string;
    constructor(email: string, password: string, _id:string, preferred_units: string){
        this.email= email,
        this.password= password,
        this._id= _id,
        this.preferred_units = preferred_units
    }
}

export default UserSchema