var id = ["cheesie"];
var pw = ["letmein"];

var list = ["Aimer-Blanc-Kataomoi","Aimer-Singles-Ref rain","Twice-Merry & Happy-Heartshaker"];
var size = 3;
function playAudio(){
	var rand = Math.floor(Math.random()*3);
	var audio = document.getElementById('music_play');
	audio.src = "Asset/songs/"+list[rand]+".mp3";
	audio.play();
}

function login(){
	var name=document.getElementById('uname');
	var pass=document.getElementById('pass');
	document.getElementById('errorMsg').innerHTML = "";
	var valid = 0;
	var idx =-1;
	
	for(var i =0 ; i < id.length ; i++){
		if(name.value==id[i]){
			valid = 1;
			idx=i;
			break;
		}
	}

	if(valid==0){
		document.getElementById('errorMsg').innerHTML = "User doesn't exist";
	}else{
		valid=0;
		if(idx==-1){
			document.getElementById('errorMsg').innerHTML = "wrong password";
			return;
		}
		for(var i =0 ; i < id.length ; i++){
			if(pass.value==pw[i]){
				valid = 1;
				if(i!=idx){
					document.getElementById('errorMsg').innerHTML = "wrong password";
					return;
				}
				break;
			}
		}

		if(valid==0)
			document.getElementById('errorMsg').innerHTML = "wrong password";
		else
			main();
	}
}
function main(){
	document.getElementById('container').style.display = "none";
	document.getElementById('page_view').style.display = "block";

}