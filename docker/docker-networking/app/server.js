const express = require("express");
const mongoose = require("mongoose");

const app = express();
const PORT = 5000;

const mongoUri = process.env.MONGO_URI || "mongodb://mongo:27017/testdb";

app.get("/", (req, res) => {
  res.send("Docker Networking Demo: Backend is running");
});

mongoose
  .connect(mongoUri)
  .then(() => {
    console.log("MongoDB connected successfully using service name:", mongoUri);

    app.listen(PORT, () => {
      console.log(`Server running on port ${PORT}`);
    });
  })
  .catch((err) => {
    console.error("MongoDB connection failed:", err.message);
  });
