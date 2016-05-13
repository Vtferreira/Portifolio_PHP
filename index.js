// Iniciamos uma nova instância do socket.io passando o objeto http(o servidor http)
var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
 
app.get('/', function(req, res){
  res.sendfile('index.html');
});
 

io.on('connection', function(socket){
  socket.on('mensagem de chat', function(msg){
    console.log('nova mensagem enviada: ' + msg);
  });
});
 
http.listen(3000, function(){
  console.log('listening on *:3000');
});

io.on('connection', function(socket){
  socket.on('mensagem de chat', function(msg){
    io.emit('mensagem de chat', msg);
  });
});

