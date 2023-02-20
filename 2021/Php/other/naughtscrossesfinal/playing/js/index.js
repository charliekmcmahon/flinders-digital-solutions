// © 2021, Charlie McMahon - www.macca.xyz

console.log('index.js is running...'); // Check whether js is runnning

function squareClicked(squareID)
{
  console.log(squareID);
	document.getElementById("buttonPressInput").value = squareID;
	document.forms["buttonPressForm"].submit();
}


