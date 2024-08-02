  
<style>
 .loay {
  height: 100%;
  width: 100%;
  background-color: #792db8ad;
  z-index: 700;
  position:fixed;
}

#loader-container {
  height: 100%;
  width: 100%;
  
}
#loader-container #loader-circle {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  height: 25px;
  width: 25px;
  
  
  background-repeat: no-repeat;
  background-size: 40px;
  background-position: center;
  margin: -20px 0 0 -20px;
  -webkit-animation: circle 2s linear infinite;
          animation: circle 2s linear infinite;
}
#loader-container #loader {
  position: absolute;
  height: 100px;
  width: 100px;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
}
#loader-container #circles {
  height: 100px;
  width: 100px;
  border-bottom: 3px solid #fec00f;
  border-radius: 50%;
  -webkit-animation: spin 2s linear infinite;
          animation: spin 2s linear infinite;
}
#loader-container #circles:before {
  border-top: 3px solid #ffffff;
  height: 90px;
  width: 90px;
  margin: 5px;
  border-radius: 50%;
  display: inline-block;
  content: "";
  -webkit-animation: spin 4s linear infinite;
          animation: spin 4s linear infinite;
}
#loader-container #circles:after {
  border-left: 3px solid #353535;
  height: 80px;
  width: 80px;
  margin: 15px 10px;
  border-radius: 50%;
  position: absolute;
  left: 0;
  display: inline-block;
  content: "";
  -webkit-animation: spin 2s linear infinite;
          animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
@-webkit-keyframes circle {
  0% {
    transform: rotateY(0deg);
  }
  40% {
    transform: rotateY(360deg);
  }
  100% {
    transform: rotateY(360deg);
  }
}
@keyframes circle {
  0% {
    transform: rotateY(0deg);
  }
  40% {
    transform: rotateY(360deg);
  }
  100% {
    transform: rotateY(360deg);
  }
}
</style>

<div id="loadery" style="display:none;" class="loay" translate="no">
  <div id="loader-container">
  <div id="loader">
    <div style="
    background-color: #792db8ad;
" id="circles"></div>
  </div>
  <div id="loader-circle"></div>
</div>
<!--credit to ihatetomatoes' css preloader tutorial-->

  
  




 
</div>

<style>
 

#loader-container{
	height: 100%;
    width: 100%;
}
    
	#loader-circle{
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		height: 45px;
		width: 45px;
		
		background-repeat: no-repeat;
		background-size: 40px;
		background-position: center;
		margin: -20px 0 0 -20px;
		animation: circle linear infinite;
	}
	#loader{
		position: absolute;
		height: 100px;
		width: 100px;
		left: 50%;
		top: 50%;
		transform: translate(-50%, -50%);
	}
	#circles{
		height: 100px;
		width: 100px;
		border-bottom: 3px solid ;
		border-radius: 50%;
		animation: linear infinite;
	}
	#circles:before{
		border-top: 3px solid;
		height: 90px;
		width: 90px;
		margin: 5px;
		border-radius: 50%;
		display: inline-block;
		content: "";
		animation: spin linear infinite;
	}
	#circles:after{
		border-left: 3px solid ;
		height: 80px;
		width: 80px;
		margin: 15px 10px;
		border-radius: 50%;
		position: absolute;
		left: 0;
		display: inline-block;
		content: "";
		animation: spin linear infinite;
	}


@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

@keyframes circle {
  0% { transform: rotateY(0deg);}
  40% { transform: rotateY(360deg);}
	100% { transform: rotateY(360deg);}
}
</style>