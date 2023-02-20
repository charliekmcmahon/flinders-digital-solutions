function rotateCard(elementID) {

    console.log(`rotating ${elementID}`);
    var itemToAffect  = document.getElementById(elementID);
    var elementChildren = itemToAffect.children;

    itemToAffect.style.transform = "rotateY(180deg)";

}