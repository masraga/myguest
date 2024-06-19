const express = require('express');
const { createServer } = require('node:http');
const { join } = require('node:path');
const { Server } = require('socket.io');
var cors = require('cors')

const app = express();
app.use(cors);

const server = createServer(app);
const io = require("socket.io")(server, {
  cors: {
    origin: "*",
    // methods: ["GET", "POST"],
    // credentials: true
  }
});


app.get('/', (req, res) => {
  res.sendFile(join(__dirname, 'index.html'));
});

io.on('connection', (socket) => {
  console.log('a user connected');
  socket.on("send-face", (data) => {
    io.emit("show-face", data);
  })
});

server.listen(3000, () => {
  console.log('server running at http://localhost:3000');
});