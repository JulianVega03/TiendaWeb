document.addEventListener("DOMContentLoaded", function (event) {
    var imgPost = 1;
    let imgItems = document.querySelectorAll(".slider li").length;
    for (let i = 1; i <= imgItems; i++) {
        let li = document.createElement("LI");
        li.classList.add("pagination-item");
        li.setAttribute("for", "1");
        let img = document.createElement("IMG");
        img.src = `views/images/slider/i${i}.jpg`;
        li.appendChild(img);
        document.getElementsByClassName("pagination")[0].appendChild(li);
    }
    Array.from(document.querySelectorAll(".slider li")).map((li) => {
        li.style.display = "none";
    });
    document.querySelector(".slider li:first-child").style.display = "block";
    Array.from(document.querySelector(".pagination li")).map((li) => {
        li.style.display = "block";
    });
    document.querySelector(
        ".pagination .pagination-item:first-child"
    ).style.backgroundColor = "#fff";
    Array.from(document.querySelectorAll(".pagination li")).map((li) => {
        li.addEventListener("click", pagination);
    });
    Array.from(document.querySelectorAll(".prueba span")).map((li) => {
        li.addEventListener("click", nextSlider);
    });
    setInterval(nextSlider, 10000);

    function pagination() {
        var paginationPos =
            Array.from(this.parentNode.children).indexOf(this) + 1;
        Array.from(document.querySelectorAll(".slider li")).map((li) => {
            li.style.display = "none";
        });
        document
            .querySelectorAll(".slider li:nth-child(" + paginationPos + ")")
            .forEach((li) => (li.style.display = "block"));
        Array.from(
            document.querySelectorAll(".pagination .pagination-item")
        ).map((el) => {
            el.style.backgroundColor = "#ffffff80";
        });
        document
            .querySelectorAll(".pagination li:nth-child(" + paginationPos + ")")
            .forEach((li) => (li.style.backgroundColor = "#fff"));
        imgPost = paginationPos;
    }

    function nextSlider() {
        if (imgPost >= imgItems) {
            imgPost = 1;
        } else {
            imgPost++;
        }
        Array.from(document.querySelectorAll(".pagination li")).map((li) => {
            li.style.backgroundColor = "#ffffff80";
        });
        document
            .querySelectorAll(".pagination li:nth-child(" + imgPost + ")")
            .forEach((li) => (li.style.backgroundColor = "#fff"));
        Array.from(document.querySelectorAll(".slider li")).map((li) => {
            li.style.display = "none";
        });
        document
            .querySelectorAll(".slider li:nth-child(" + imgPost + ")")
            .forEach((el) => {
                el.style.display = "block";
                fadeIn(el, 1000);
            });
    }
});

function fadeIn(el, time) {
    el.style.opacity = 0;
    var last = +new Date();
    var tick = function () {
        el.style.opacity = +el.style.opacity + (new Date() - last) / time;
        last = +new Date();

        if (+el.style.opacity < 1) {
            (window.requestAnimationFrame && requestAnimationFrame(tick)) ||
                setTimeout(tick, 16);
        }
    };
    tick();
}
