class UserSchema {
    email: string;
    password: string;
    _id: string;
    preferred_units: string;
    created_at: string;
    initial_weight: string;
    height: string;
    routine: object; // Specify the type as 'object'
    objective: string;
    routine_updated_at: string;
    updated_weight: string;

    constructor(
        email: string,
        password: string,
        _id: string,
        preferred_units: string,
        created_at: string,
        initial_weight: string,
        height: string,
        routine: object, // Specify the type as 'object'
        objective: string,
        routine_updated_at: string,
        updated_weight: string
    ) {
        this.email = email;
        this.password = password;
        this._id = _id;
        this.preferred_units = preferred_units;
        this.created_at = created_at;
        this.initial_weight = initial_weight;
        this.height = height;
        this.routine = routine;
        this.objective = objective;
        this.routine_updated_at = routine_updated_at;
        this.updated_weight = updated_weight;
    }
}

export default UserSchema;
