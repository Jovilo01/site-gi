const controls = document.querySelectorAll ('.control');
const slideContainer = document.querySelector('.container');
const interval = 5000;
let items = document.querySelectorAll (".item");
let slide = document.querySelector('.gallery');
const maxItems = items.length;

// Cloning and putting it in the right positions
const firstClone = items[0].cloneNode(true);
const lastClone = items[maxItems-1].cloneNode(true);
firstClone.id = "fist-clone";
lastClone.id = "last-clone";
slide.append(firstClone, items[1].cloneNode(true));
slide.prepend(items[maxItems-2].cloneNode(true), lastClone);

let currentItem = 2;
items[currentItem].classList.add("current-item");
items[currentItem].scrollIntoView({
    inline: "center",
    behavior: "auto"
});

//Functions
function nextslide(){
    currentItem += 1;
}
function prevslide(){
    currentItem -= 1;
}

// Autoplay
const autoplay = ()=> {
    setInterval(() => {
        nextslide();
        items.forEach((item) => item.classList.remove("current-item"));
        items[currentItem].scrollIntoView({
            inline: "center",
            behavior: "smooth"
        }); 
        items[currentItem].classList.add("current-item");
    }, interval);
}
//autoplay();

// InfiniteRow
slide.addEventListener("transitionend", () =>{
    items = document.querySelectorAll (".item");
    if(items[currentItem].id === firstClone.id){
        currentItem = 2;
        items[currentItem].classList.add("current-item");
        //slide.style.transition = 'none';
        items[currentItem].scrollIntoView({
            inline: "center"
        }); 
    }
    if(items[currentItem].id === lastClone.id){
        currentItem = maxItems + 1;
        items[currentItem].classList.add("current-item");
        //slide.style.transition = 'none';
        items[currentItem].scrollIntoView({
            inline: "center"
        }); 
    }
});

// Controls
controls.forEach(control => {
    control.addEventListener("click", () => {
        if(control.classList.contains("previous")){
            prevslide();
        }
        if(control.classList.contains("next")){
            nextslide(); 
        }

        items.forEach((item) => item.classList.remove("current-item"));
        items[currentItem].scrollIntoView({
            inline: "center",
            behavior: "smooth"
        }); 
        items[currentItem].classList.add("current-item");
    })
})
