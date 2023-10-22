class UserSchema {
    email: string;
    password: string;
    _id: string;
    
    created_at: string;
    initial_weight: string;
    height: string;
    objective: string;
     updated_weight: string;

    constructor(
        email: string,
        password: string,
        _id: string,
        created_at: string,
        initial_weight: string,
        height: string,
        objective: string,
        updated_weight: string,
    ) {
        this.email = email;
        this.password = password;
        this._id = _id;
        this.created_at = created_at;
        this.initial_weight = initial_weight;
        this.height = height;
        this.objective = objective;
        this.updated_weight = updated_weight;
    }
}

export default UserSchema;
