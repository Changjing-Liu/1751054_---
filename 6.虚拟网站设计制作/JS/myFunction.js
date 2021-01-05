function myFunction() {
    var myTitle = document.getElementsByName("subtitle");
    console.log(myTitle);
    var titles = myTitle[0].getElementsByTagName('a');
    console.log(titles);
    var divs = document.getElementsByName('a');
    console.log(divs);
    for (var i = 0; i < titles.length; i++) {
        //给每个li加上id和值
        titles[i].id = i;
        titles[i].onclick = function () {
            for (var j = 0; j < titles.length; j++) {
                titles[j].className = "";
                divs[j].className = "hide";
            }
            titles[this.id].className = "active";
            divs[this.id].className = "show";
        };
    }
}
