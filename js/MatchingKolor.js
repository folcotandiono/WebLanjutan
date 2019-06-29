
var rgb = ["red","yellow","grey","blue","orange","lightblue","pink","white","red","yellow","grey","blue","orange","lightblue","pink","white"];
rgb=shuffleArray(rgb);

function shuffleArray(array) {
    for (var i = array.length - 1; i >= 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
    return array;
}
var box=0;

var block=0;
var warna1;
var warna2;

function swap(event){
    document.getElementById(event).style.backgroundColor="black";
    document.getElementById(event).disabled=false;

}
function hide(event){
    document.getElementById(event).style.background="none";
    document.getElementById(event).style.border="none";
    document.getElementById(event).disabled=true;
}
function check(bnum){
    var x=bnum.id;
    if(x=="1x1"){
        document.getElementById("1x1").style.backgroundColor=rgb[0];
    }

    if(x=="1x2"){
        document.getElementById("1x2").style.backgroundColor=rgb[1];
    }
    if(x=="1x3"){
        document.getElementById("1x3").style.backgroundColor=rgb[2];
    }

    if(x=="1x4"){
        document.getElementById("1x4").style.backgroundColor=rgb[3];
    }
    if(x=="2x1"){
        document.getElementById("2x1").style.backgroundColor=rgb[4];
    }

    if(x=="2x2"){
        document.getElementById("2x2").style.backgroundColor=rgb[5];
    }
    if(x=="2x3"){
        document.getElementById("2x3").style.backgroundColor=rgb[6];
    }

    if(x=="2x4"){
        document.getElementById("2x4").style.backgroundColor=rgb[7];
    }
    if(x=="3x1"){
        document.getElementById("3x1").style.backgroundColor=rgb[8];
    }

    if(x=="3x2"){
        document.getElementById("3x2").style.backgroundColor=rgb[9];
    }
    if(x=="3x3"){
        document.getElementById("3x3").style.backgroundColor=rgb[10];
    }

    if(x=="3x4"){
        document.getElementById("3x4").style.backgroundColor=rgb[11];
    }
    if(x=="4x1"){
        document.getElementById("4x1").style.backgroundColor=rgb[12];
    }

    if(x=="4x2"){
        document.getElementById("4x2").style.backgroundColor=rgb[13];
    }
    if(x=="4x3"){
        document.getElementById("4x3").style.backgroundColor=rgb[14];
    }

    if(x=="4x4"){
        document.getElementById("4x4").style.backgroundColor=rgb[15];
    }

    if(block==0){
        warna1=x;
        block+=1;
        
    }
    else if(block==1){
        warna2=x;
        block+=1;     
        if(document.getElementById(warna1).style.backgroundColor==document.getElementById(warna2).style.backgroundColor){
            hide(warna1);
            hide(warna2);
            block=0;
            box+=2;
        }
    }
    else{
        if(warna1!=warna2){
            swap(warna1);
            swap(warna2);
            document.getElementById(warna1).disabled=false;
            document.getElementById(warna2).disabled=false;
        }
        block=1;
        warna1=x;
    }
    document.getElementById(x).disabled=true;

}
var minutesLabel = document.getElementById("minutes");
var secondsLabel = document.getElementById("seconds");
var totalSeconds = 60;
var timer = setInterval(setTime, 500);

function setTime() {
  secondsLabel.innerHTML = pad(totalSeconds % 60);
  minutesLabel.innerHTML = pad(parseInt(totalSeconds / 60));
  --totalSeconds;

  if (totalSeconds < 0) {
    clearInterval(timer);
      if(alert("                                       Loser !!! , Your Score : "+box+"\n                                                   Retry??")){}
else    window.location.reload();  
    }
  if (totalSeconds>0 && box==16){
      clearInterval(timer);
      if(alert("                                       Congratulation !!! , Your Score : "+box+"\n                                                   Retry??")){}
else    window.location.reload(); 
  }
}

function pad(val) {
  var valString = val + "";
  if (valString.length < 2) {
    return "0" + valString;
  } else {
    return valString;
  }
}