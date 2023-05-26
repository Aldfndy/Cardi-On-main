const animation_element = document.querySelectorAll('.fade-up')

const observer = new IntersectionObserver((entries) =>{
    entries.forEach((entry) => {
        if (entry.isIntersecting){
            entry.target.classList.add('animate');

        }
    })
},{
    threshold: 0.5
}); 

for(let i = 0; i < animation_element.length; i++){
    const el = animation_element[i];

    observer.observe(el)
}