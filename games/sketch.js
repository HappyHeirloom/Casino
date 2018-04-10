var colors;

function setup(){
  createCanvas(400,400);
  angleMode(DEGREES);

  colors = [];
  let numc = 18;
  for (let i = 0; i < numc; i++){
    append(colors, color(floor(random(0,255)),floor(random(0,255)),floor(random(0,255)),floor(random(0,255))));
  }



}

function draw(){
  background(0);
  translate(width/2, height/2)


  noFill();
  strokeWeight(3);
  stroke(255);
  let center = point(0,0);
  let innerE = ellipse(0,0,150,150,TWO_PI);
  let outerE = ellipse(0,0,300,300,TWO_PI);


}
