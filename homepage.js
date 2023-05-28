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

// Date Limiter
var today = new Date().toISOString().split('T')[0];
document.getElementById('date-input').min = today;

// Time Limiter
var now = new Date();
var currentTime = now.getHours();
document.getElementById('time-input').min = currentTime;

function handleTimeChange(input) {
    var selectedTime = input.value;
    var hours = selectedTime.split(':')[0];
    input.value = hours + ':00';
  }
  

