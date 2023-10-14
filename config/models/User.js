// models/User.js
const mongoose = require("mongoose");

const userSchema = new mongoose.Schema({
    _id: {
        type: String,
        required: true,
    },
    // Add other user attributes as needed
});

module.exports = mongoose.model("User", userSchema);
