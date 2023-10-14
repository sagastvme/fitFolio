import mongoose from "mongoose";

const keySchema = new mongoose.Schema({
    _id: {
        type: String,
        required: true
    },
    user_id: {
        type: String,
        required: true
    },
    hashed_password: String
    // Add other key attributes as needed
}, { _id: false });

const Key = mongoose.model("Key", keySchema);

export default Key;
