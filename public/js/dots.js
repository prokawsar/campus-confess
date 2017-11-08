
/*
var canvasDots = function() {
    var canvas = document.querySelector('canvas'),
        ctx = canvas.getContext('2d'),
        colorDot = '#CEC589',
        color = '#fff';
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    canvas.style.display = 'block';
    ctx.fillStyle = colorDot;
    ctx.lineWidth = .1;
    ctx.strokeStyle = color;

    var mousePosition = {
        x: 30 * canvas.width / 100,
        y: 30 * canvas.height / 100
    };

    var dots = {
        nb: 1000,
        distance: 50,
        d_radius: 100,
        array: []
    };

    function Dot(){
        this.x = Math.random() * canvas.width;
        this.y = Math.random() * canvas.height;

        this.vx = -.5 + Math.random();
        this.vy = -.5 + Math.random();

        this.radius = Math.random();
    }

    Dot.prototype = {
        create: function(){
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
            ctx.fill();
        },

        animate: function(){
            for(i = 0; i < dots.nb; i++){

                var dot = dots.array[i];

                if(dot.y < 0 || dot.y > canvas.height){
                    dot.vx = dot.vx;
                    dot.vy = - dot.vy;
                }
                else if(dot.x < 0 || dot.x > canvas.width){
                    dot.vx = - dot.vx;
                    dot.vy = dot.vy;
                }
                dot.x += dot.vx;
                dot.y += dot.vy;
            }
        },

        line: function(){
            for(i = 0; i < dots.nb; i++){
                for(j = 0; j < dots.nb; j++){
                    i_dot = dots.array[i];
                    j_dot = dots.array[j];

                    if((i_dot.x - j_dot.x) < dots.distance && (i_dot.y - j_dot.y) < dots.distance && (i_dot.x - j_dot.x) > - dots.distance && (i_dot.y - j_dot.y) > - dots.distance){
                        if((i_dot.x - mousePosition.x) < dots.d_radius && (i_dot.y - mousePosition.y) < dots.d_radius && (i_dot.x - mousePosition.x) > - dots.d_radius && (i_dot.y - mousePosition.y) > - dots.d_radius){
                            ctx.beginPath();
                            ctx.moveTo(i_dot.x, i_dot.y);
                            ctx.lineTo(j_dot.x, j_dot.y);
                            ctx.stroke();
                            ctx.closePath();
                        }
                    }
                }
            }
        }
    };

    function createDots(){
        if (dots.array.length > 50000) { dots.array = dots.array.slice(0, 40000); }

        ctx.clearRect(0, 0, canvas.width, canvas.height);
        for(i = 0; i < dots.nb; i++){
            dots.array.push(new Dot());
            dot = dots.array[i];

            dot.create();
        }

        dot.line();
        dot.animate();
    }

    window.onmousemove = function(parameter) {
        mousePosition.x = parameter.pageX;
        mousePosition.y = parameter.pageY;
    }

    mousePosition.x = window.innerWidth / 2;
    mousePosition.y = window.innerHeight / 2;

    setInterval(createDots, 1000/30);
};

window.onload = function() {
    canvasDots();
};
*/
function rand(min,max)
{
    return Math.floor(Math.random()*(max-min+1)+min);
}

var canvas,ctx,w,h;

canvas = document.getElementById('canv');
document.body.appendChild(canvas);

w = window.innerWidth;
h = window.innerHeight;

canvas.width = w;
canvas.height = h;

ctx = canvas.getContext('2d');


var particleNum,minDist;
particleNum = 100;
minDist = w/2;

var particles = [];

function particle(){
  this.x = Math.random()*w,
  this.y = Math.random()*h,
  this.vx = rand(-1,1),
  this.vy = Math.random(),
  this.radius = 2,
  this.draw = function() {
	ctx.fillStyle = "blue";
	ctx.beginPath();
	ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
	ctx.fill();
	}
}
function paintCanvas(){
  ctx.fillStyle = '#fff';
	ctx.fillRect(0,0,w,h);
}

for (i=0; i<particleNum;i++){
  particles.push(new particle());
}

var mouse = {x: 0, y: 0};

document.addEventListener('mousemove', function(e){ 
    mouse.x = e.clientX || e.pageX; 
    mouse.y = e.clientY || e.pageY 
}, false);

function draw(){
  paintCanvas();
  for(i=0;i<particles.length;i++){
    p=particles[i];
    p.draw();
    update();
    for(var j=i+1;j<particles.length;j++){
      p2= particles[j];
      distance(mouse,p2);
    }
  }
}
function update(){
  p = particles[i];
  p.x += p.vx;
  p.y += p.vy;
  
  if(p.x > w){
    p.x = 0;
  }
  else if(p.x<0){
    p.x = w;
  }
  
  if(p.y > h){
    p.y = 0;
  }
  else if(p.y<0){
    p.y = h;
  }
  
}
function distance(p1,p2){
	
  var dist;
  var dx = p1.x - p2.x;
  var dy = p1.y - p2.y;
  
  dist = Math.sqrt(dx*dx + dy*dy);
  
  if (dist <= minDist){
    ctx.beginPath();
		ctx.strokeStyle = "rgba(0,0,255,"+ (0.2-dist/minDist) +")";
    p1.vx=0;
		ctx.moveTo(p1.x, p1.y);
		ctx.lineTo(p2.x, p2.y);
		ctx.stroke();
		ctx.closePath();
  }
}
setInterval(function(){
  draw(); 
},30);


draw();
