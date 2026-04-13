const express = require("express");
const mongoose = require("mongoose");

const app = express();
const PORT = 3000;

const mongoUrl = process.env.MONGO_URL || "mongodb://localhost:27017/testdb";

app.get("/", (req, res) => {
  res.send("App is running with Docker Compose");
});

mongoose
  .connect(mongoUrl)
  .then(() => {
    console.log("MongoDB connected successfully");
    app.listen(PORT, () => {
      console.log(`Server running on port ${PORT}`);
    });
  })
  .catch((err) => {
    console.error("MongoDB connection failed:", err.message);
  });
