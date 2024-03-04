(function(){
	function dogLookLeft(){
  	    document.querySelector(".doggy-standing").style.display = "none";
  	    document.querySelector(".doggy-jumping").style.display = "none";
  	    document.querySelector(".doggy-sitting").style.display = "block";
  	    document.querySelector(".look-left").style.display = "block";
  	    document.querySelector(".look-right").style.display = "none";
	}
	function dogLookRight(){
  	    document.querySelector(".doggy-jumping").style.display = "none";
  	    document.querySelector(".look-left").style.display = "none";
  	    document.querySelector(".look-right").style.display = "block";
  	    document.querySelector(".doggy-standing").style.display = "none";
  }

	function dogStand(){
        document.querySelector(".look-right").style.display = "none";
  	    document.querySelector(".doggy-sitting").style.display = "none";
  	    document.querySelector(".doggy-standing").style.display = "block";
  	    document.querySelector(".doggy-jumping").style.display = "none";
	}
	function dogJump(){
      document.querySelector(".doggy-sitting").style.display = "none";
      document.querySelector(".look-left").style.display = "none";
      document.querySelector(".look-right").style.display = "none";
      document.querySelector(".doggy-standing").style.display = "none";
      document.querySelector(".doggy-jumping").style.display = "block";
	}
	var pause = function() {
	   var promise = new Promise(function(nextSlide, reject){
	      setTimeout(function() {
			 dogLookLeft();
	         nextSlide();
	      }, 2000);
	   });
	   return promise;
	};
	var lookLeft = function() {
	   var promise = new Promise(function(nextSlide, reject){
	      setTimeout(function() {
			 dogLookLeft();
	         nextSlide();
	      }, 300);
	   });
	   return promise;
	};
	var lookRight = function() {
	   var promise = new Promise(function(nextSlide, reject){
	      setTimeout(function() {
			 dogLookRight();
	   	     nextSlide();
	      }, 300);
	   });
	   return promise;
	};
	var standingDog = function() {
	   var promise = new Promise(function(nextSlide, reject){
	      setTimeout(function() {
			 dogStand();
	         nextSlide();
	      }, 300);
	   });
	   return promise;
	};
	var jumpingDog = function() {
	   var promise = new Promise(function(nextSlide, reject){
	      setTimeout(function() {
			 dogJump();
	         nextSlide();
	      }, 300);
	   });
	   return promise;
	};

	
	function playAnimation() {
		lookLeft()
		    .then(pause)
		   .then(lookRight)
		   .then(lookLeft)
   		   .then(lookRight)
   		   .then(lookLeft)
		   .then(standingDog)
		   .then(jumpingDog)
   		   .then(standingDog)
		   .then(jumpingDog)
  		   .then(standingDog)
		   .then(lookLeft)
	}

	playAnimation();
	
	setInterval(playAnimation, 3300);
})();


