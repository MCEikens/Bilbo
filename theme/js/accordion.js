var acc = document.getElementsByClassName('accordion');

function accordionToggle() {
    for (var i = 0; i < acc.length; i++) {
        acc[i].onclick = function () {
            this.classList.toggle("active");

            var accordionSubs = this.nextElementSibling;
            if (accordionSubs.style.display === "block") {
                accordionSubs.style.display = "none";
            } else {
                accordionSubs.style.display = "block";
            }
        }
    }
}