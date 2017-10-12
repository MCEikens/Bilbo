var acc = [];
acc = document.getElementsByClassName('accordion');
console.log(acc);
for (var i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        /* Toggle between adding and removing the "active" class,
        to highlight the button that controls the panel */
        this.classList.toggle("active");

        /* Toggle between hiding and showing the active panel */
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    }
}



// function accordion() {
//     var acc = [];
//     acc = document.getElementsByClassName('accordion');
//     console.log(acc);
//     acc[i].onclick = function(){
//
//         this.classList.toggle("active");
//
//
//         if (panel.style.display === "block") {
//             panel.style.display = "none";
//         } else {
//             panel.style.display = "block";
//         }
//     }
// }

