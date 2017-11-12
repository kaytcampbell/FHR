

if (document.layers){
          originalWindowWidth = innerWidth;
          originalWindowHeight = innerHeight;
          onresize=function() { if(innerWidth != originalWindowWidth || innerHeight != originalWindowHeight) location.reload() };
}



