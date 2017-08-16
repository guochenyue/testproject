
function css(obj,attr,val){

	if(!val){
		if(obj.currentStyle){
			return obj.currentStyle[attr];
		}
		return getComputedStyle(obj)[attr]; 
	}
	obj.style[attr] = val;
	
}

window.onload = function(){
	
	var oBox = document.getElementById("content-down")
	var oUl = oBox.getElementsByTagName('ul')[0];
	var aLi = oUl.getElementsByTagName('li');
	
	oUl.innerHTML += oUl.innerHTML;
	
	var iWidth = (parseInt(css(aLi[0],'width'))+4)*aLi.length;
	var timer = null;
	var iSpeed = -2;
	
	oUl.style.width = iWidth + 'px';
	
	
	oUl.onmouseover = function(){
	
		clearInterval(timer);	
		
	};
	
	oUl.onmouseout = function(){
	
		doMove();
		
	};
	
	function doMove(){
		
		clearInterval(timer);
		timer = setInterval(function(){
			
			var iLeft = parseInt(css(oUl,'left')) + iSpeed;
			
			if(iLeft>0||iLeft<=-iWidth/2){
				iLeft = iLeft<0 ? 0 : -iWidth/2;	
			}
			oUl.style.left = iLeft + 'px';
			
		},16);
		
	}	

	doMove();
	
};

