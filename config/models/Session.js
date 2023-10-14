import mongoose from "mongoose";

const sessionSchema = new mongoose.Schema({
    _id: {
        type: String,
        required: true
    },
    user_id: {
        type: String,
        required: true
    },
    active_expires: {
        type: Number,
        required: true
    },
    idle_expires: {
        type: Number,
        required: true
    }
    // Add other session attributes as needed
}, { _id: false });

const Session = mongoose.model("Session", sessionSchema);

export default Session;
