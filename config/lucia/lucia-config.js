// config/lucia/lucia-config.js
const { lucia } = require("lucia");
const { mongoose, mongoUri, options } = require("../db");
const User = require("../models/User");
const Key = require("../models/Key");
const Session = require("../models/Session");
const { mongoose } = require("@lucia-auth/adapter-mongoose");

const auth = lucia({
    adapter: mongoose({
        User,
        Key,
        Session,
    }),
    // ... other Lucia authentication configuration
});

// Export the auth configuration for use in your routes
module.exports = auth;
