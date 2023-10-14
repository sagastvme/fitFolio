// config/db.js
const mongoose = require("mongoose");

const mongoUri = "mongodb://localhost:27017/fitFolio";
const options = {
    useNewUrlParser: true,
    useUnifiedTopology: true,
    // Add other options as needed
};

module.exports = {
    mongoose,
    mongoUri,
    options,
};
