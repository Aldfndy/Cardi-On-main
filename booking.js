let mybutton = document.querySelector(".date-num")
let i = 0;

mybutton.addEventListener('click', () => {
    if(i == 0){
        mybutton.classList.add('red')
        i++;
    } else{
        mybutton.classList.remove('red')
        i--;
    }
})